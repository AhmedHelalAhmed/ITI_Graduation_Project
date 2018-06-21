<?php

namespace App\Http\Controllers;

//use GridPrinciples\Friendly\Tests\Mocks\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\User;


class UserController extends BaseController
{

    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
        return view('users.show', ['user' => $user]);
    }

}
