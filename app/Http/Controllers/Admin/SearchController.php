<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\News;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $key = $request->get('keySearch');
        $new = News::where('TieuDe','like',"%$key%")
            ->orwhere('TomTat','like',"%$key%")
            ->orwhere('NoiDung', 'like',"%$key%")
            ->take(30)
            ->paginate(6);
        return view('admin.search.list', ['new' => $new, 'key' => $key]);
    }

}
