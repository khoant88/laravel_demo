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
//Route redirect
Route::redirect('/here', '/');

//Route view
Route::view('/route-view', 'route-view', ['name' => 'test']);

// require parameter
Route::get('user/{id}', function ($id) {
    return "ID:" . $id;
})->where('id', '[0-9]+');

//optional parameter
Route::get('user/{name?}', function($name = 'KhoaNT'){
   return "Name :" . $name ;
})->where('name', '[A-Za-z]+');

// Define pattern in RouteServiceProvider
Route::get('product/{id}', function ($id) {
    return "Product ID:" . $id;
});

//Name routes
Route::get('user/profile', function () {
    //
})->name('profile');

Route::get('user/profileSecond', 'UserController@profile')->name('profileSecond');

//Middleware
//Route::middleware(['first', 'second'])->group(function(){
//    Route::get('/', function(){
//
//    });
//    Route::get('/test', function(){
//
//    });
//});

//Prefix
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', function(){

    })->name('dashboard');
});

//Implicit Binding
Route::get('/api/users/{user}', function(\App\User $user){
    return $user->email;
});