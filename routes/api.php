<?php

Route::group(['prefix' => 'news-article'], function(){
    Route::get('{type}/{category?}', 'Frontend\NewsApiController@getNewsArticles');
});

Route::get('category', 'Frontend\CategoryApiController@getCategories');
