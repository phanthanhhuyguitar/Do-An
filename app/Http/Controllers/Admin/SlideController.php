<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slider;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    public function getList()
    {
        $slide  = Slider::paginate(5);
        return view('admin.slide.list',['slide'=>$slide]);
    }

    public function getAdd()
    {
        return view('admin.slide.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'post_content_1' => 'required',
        ],
        [
            'name.required' => 'Ban chua nhap ten',
            'post_content_1.required' => 'Ban chua nhap noi dung'
        ]);
        $slide =  new Slider;
        $slide->Ten = $request->name;
        $slide->NoiDung = $request->post_content_1;
        if($request->has('link'))
            $slide->link = $request->link;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $backFile = $file->getClientOriginalExtension();
            if($backFile != 'jpg' && $backFile != 'jpeg' && $backFile != 'png'){
                return redirect(route('admin.slide.add'))->with('loi','Ban chi duoc chon file co duoi jpg, jpeg, png');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_". $name;
            while (file_exists("upload/slide/".$image)){
                $image = Str::random(4)."_". $name;
            }
            $file->move("upload/slide",$image);
            $slide->Hinh = $image;
        }else{
            $slide->Hinh = "";
        }
        $slide->save();
        return redirect(route('admin.slide.add'))->with('thongbao','Them thanh cong');

    }

    public function getEdit($id)
    {
        $slide = Slider::find($id);
        return view('admin.slide.edit',['slide'=>$slide]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'post_content_1' => 'required',
        ],
            [
                'name.required' => 'Ban chua nhap ten',
                'post_content_1.required' => 'Ban chua nhap noi dung'
            ]);
        $slide = Slider::find($id);
        $slide->Ten = $request->name;
        $slide->NoiDung = strip_tags($request->post_content_1);
        if($request->has('category'))
            $slide->theloai = $request->category;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $backFile = $file->getClientOriginalExtension();
            if ($backFile != 'jpg' && $backFile != 'jpeg' && $backFile != 'png') {
                return redirect(route('admin.slide.add'))->with('loi', 'Ban chi duoc chon file co duoi jpg, jpeg, png');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4) . "_" . $name;
            while (file_exists("upload/slide/" . $image)) {
                $image = Str::random(4) . "_" . $name;
            }
            unlink("upload/slide/" . $slide->Hinh);//xoa hinh cu
            $file->move("upload/slide", $image);
            $slide->Hinh = $image;
        }

        $slide->save();
        return redirect(route('admin.slide.edit', ['id'=>$id]))->with('thongbao', 'Sua thanh cong');
    }

    public function getDelete($id)
    {
        $slide = Slider::find($id);
        $slide->delete();

        return redirect(route('admin.slide.list'))->with('thongbao','Xoa thanh cong');
    }
}
