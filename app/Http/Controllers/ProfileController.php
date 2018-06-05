<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Image;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', array('user' => Auth::user()));
    }

    public function update($id, Request $request)
    {
        try {
            $user = User::findOrFail($id);
            $inputs = $request->all();

            if ($request->hasFile('avatar')) {
                $avatar_file = $request->file('avatar');
                Image::make($avatar_file)->resize(300, 300)->save(public_path('/storage/images/avatars/' . $avatar_file->getClientOriginalName()));
                $inputs['avatar'] = $avatar_file->getClientOriginalName();
                $user->update($inputs);
            }
        } catch (ModelNotFoundException $e) {
            return Response::view('errors.404');
        }
        return redirect(route('profile.index'));
    }
}
