<?php

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'Admin\HomeController@index')->name('admin.index');
    Route::get('settings', 'Admin\SettingController@index')->name('admin.setting');
    Route::post('settings', 'Admin\SettingController@store')->name('admin.setting.store');
    Route::post('settings/logo', 'Admin\SettingController@storeLogo')->name('admin.setting.store-logo');

    Route::group(['prefix' => 'category'], function(){
        Route::get('/', 'Admin\CategoryController@index')->name('admin.category');
        Route::get('/create/{category?}', 'Admin\CategoryController@create')->name('admin.category.create');
        Route::post('/store', 'Admin\CategoryController@store')->name('admin.category.store');
        Route::post('/update/{category}', 'Admin\CategoryController@update')->name('admin.category.update');
        Route::get('/delete/{category}', 'Admin\CategoryController@destroy')->name('admin.category.delete');

    });

    Route::group(['prefix' => 'news'], function(){

        
        Route::post('store','Admin\NewsController@store')->name('admin.news.store');
        
        Route::post('udpate/{news}','Admin\NewsController@update')->name('admin.news.update');
        
        Route::get('delete/{news}', 'Admin\NewsController@destroy')->name('admin.news.delete');

        Route::get('view/{news}/{slug}', 'Admin\NewsController@view')->name('admin.news.view');
        
        Route::get('create/{type?}/{news?}','Admin\NewsController@create')->name('admin.news.create');
        
        Route::get('/{type?}','Admin\NewsController@index')->name('admin.news');
    });
});
