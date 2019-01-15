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
    //return view('welcome');
    return view('testing_wall');
});
//Charts
Route::get('piedonut','testingcontroller@barload');
Route::get('getbardetailse','testingcontroller@loadajaxbar')->name('getbardetailse');
Route::get('bar', function () {
    //return view('welcome');
    return view('Chart.bar');
});

Route::post("save","testingcontroller@index")->name("save_it");
Route::post("save_add","testingcontroller@add_alot")->name("save_add");
Route::post('upload_image','testingcontroller@upload_image')->name('upload_image');