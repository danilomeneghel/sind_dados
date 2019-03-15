<?php

Route::get('/', 'IndexController@index');

Route::get('unidade', 'IndexController@unidade')->name('unidade');
Route::get('tree_categoria', 'IndexController@tree_categoria')->name('tree_categoria');
Route::get('periodo', 'IndexController@periodo')->name('periodo');
