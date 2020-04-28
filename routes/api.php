<?php

Route::group([
    'prefix' => 'auth'
], function () {

    Route::post('login', 'Auth\AuthController@login');
    Route::post('register', 'Auth\AuthController@register');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('mail', 'Auth\AuthController@checkmail');
    Route::get('me', 'Auth\AuthController@me');
    Route::post('payload', 'Auth\AuthController@payload');

});

Route::resource('/question','Question\QuestionController');
Route::post('/likes/{reply}','Likes\LikesController@store');
Route::delete('/likes/{reply}','Likes\LikesController@destroy');
Route::resource('/question/{question}/reply','Reply\ReplyController');
Route::resource('/category','Category\CategoryController');
