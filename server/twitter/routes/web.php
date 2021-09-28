<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
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

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'LinkController@index');
    Route::get('/mail', 'MailSendController@send');
    Route::post('/create', 'LinkController@create');
    Route::post('/delete/{id}', 'LinkController@delete');
    // いいねボタン
    Route::get('/edit-page', 'UsersController@editPage');
    Route::post('/edit', 'UsersController@edit');
    Route::post('/edit-page/image', 'UsersController@image')->name('image_route');
    Route::post('/edit-page/email', 'UsersController@userEmailChange')->name('email.change');
    Route::get('/edit-page/userEmailUpdate/', 'UsersController@userEmailUpdate');
    Route::get('/users', 'UserFollowController@index');
    Route::get('/users-follow', 'UserFollowController@following');
    Route::get('/users-follower', 'UserFollowController@follower');
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('unfollow');
    });
    //いいね機能//
    Route::get('/twitter/like/{id}', 'LinkController@like')->name('twitter.like');
    Route::get('/twitter/unlike/{id}', 'LinkController@unlike')->name('twitter.unlike');
    Route::get('/favorite', 'LinkController@favorite');

    Route::get('/getData', 'LinkController@getData');
    Route::get('/favoriteData', 'LinkController@favoriteData');
    Route::post('/addData', 'LinkController@addData');
    Route::post('/deleteData/{id}', 'LinkController@deleteData');

    Route::put('/api/like/{id}', 'LinkController@like');
    Route::delete('/api/unlike/{id}', 'LinkController@unlike');
    Route::delete('/api/unlike2/{id}', 'LinkController@unlike2');

});