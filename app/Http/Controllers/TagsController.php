<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TagsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tag::create($request->all());
        Session::flash('success', 'New Tag was successfully created!');
        return redirect(route('tags.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $tag = Tag::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return view('errors.404');

        }
        return view('tags.edit', ["tag" => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $tag = Tag::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
        $tag->update($request->all());
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        return back();
    }


    public function show($id)
    {
        try {
            $tag = Tag::findOrFail($id);
            $articles=$tag->articles;
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
        return view('tags.show',["articles"=>$articles]);
    }
}
