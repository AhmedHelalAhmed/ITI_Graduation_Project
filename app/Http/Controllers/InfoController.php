<?php

namespace App\Http\Controllers;

use App\Article;
use App\Type;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
        $info = Article::with("user")->orderBy('created_at' ,'DESC')->paginate(3);
        return view('info.index', ['info' => $info]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('info.create', ['categories' => $categories,]);
    }

    /**
     * Generate new name for the file
     *
     * @param  a file $file
     * @return a new name for the file concatenated with time
     */

    private function _get_file_stored_name($file): string
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


        //for attachment
        if ($request->hasFile('attachment')) {
            $attachment_file = $request->file('attachment');
            $data['attachment'] = $this->_get_file_stored_name($attachment_file);
            Storage::putFileAs('public/attachments', $attachment_file, $data['attachment']);
        }


        //store the data
        Article::create($data);


        return redirect(route('info.index'));
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
        return view('info.show', ['info' => $info]);
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
}
