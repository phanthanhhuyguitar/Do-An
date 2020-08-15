<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\TypeNews;
use App\Model\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Comment;
use App\Model\User;

class NewsController extends Controller
{
    public function getList()
    {
        $news = News::orderBy('id', 'DESC')
                        ->paginate(5);
        return view('admin.news.list', ['new'=>$news]);
    }

    public function getAdd()
    {
        //show trang them tin tuc
        $cate = Categories::all();
        $type = TypeNews::all();
        return view('admin.news.add', ['caTe'=>$cate, 'tyPe'=>$type]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'typenews' => 'required',
            'title' => 'required|min:3|unique:tintuc,TieuDe',
            'post_content' => 'required', //tom tat
            'post_content_1' => 'required' //noi dung
        ],
        [
            'typenews.required' => 'Ban chua chon loai tin',
            'title.required' => 'Ban chua nhap tieu de',
            'title.min' => 'Tieu de phai co it nhat 3 ki tu',
            'title.unique' => 'Tieu de da ton tai',
            'post_content.required' => 'Ban chua nhao tom tat',
            'post_content_1' => 'Ban chua nhap noi dung'
        ]);

        $news = new News;
        $news->TieuDe = $request->title;
        $news->TieuDeKhongDau = changeTitle($request->title);
        $news->idLoaiTin = $request->typenews;
        $news->TomTat = $request->post_content;
        $news->NoiDung = $request->post_content_1;
        $news->SoLuotXem = 0;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $backFile = $file->getClientOriginalExtension();
            if($backFile != 'jpg' && $backFile != 'jpeg' && $backFile != 'png' && $backFile != 'gif'){
                return redirect(route('admin.news.add'))->with('loi','Ban chi duoc chon file co duoi jpg, jpeg, png');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_". $name;
            while (file_exists("upload/tintuc/".$image)){
                $image = Str::random(4)."_". $name;
            }
            $file->move("upload/tintuc",$image);
            $news->Hinh = $image;
        }else{
            $news->Hinh = "";
        }

        $news->save();
        return redirect(route('admin.news.list'))->with('thongbao','Them tin thanh cong');
    }

    public function getEdit($id)
    {
        $cate = Categories::all();
        $type = TypeNews::all();
        $news = News::find($id);
        return view('admin.news.edit', ['new' => $news, 'caTe'=>$cate, 'tyPe'=>$type]);
    }

    public function postEdit(Request $request, $id)
    {
        $news = News::find($id);
        $this->validate($request,
            [
                'typenews' => 'required',
//                'title' => 'required|min:3|unique:tintuc,TieuDe',
                'post_content' => 'required', //tom tat
                'post_content_1' => 'required' //noi dung
            ],
            [
                'typenews.required' => 'Ban chua chon loai tin',
                'title.required' => 'Ban chua nhap tieu de',
                'title.min' => 'Tieu de phai co it nhat 3 ki tu',
//                'title.unique' => 'Tieu de da ton tai',
                'post_content.required' => 'Ban chua nhao tom tat',
                'post_content_1' => 'Ban chua nhap noi dung'
            ]);
        $news->TieuDe = $request->title;
        $news->TieuDeKhongDau = changeTitle($request->title);
        $news->TomTat = $request->post_content;
        $news->idLoaiTin = $request->typenews;
        $news->NoiDung = $request->post_content_1;
        $news->NoiBat = $request->highlights;

        if($request->hasFile('image')){
            if(!empty($news->Hinh)){
                unlink("upload/tintuc/".$news->Hinh);
            }
            $file = $request->file('image');
            $backFile = $file->getClientOriginalExtension();
            if($backFile != 'jpg' && $backFile != 'jpeg' && $backFile != 'png' && $backFile != 'gif'){
                return redirect(route('admin.news.add'))->with('loi','Ban chi duoc chon file co duoi jpg, jpeg, png');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_". $name;
            while (file_exists("upload/tintuc/".$image)){
                $image = Str::random(4)."_". $name;
            }
            $file->move("upload/tintuc",$image);
            $news->Hinh = $image;
        }
        $news->save();
        return redirect(route('admin.news.list', ['id'=>$id]))->with('thongbao','Sua thanh cong');


    }

    public function getDelete($id)
    {
        $news = News::find($id);
        $news->delete();


        return redirect(route('admin.news.list'))->with('thongbao','Xoa thanh cong');
    }


}
