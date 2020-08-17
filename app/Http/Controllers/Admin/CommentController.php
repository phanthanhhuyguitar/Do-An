<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\TypeNews;
use App\Model\Comment;
use App\Model\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function getDelete($id,$idNews)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect(route('admin.news.edit',$idNews))->with('thongbao','Xoa comment thanh cong');
    }

    public function postController($id, Request $request)
    {
        $idNew = $id;
        $new = News::find($id);
        $comment = new Comment;
        $comment->idTinTuc = $idNew;
        $comment->idUser = Auth::user()->id;
        $comment->NoiDung = $request->comment;
        $comment->save();

        return redirect("tin-tuc/$id/".$new->TieuDeKhongDau.".html")->with('thongbao','Viet binh luan thanh cong');
    }

}
