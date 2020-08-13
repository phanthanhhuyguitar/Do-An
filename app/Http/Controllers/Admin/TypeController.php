<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\TypeNews;
use Illuminate\Http\Request;
use App\Model\Categories;

class TypeController extends Controller
{
    public function getList()
    {
        $type = TypeNews::paginate(5);
        return view('admin.type.list',['tyPe'=>$type]);
    }

    public function getAdd()
    {
        $cate = Categories::all();
        return view('admin.type.add',['caTe'=>$cate]);
    }

    //form gui len phai nhan du lieu Request
    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'cateName' => 'required|unique:LoaiTin,Ten|min:1|max:100',
                'category' => 'required'
            ],
            [
                'cateName.required' => 'Ban chua nhap ten loai tin',
                'cateName.unique' => 'Ten loai tin da ton tai',
                'cateName.min' => 'Ten loai tin toi thieu 1 ky tu',
                'cateName.max' => 'Ten loai tin toi da 100 ky tu',
                'cateName.required' => 'Ban chua chon the loai'
            ]);
        $type = new TypeNews();
        $type->Ten = $request->cateName;
        $type->TenKhongDau = changeTitle($request->cateName);
        $type->idTheLoai = $request->category;
        $type->save();

        return redirect(route('admin.type.add'))->with('thongbao','Ban da them thanh cong');
    }

    public function getEdit($id)
    {
        $cate = Categories::all();
        $type = TypeNews::find($id);
        return view('admin.type.edit',['tyPe'=>$type,'caTe'=>$cate]);
                                            //key cua mang la bien cua ben view
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
            [
                'newsName' => 'required|unique:LoaiTin,Ten|min:1|max:100',

            ],
            [
                'newsName.required' => 'Ban chua nhap ten loai tin',
                'newsName.unique' => 'Ten loai tin da ton tai',
                'newsName.min' => 'Ten loai tin toi thieu 1 ky tu',
                'newsName.max' => 'Ten loai tin toi da 100 ky tu'
            ]);
        $type = TypeNews::find($id);
        $type->Ten = $request->newsName;
        $type->TenKhongDau = changeTitle($request->newsName);
        $type->idTheLoai = $request->category;
        $type->save();

        return redirect(route('admin.type.edit',$id))->with('thongbao','Ban da sua thanh cong');
    }

    public function getDelete($id)
    {
        $type = TypeNews::find($id);
        $type->delete();

        return redirect(route('admin.type.list'))->with('thongbao','Ban xoa thanh cong');
    }


}
