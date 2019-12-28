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

Route::post('/logindata',"logincontroller@login");
Route::post('/registerdata',"logincontroller@register");
Route::post('/chickphone',"logincontroller@chickphone");
Route::post('/chickcode',"logincontroller@chickcode");
Route::get('/register',function () {
    return view('register');
});
Route::get('/registerform',function () {

    if(session('phone')){
        return view('registerform');
    }
    else {
        return view('register');
    }
});
Route::get('/entercode',function () {
    if(session('phone')){
        return view('entercode');
    }
    else{
        return view('register');
    }
});
Route::get('/home',function () {
    if(session('id')&&session('name')&&session('email')){
        return view('home');
    }else{
        return view('welcome');
    }
});

Route::get("{path}", function () {
    return view('welcome');
})->where('path', '.+');