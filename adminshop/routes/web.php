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
    return view('welcome');
});


Route::prefix("product")->group(function (){
    Route::get('/index','ProductController@index');
    //trả về view thêm mới
    Route::get("/create","ProductController@create");
    //thêm mới bản ghi
    Route::post('/create','ProductController@addnew');

    //sửa bản ghi
    Route::get("edit/{id}","ProductController@getedit");
    Route::post("edit/{id}","ProductController@postedit");

    //sửa bản ghi
    Route::get("delete/{id}","ProductController@getdelete");
    Route::post("delete/{id}","ProductController@postdelete");
});
