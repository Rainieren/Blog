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




Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {
    Route::get('/post/create', 'PostController@create')->name('createpost');
    Route::post('/post/create', 'PostController@store');

    //Het editen van een post
    Route::get('/post/edit/{id}', 'PostController@edit')->name('editpost');
    Route::patch('/post/update/{id}', 'PostController@update')->name('updatepost');

    //Laat de posts zien uit de database met Opties
    Route::get('/post/manage', 'ManageController@index')->name('managepost');
    Route::delete('/post/manage/delete/{id}', 'ManageController@destroy')->name('deletepost');

    //Het maken van eem comment
    Route::post('/comment/create', 'CommentController@store')->name('createcomment');

    //Laat gebruikers zien uit de database met Opties
    Route::get('/users/manage', 'UserController@index')->name('manageusers');
    Route::delete('/user/manage/delete/{id}', 'UserController@destroy')->name('deleteuser');

    Route::get('/users/edit/{id}', 'UserController@edit')->name('edituser');
    Route::patch('/users/update/{id}', 'UserController@update')->name('updateuser');


    //Laat profiel zien van gebruiker (Dynamish)
    Route::get('/profile/username'. 'ProfileController@create')->name('profiel');
});


Route::get('/post/{id}', 'PostController@show')->name('showpost');





Auth::routes();

