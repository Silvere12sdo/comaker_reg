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

Route::get('/login', function () {
    return view('login');
});
Route::get('/', 'GebruikerController@checkSession');
Route::get('/register','GebruikerController@create');
Route::get('/loguit', 'GebruikerController@loguit');
Route::post('/register','GebruikerController@store');
Route::post('/inlog','GebruikerController@inlog');

route::get('/resetpass', 'PasswordController@reset');
route::post('/mailpassword', 'PasswordController@mailNewPass');
route::get('/passreset/{email}', 'PasswordController@updatePass');
route::post('/passreset/updatepass','PasswordController@newpass');

Route::get('/student', 'DocentController@index');
Route::get('/student', function () {
    return view('student');
});
Route::get('/docent', 'DocentController@index');
Route::get('/docent', function () {
    return view('docent');
});
Route::get('/student/profiel', function () {
    return view('studentProfiel');
});
Route::get('docent/profiel', function () {
    return view('docentProfiel');
});


Route::get('/docent', 'DocentController@index');
Route::get('/docent/qr', function () {
    return view('QRTonen');
});
Route::get('/studentLogin', 'DocentController@registerLes');
Route::post('/studentLogin', 'DocentController@RegisterInlog');

Route::get('/docent/overzicht', 'overzichtController@docentOverzicht');
Route::get('/student/overzicht', 'overzichtController@studentOverzicht');

Route::get('/docent/lesregister/{les}/{token}', 'DocentController@registerLes');
Route::post('/RegisterInlog', 'DocentController@RegisterInlog');