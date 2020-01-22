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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home','HomeController@index');

Auth::routes();

Route::get('/home/{country?}', 'HomeController@index')->name('home');
Route::get('/blog/create', 'BlogController@create')->name('blog.create');
Route::post('/blog/store', 'BlogController@store')->name('blog.store');


// Route::get('/blogs', 'BlogController@index')->name('blogs');
Route::get('/blog/show/{id}', 'BlogController@show')->name('blog.show');
Route::get('/blog/show/{id}', 'HomeController@show')->name('showblog');

Route::get('/comment/{id}', 'CommentsController@show')->middleware('auth');


Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

// Route::delete('/comments/{comment}', 'CommentController@destroy');
// Route::post('/blog/{blog}/comments', 'CommentController@store');

Route::get('create','CountryController@index');




Route::get('admin/routes', 'HomeController@admin')->middleware(['admin','auth']);

Route::get('my_favorites', 'UsersController@myFavorites')->middleware('auth');

Route::group(['middleware'=>['auth']], function (){
    Route::post('favorite/{blog}/add','FavoriteController@add')->name('blog.favorite');
    // Route::post('comment/{post}','CommentController@store')->name('comment.store');
    Route::get('/delete/{id}', 'CommentController@delete');
    Route::get('/delete/favorite/{id}', 'UsersController@delete');


    Route::get('/comment/edit/{id}', 'CommentController@edit');
    Route::put('/comment/update/{id}', 'CommentController@update');
 });

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('blogs','BlogController');

});


