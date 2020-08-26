<?php

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'Admin\HomeController@index')->name('admin.index');
    Route::get('settings', 'Admin\SettingController@index')->name('admin.setting');
    Route::post('settings', 'Admin\SettingController@store')->name('admin.setting.store');
    Route::post('settings/logo', 'Admin\SettingController@storeLogo')->name('admin.setting.store-logo');
});
