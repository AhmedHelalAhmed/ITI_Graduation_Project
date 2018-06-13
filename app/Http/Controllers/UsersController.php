<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use http\Env\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User;

class UsersController extends Controller
{
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return Response::view('errors.404');
        }
        return view('users.show', ['user' => $user]);
    }
}
