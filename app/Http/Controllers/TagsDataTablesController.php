<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsDataTablesController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return datatables()->of($tags)->addColumn('action',
            function ($tag) {
                $edit_btn = "<button id='edit-tag' target='$tag->id' class='btn btn-primary'>Edit</button>";
                $delete_btn = '<input type="button" target= ' . $tag->id . ' class="btn  btn-danger" value="delete" > ';
                return $edit_btn . $delete_btn;
            })->toJson();
    }
}
