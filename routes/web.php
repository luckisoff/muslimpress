<?php
Route::get('change-locale/{locale}', 'LanguageController@index')->name('change-locale');

Route::group([
    'prefix'    => '{locale}',
    'where'     => ['locale' => '[a-zA-Z]{2}'],
    'middleware'=> 'setlocale'
], function(){

    Auth::routes();

    Route::get('{type?}/{category?}', 'Frontend\NewsController@listNews')->name('frontend.home');

    Route::get('/detail/{news}/{slug}', 'Frontend\NewsController@show')->name('frontend.news.detail');

    Route::group(['prefix' => 'news'], function(){
        Route::get('list/{category}', 'Frontend\NewsController@showList')->name('frontend.news.list');
    });

    Route::group(['prefix' => 'writer-request'], function(){
        Route::get('apply', 'Common\RequestWriterController@index')->name('frontend.writer.apply');
        Route::post('apply', 'Common\RequestWriterController@store')->name('frontend.writer.apply.store');
    });



    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/', function () {
    return redirect(app()->getLocale());
});


Route::post('deploy','Admin\DeployController@deploy');

// web api
Route::prefix('api/v1')->group(function(){

    Route::group(['prefix' => 'news-article'], function(){
        Route::get('react/{news}', 'Frontend\NewsApiController@likeReact');

        Route::group(['prefix'=> 'comment'], function(){

            Route::post('{news}', 'Frontend\NewsApiController@createComment');
            
            Route::get('{news}', 'Frontend\NewsApiController@getComments');
            
            Route::get('delete/{comment}', 'Frontend\NewsApiController@deleteComment');
        });
        
        Route::get('{type}/{category?}', 'Frontend\NewsApiController@getNewsArticles');
        
    });

    Route::get('category', 'Frontend\CategoryApiController@getCategories');

});
// including admin panel routes
require 'admin_routes.php';

