<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
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
        $users = User::all();
        $articles = Article::all();
        $recent_rumors=Article::with("user")->orderBy('created_at', 'DESC')->where('type_id', '=', 1)->paginate(12);
        $recent_questions=Article::with("user")->orderBy('created_at', 'DESC')->where('type_id', '=', 2)->paginate(12);
        // Sharing
        View::share('tags', $tags);
        View::share('categories', $categories);
        View::share('users', $users); // for admin dashboard - enhance
        View::share('articles', $articles); // for admin dashboard - enhance
        View::share('recent_rumors', $recent_rumors); // for sidebar
        View::share('recent_questions', $recent_questions); // for sidebar

    }
}
