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

Route::get('/', 'HomeController@index')->name('home');
//Route::get('/', 'PostController@index');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {
    Route::get('/post/create', 'PostController@create')->name('createpost');
    Route::post('/post/create', 'PostController@store');

    //Het editen van een post
    Route::get('/post/edit/{id}', 'PostController@edit')->name('editpost');
    Route::patch('/post/update/{id}', 'PostController@update')->name('updatepost');

    //Laat de posts zien uit de database met Opties
    Route::get('/post/manage', 'ManageController@index')->name('managepost');
    Route::delete('/post/manage/delete/{id}', 'ManageController@destroy')->name('deletepost');

    //Laat gebruikers zien uit de database met Opties
    Route::get('/users/manage', 'UserController@index')->name('manageusers');
    Route::delete('/user/manage/delete/{id}', 'UserController@destroy')->name('deleteuser');

    Route::get('/users/edit/{id}', 'UserController@edit')->name('edituser');
    Route::patch('/users/update/{id}', 'UserController@update')->name('updateuser');

});
//profiel laten zien
Route::get('user/profile', 'UserController@profile');
Route::post('user/profile', 'UserController@update_avatar');

Route::post('/comment/create', 'CommentController@store')->name('createcomment');
Route::get('/post/{id}', 'PostController@show')->name('showpost');
//Verwijderen van comments
Route::get('/comment/manage', 'CommentController@index')->name('managecomment');
Route::delete('/comment/manage/delete/{id}', 'CommentController@destroy')->name('deletecomment');
Route::get('/comment/manage/edit/{id}', 'CommentController@edit')->name('editcomment');
Route::patch('/comment/update/{id}', 'CommentController@update')->name('updatecomment');







Auth::routes();

