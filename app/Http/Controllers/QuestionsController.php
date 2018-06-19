<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Article;

class QuestionsController extends InfoController
{

    public function index()
    {
        $questions = Article::with("user")->orderBy('created_at', 'DESC')->where('type_id', '=', 2)->paginate(3);
        return view('questions.index', ['questions' => $questions]);
    }


    public function create()
    {
        return view('questions.create');
    }


    public function edit($id)
    {
        try {
            $question = Article::findOrFail($id);

        } catch (ModelNotFoundException $e) {
            return Response::view('errors.404');
        }
        return view('questions.edit',
            ['question' => $question]);
    }


    public function store(Request $request)
    {
        //set the data
        $data = $request->all();

        //for set the current user . . user_id
        $user_id = Auth::user()->id;
        $data['user_id'] = $user_id;


        //for set the article type . . type_id
        $type_id = 2; #2 means question
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

        return redirect(route('questions.index'));
    }


    public function show($id, Request $request)
    {
        try {
            $question = Article::findOrFail($id);

        } catch (ModelNotFoundException $e) {
            return Response::view('errors.404');
        }


        if ($request->ajax()) {

            return view('info.showajax',
                ['question' => $question]);
        }


        return view('questions.show',
            ['question' => $question]);
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
        return redirect(route('questions.index'));
    }

}
