<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;//dung login laravel

class UserController extends Controller
{
    public function getList()
    {
        $user  = User::paginate(5);
        $data = [];
        $data['user'] = $user;

        return view('admin.user.list', $data);
    }

    public function getAdd()
    {
        return view('admin.user.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password'
        ],
        [
            'name.required' => 'Ban chua nhap ten nguoi dung',
            'name.min' => 'Ten phai it nhat 3 ky tu',
            'email.required' => 'Ban chua nhap email',
            'email.email' => 'Ban phai nhap dung dinh dang email',
            'email.unique' => 'Email da ton tai',
            'password.required' => 'Ban chua nhap mat khau',
            'password.min' => 'Mat khau phai it nhat 3 ki tu',
            'password.max' => 'Mat khau phai toi da 32 ki tu',
            'passwordAgain.required' => 'Ban chua nhap lai mat khau',
            'passwordAgain.same' => 'Hai mat khau khong trung nhau'

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); //bcrypt: ma hoa mat khau
        $user->level = $request->power;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $backFile = $file->getClientOriginalExtension();
            if($backFile != 'jpg' && $backFile != 'jpeg' && $backFile != 'png'){
                return redirect(route('admin.user.add'))->with('loi','Ban chi duoc chon file co duoi jpg, jpeg, png');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_". $name;
            while (file_exists("upload/avatar/".$image)){
                $image = Str::random(4)."_". $name;
            }
            $file->move("upload/avatar", $image);
            $user->Hinh = $image;
        }else{
            $user->Hinh = "";
        }
        $user->save();

        return redirect(route('admin.user.add'))->with('thongbao','Them tai khoan thanh cong');

    }

    public function getEdit($id)
    {
        $user = User::find($id);
        $data = [];
        $data['user'] = $user;
        return view('admin.user.edit', $data);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ],
            [
                'name.required' => 'Ban chua nhap ten nguoi dung',
                'name.min' => 'Ten phai it nhat 3 ky tu',
            ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->level = $request->power;

        if($request->changePassword == "on"){

            $this->validate($request, [
                'password' => 'required|min:3|max:32',
                'passwordAgain' => 'required|same:password'
            ],
                [
                    'password.required' => 'Ban chua nhap mat khau',
                    'password.min' => 'Mat khau phai it nhat 3 ki tu',
                    'password.max' => 'Mat khau phai toi da 32 ki tu',
                    'passwordAgain.required' => 'Ban chua nhap lai mat khau',
                    'passwordAgain.same' => 'Hai mat khau khong trung nhau'

                ]);

            $user->password = bcrypt($request->password); //bcrypt: ma hoa mat khau
        }
        if($request->hasFile('image')){
            if(!empty($news->Hinh)){
                unlink("upload/avatar/".$news->Hinh);
            }
            $file = $request->file('image');
            $backFile = $file->getClientOriginalExtension();
            if($backFile != 'jpg' && $backFile != 'jpeg' && $backFile != 'png'){
                return redirect(route('admin.user.add'))->with('loi','Ban chi duoc chon file co duoi jpg, jpeg, png');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_". $name;
            while (file_exists("upload/avatar/".$image)){
                $image = Str::random(4)."_". $name;
            }
            $file->move("upload/avatar",$image);
            $user->Hinh = $image;
        }
        $user->save();
        return redirect(route('admin.user.edit', $id))->with('thongbao', 'Sua thanh cong');
    }

    public function getDelete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect(route('admin.user.list'))->with('thongbao','Xoa thanh cong');
    }

    public function loginAdmin()
    {
        return view('admin.login.index');
    }

    public function handleLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:3|max:32'
        ],
        [
            'email.required' => 'Ban chua nhap email',
            'password.required' => 'Ban chua nhap password',
            'password.min' => 'Mat khau toi thieu 3 ky tu',
            'password.max' => 'Mat khau toi da 32 ki tu',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::whereemail($request->email)->first();
            Auth::login($user);
            return redirect(route('admin.dashboard'));
        } else{
            return redirect(route('admin.login'))->with('thongbao','Email or Password khong chinh xac');
        }
    }

    public function profileAdmin()
    {
        return view('admin.profile.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }
}
