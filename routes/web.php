<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('public.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


#Admin Part Start
//Route::get('/post','Admin\PostController@all_post')->name('all_post');
//Route::get('/{anypath}','HomeController@index')->where('path','.*');

Route::group(['middleware' => ['auth']],  function (){
    //Category Route
    Route::post('/add-category','Admin\CategoryController@add_category');
    Route::get('/category','Admin\CategoryController@all_category');
    Route::get('/category/{id}','Admin\CategoryController@delete_category');
    Route::get('editcategory/{id}','Admin\CategoryController@edit_category');
    Route::post('update-category/{id}','Admin\CategoryController@update_category');
    Route::get('/deletecategory/{id}','Admin\CategoryController@selected_category');


//Post Route
    Route::get('/post','Admin\PostController@all_post');
    Route::post('/savepost','Admin\PostController@save_post');
    Route::get('/delete/{id}','Admin\PostController@delete_post');
    Route::get('/post/{id}','Admin\PostController@edit_post');
    Route::post('/update/{id}','Admin\PostController@update_post');

});

Route::get('/blogpost','BlogController@get_all_blog_post');
Route::get('/singlepost/{id}','BlogController@getpost_by_id');

Route::get('/categories','BlogController@get_all_category');
Route::get('/categorypost/{id}','BlogController@get_all_post_by_cat_id');
Route::get('/search','BlogController@search_post');
Route::get('/latestpost','BlogController@latest_post');
