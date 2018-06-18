<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesDataTablesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return datatables()->of($categories)->addColumn('action',
            function ($category) {

//            $edit_btn="<a href='categories/$category->id/edit' >Edit</a>";

                $edit_btn = "<button id='edit-category' target='$category->id' class='btn btn-primary'>Edit</button>";

                $delete_btn = '<input type="button" target= ' . $category->id . ' class="btn  btn-danger" value="delete" > ';

                return $edit_btn . $delete_btn;
            })->toJson();
    }
}
