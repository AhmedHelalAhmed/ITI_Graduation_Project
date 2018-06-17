<?php

namespace App\Http\Controllers;

use App\Article;
use App\Type;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Tag;
use App\Vote;


class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Article::with("user")->orderBy('created_at', 'DESC')->where('type_id', '=', 1)->paginate(3);
        $tags = Tag::all();
        $categories = Category::all();
        return view('info.index',
            ['info' => $info,
            'tags' => $tags,
                'categories' => $categories,]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('info.create',
            ['categories' => $categories,
            'tags' => $tags,
                'categories' => $categories,]);
    }

    /**
     * Generate new name for the file
     *
     * @param  a file $file
     * @return a new name for the file concatenated with time
     */

    protected function _get_file_stored_name($file): string
    {
        $original_name = $file->getClientOriginalName();
        $original_name_without_extension = explode('.', $original_name)[0];
        $original_extension = explode('.', $original_name)[1];
        $store_name = $original_name_without_extension . time() . '.' . $original_extension;
        return $store_name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //set the data
        $data = $request->all();

        //for set the current user . . user_id
        $user_id = Auth::user()->id;
        $data['user_id'] = $user_id;


        //for set the article type . . type_id
        $type_id = 1; #1 means info
        $data['type_id'] = $type_id;

        //for cover
        if ($request->hasFile('cover')) {
            $cover_file = $request->file('cover');
            $data['cover'] = $this->_get_file_stored_name($cover_file);
            Storage::putFileAs('public/images', $cover_file, $data['cover']);
        }
        //store the data
        $article = Article::create($data);

        $article->tags()->sync($request->tags, false);
        $tags = Tag::all();
        $categories = Category::all();
        return redirect(route('info.index',
            ['tags' => $tags,
                'categories' => $categories,]));
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $info = Article::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return Response::view('errors.404');
        }
        $tags = Tag::all();
        $categories = Category::all();
        return view('info.show',
            ['info' => $info,
                'tags' => $tags,
                'categories' => $categories,]);
    }

    /**
     * Rate the article
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function articleVoteArticle(Request $request)
    {
        $article_id = $request['articleId'];
        $is_vote = $request['isvote'] === 'true';
        $update = false;
        $article = Article::find($article_id);
        if (!$article) {
            return null;
        }
        $user = Auth::user();
        $vote = $user->votes()->where('article_id', $article_id)->first();
        if ($vote) {
            $already_voted = $vote->vote;
            $update = true;
            if ($already_voted == $is_vote) {
                $vote->delete();
                return null;
            }
        } else {
            $vote = new Vote();
        }
        $vote->vote = $is_vote;
        $vote->user_id = $user->id;
        $vote->article_id = $article->id;
        if ($update) {
            $vote->update();
        } else {
            $vote->save();
        }
        return null;
    }


    public function edit($id)
    {
        try {
            $info = Article::findOrFail($id);
            $categories = Category::all();
            $tags = Tag::all();
        } catch (ModelNotFoundException $e) {
            return Response::view('errors.404');
        }
        return view('info.edit',
            ['info' => $info,
                'categories' => $categories,
                'tags' => $tags]);
    }

    public function update($id, Request $request)
    {
        try {
            $info = Article::findOrFail($id);
            $data = $request->all();

            //for cover
            if ($request->hasFile('cover')) {
                $cover_file = $request->file('cover');
                $data['cover'] = $this->_get_file_stored_name($cover_file);
                Storage::putFileAs('public/images', $cover_file, $data['cover']);
            }

            $info->update($data);
            if (isset($request->tags)) {
                $info->tags()->sync($request->tags);
            } else {
                $info->tags()->sync(array());

            }

        } catch (ModelNotFoundException $e) {
            return Response::view('errors.404');
        }

        Session::flash('success', 'Successfully saved');
        $tags = Tag::all();
        $categories = Category::all();
        return redirect(route('info.index',
            ['tags' => $tags,
                'categories' => $categories,]));
    }


    public function destroy($id)
    {
        Article::destroy($id);
        Session::flash('success', 'Successfully deleted');
        $tags = Tag::all();
        $categories = Category::all();
        return back(['tags' => $tags,
            'categories' => $categories,]);
    }

}
