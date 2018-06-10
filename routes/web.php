<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $info=\App\Article::where("type_id","1")->orderBy("created_at")->limit("6")->get();
    return view('welcome',['info' => $info,]);
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//info
Route::get('/info', 'InfoController@index')->name('info.index');
Route::get('info/create', 'InfoController@create')->name('info.create')->middleware('auth');;
Route::post('info', 'InfoController@store')->name('info.store');
Route::get('info/{id}', 'InfoController@show')->name('info.show');


//profile
Route::get('profile/', 'ProfileController@index')->name('profile.index');
Route::put('profile/{id}', 'ProfileController@update')->name('profile.update')->middleware('auth');;


//vote
Route::post('/vote','InfoController@articleVoteArticle')->name('vote');