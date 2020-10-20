<?php

Route::group(['namespace' => 'duncanrmorris\assays\Http\Controllers'], function()
{
    Route::group(['middleware' => ['web', 'auth']], function(){
        
        Route::get('assays', 'AssaysController@index')->name('assays');
        

    });
});