<?php

Route::get('change-locale/{locale}', 'LanguageController@index')->name('change-locale');

Route::group([
    'prefix'    => '{locale}',
    'where'     => ['locale' => '[a-zA-Z]{2}'],
    'middleware'=> 'setlocale'
], function(){

    Route::get('/', function () {
        return view('frontend.landing');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
});
Route::get('/', function () {
    return redirect(app()->getLocale());
});




// including admin panel routes
require 'admin_routes.php';
