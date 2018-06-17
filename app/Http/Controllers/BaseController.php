<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Tag;
use App\Category;

class BaseController extends Controller
{
    public function __construct()
    {
        $tags = Tag::all();
        $categories = Category::all();
        // Sharing
        View::share('tags', $tags);
        View::share('categories', $categories);
    }
}
