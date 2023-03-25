<?php

route_group('homesection', function () {

    Route::group(['prefix' => 'homesections'], function (){
        Route::get('/create/{id}', 'HomeSectionController@create')->name('homesections.create')->middleware('permission:create_homesections');
        Route::post('/', 'HomeSectionController@store')->name('homesections.store')->middleware('permission:create_homesections');
        Route::get('/{id}', 'HomeSectionController@index')->name('homesections.index')->middleware('permission:view_homesections');
        Route::get('/{id}/edit', 'HomeSectionController@edit')->name('homesections.edit')->middleware('permission:update_homesections');
        Route::post('/{id}', 'HomeSectionController@update')->name('homesections.update')->middleware('permission:update_homesections');
        Route::get('/{id}/delete', 'HomeSectionController@destroy')->name('homesections.destroy')->middleware('permission:delete_homesections');
    });
});
