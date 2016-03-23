<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home'
]);

Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@admin'
]);

Route::post('/getinsertform', ['as' => 'getinsertform', 'uses' => 'AdminController@getInsertForm'
]);

Route::get('/getinsertform', ['as' => 'getinsertform', 'uses' => 'AdminController@getInsertForm'
]);

Route::post('/adminfilter', ['as' => 'adminfilter', 'uses' => 'AdminController@adminFilter'
]);

Route::get('/',array('uses' => 'HomeController@showHomePage'));

Route::get('/test', ['as' => 'adminfilter', 'uses' => 'AdminController@selectFrom'
]);

Route::get('/blogs', ['as' => 'blogs', 'uses' => 'BlogController@showBlogs'
]);

Route::get('/moreblogs', ['as' => 'moreblogs', 'uses' => 'BlogController@moreBlogs'
]);

Route::get('/galleries', ['as' => 'galleries', 'uses' => 'GalleryController@showGalleries'
]);

Route::get('/gallery', ['as' => 'gallery', 'uses' => 'GalleryController@showGallery'
]);

Route::post('/admin/insert', ['as' => 'insert', 'uses' => 'AdminController@insertQuery'
Route::post('/insert', ['as' => 'insert', 'uses' => 'AdminController@insertQuery'
]);
