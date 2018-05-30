<?php

namespace App\Http\Controllers;

use App\Article;
use App\Type;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Article::with("user")->get();
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
            $original_cover_name = $cover_file->getClientOriginalName();
            $store_cover_name = $original_cover_name . time();
            Storage::putFileAs('public/images', $cover_file, $store_cover_name);
        }
        $data['cover'] = $store_cover_name;


        //for attachment
        if ($request->hasFile('attachment')) {
            $attachment_file = $request->file('attachment');
            $original_attachment_name = $attachment_file->getClientOriginalName();
            $store_attachment_name = $original_attachment_name . time();
            Storage::putFileAs('public/attachments', $attachment_file, $store_attachment_name);
        }
        $data['attachment'] = $store_attachment_name;


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
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
