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
    return view('election-home');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('nominations/vote/{category_id}/{nomination_id}','NominationController@vote')->name('nominations.vote');

//facebook Login
// Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name("login.facebook");
// Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


// access when user is login and is an admin and moderator
Route::middleware(['auth','moderator'])->group(function(){

//Users
Route::get('users', 'UserController@index');
Route::delete('users/{id}', 'UserController@destroy');
Route::put('users/{id}', 'UserController@update');
Route::patch('users/{id}', 'UserController@update');

//Categories
Route::get('categories','CategoriesController@index');
//Route::get('categories/{id}','CategoriesController@show');
Route::delete('categories/{id}', 'CategoriesControllerr@destroy');
Route::match(['put','patch'],'categories/{id}','CategoriesController@update');
Route::post('categories','CategoriesController@store');
// Route::get('categories/{id}','CategoriesController@create');

//Nominations
Route::delete('nominations/{id}', 'NominationController@destroy');
Route::match(['put','patch'],'nominations/{id}','NominationController@update');
Route::resource('nominations', 'NominationController');
Route::post('nominations','NominationController@store')->name('nominations.store');


Route::resource('nominationUsers', 'NominationUserController');
Route::resource('votings', 'VotingController');
//Route::resource('categories', 'CategoriesController');


});

//only admin ca access this routes
Route::middleware(['admin','auth'])->group(function(){

Route::resource('roles', 'RoleController');
Route::resource('settings', 'SettingController');
Route::resource('users', 'UserController');

});
 // can be accessed  when user is logged in
Route::middleware(['auth'])->group(function(){
Route::resource('nominations', 'NominationController');
Route::resource('votings', 'VotingController');
Route::resource('categories', 'CategoriesController');


});




