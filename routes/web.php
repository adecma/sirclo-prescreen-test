<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'source'], function() {
    $controller = 'SourceDataController';
    $name = 'src';

    Route::get('berat', "{$controller}@berat")->name("{$name}.berat");
});

Route::resource('berat', 'BeratController');
