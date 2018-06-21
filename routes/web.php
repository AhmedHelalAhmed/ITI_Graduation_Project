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
    $info = \App\Article::where("type_id", "1")->orderBy("created_at", "DESC")->limit(4)->get();
    return view('welcome', ['info' => $info,]);


});

//login and register
Auth::routes();

//home page
Route::get('/home', 'HomeController@index')->name('home');


//info
Route::get('/info', 'InfoController@index')->name('info.index');
Route::get('info/create', 'InfoController@create')->name('info.create')->middleware('auth');
Route::post('info', 'InfoController@store')->name('info.store');
Route::get('info/{id}', 'InfoController@show')->name('info.show');
Route::get('/info/{id}/edit', 'InfoController@edit')->name('info.edit')->middleware('auth');
Route::put('/info/{id}', 'InfoController@update')->name('info.update')->middleware('auth');
Route::delete('/info/{id}', 'InfoController@destroy')->name('info.destroy')->middleware('auth');


//profile - for every user to update it's profile
Route::get('profile/', 'ProfileController@index')->name('profile.index');
Route::put('profile/{id}', 'ProfileController@update')->name('profile.update')->middleware('auth');


//vote
Route::post('/vote', 'InfoController@articleVoteArticle')->name('vote');


//tags
Route::resource('tags', 'TagsController', ['except' => ['create']])->middleware('auth');


//admin
Route::get('admin', 'AdminController@index')->name('admin.index')->middleware('auth');


//users - for make to each user profile which can be access by another user
Route::get('users/{id}', 'UserController@show')->name('users.show');


//questions
Route::resource('questions', 'QuestionsController')->middleware('auth');


//categories
Route::resource('categories', 'CategoriesController')->middleware('auth');

//categories dataTable helper
Route::get('categoriesdatatables', 'CategoriesDataTablesController@index')
    ->name('categoriesdatatables.index');

//tags dataTable helper
Route::get('tagsdatatables', 'TagsDataTablesController@index')
    ->name('tagsdatatables.index');

//tags
Route::resource('tags', 'TagsController', ['except' => ['show']])->middleware('auth');

//contact form
Route::get('/contact', 'ContactController@show');
Route::post('/contact', 'ContactController@mailToAdmin');


Route::group(['middleware' => ['role:super-admin', 'auth']], function () {
//authrization
    Route::resource('admin/permission', 'Admin\\PermissionController');
//authrization
    Route::resource('admin/role', 'Admin\\RoleController');
//crud for users
    Route::resource('admin/user', 'Admin\\UserController');
});
