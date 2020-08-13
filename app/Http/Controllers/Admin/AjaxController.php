<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Categories;
use App\Model\TypeNews;
class AjaxController extends Controller
{
    public function getType($idCate)
    {
        $type = TypeNews::where('idTheLoai', $idCate)
                        ->get();
        foreach ($type as $tp){
            echo "<option value='".$tp->id."'>".$tp->Ten."</option>";
        }
    }
}
?>
