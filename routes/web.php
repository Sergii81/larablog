<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
//Start Page
Route::get('/', 'WelcomeController@index')->name('welcome');
//Start Page Category Filter
Route::get('/category/{category_id}', 'WelcomeController@category')->name('welcome.category');
//Start Page User Filter
Route::get('/user/{user_id}', 'WelcomeController@user')->name('welcome.user');

Route::group(['middleware' => 'auth'], function(){
    //View Blog and Enter to CPanel
    Route::get('/home', 'HomeController@index')->name('home');
    //Manage Categories
    Route::resource('/home/categories','CategoryController')->except(['show']);    
    //Manage Posts
    Route::resource('/home/posts','PostController');    
});