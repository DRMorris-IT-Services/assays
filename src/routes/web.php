<?php

Route::group(['namespace' => 'duncanrmorris\assays\Http\Controllers'], function()
{
    Route::group(['middleware' => ['web', 'auth']], function(){
        
        Route::get('assays', 'AssaysController@index')->name('assays');

    ### CONTROLS ###
    Route::get('assays/controls/{id}', 'AssayscontrolsController@index')->name('assays.controls');
    Route::get('assays/controls/view/{id}', 'AssayscontrolsController@show')->name('assays.controls.view');
    Route::get('assays/controls/setup/{id}', 'AssayscontrolsController@create')->name('assays.controls.setup');
    Route::get('assays/controls/edit/{id}', 'AssayscontrolsController@edit')->name('assays.controls.edit');
    Route::put('assays/controls/update/{id}', 'AssayscontrolsController@update')->name('assays.controls.update');

    });
});