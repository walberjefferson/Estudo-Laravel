<?php


Route::get('/', 'PostsController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    /*Route::controllers([
        'posts' => 'PostsAdminController'
    ]);
    */
    Route::group(['prefix'=>'posts'], function(){

        Route::get('', ['as' => 'admin.posts.index', 'uses' => 'PostsAdminController@index']);
        Route::get('create', ['as' => 'admin.posts.create', 'uses' => 'PostsAdminController@create']);
        Route::get('edit/{id}', ['as' => 'admin.posts.edit', 'uses' => 'PostsAdminController@edit']);
        Route::get('destroy/{id}', ['as' => 'admin.posts.destroy', 'uses' => 'PostsAdminController@destroy']);

        Route::put('update/{id}', ['as' => 'admin.posts.update', 'uses' => 'PostsAdminController@update']);

        Route::post('store', ['as' => 'admin.posts.store', 'uses' => 'PostsAdminController@store']);
    });
});