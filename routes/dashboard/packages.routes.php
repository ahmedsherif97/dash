<?php

route_group('package', function () {

    Route::group(['prefix' => 'packages'], function (){
        Route::get('/', 'PackageController@index')->name('packages.index')->middleware('permission:view_packages');
        Route::get('/create', 'PackageController@create')->name('packages.create')->middleware('permission:create_packages');
        Route::post('/', 'PackageController@store')->name('packages.store')->middleware('permission:create_packages');
        Route::get('/{id}/edit', 'PackageController@edit')->name('packages.edit')->middleware('permission:update_packages');
        Route::post('/{id}', 'PackageController@update')->name('packages.update')->middleware('permission:update_packages');
        Route::get('/{id}/delete', 'PackageController@destroy')->name('packages.destroy')->middleware('permission:delete_packages');
    });
});
