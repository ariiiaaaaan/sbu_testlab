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

//use App\Http\Controllers\HomeController;

//include("Controllers/simple-php-captcha-master/simple-php-captcha.php");

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@showHomePage'
]);

Route::get('/', ['as' => 'homepage', 'uses' => 'HomeController@showHomePage'
]);

Route::get('/admin/{lang?}', ['as' => 'admin', 'uses' => 'AdminController@admin'
]);

Route::post('/getinsertform', ['as' => 'getinsertform', 'uses' => 'AdminController@getInsertForm'
]);

Route::get('/getinsertform', ['as' => 'getinsertform', 'uses' => 'AdminController@getInsertForm'
]);

Route::get('/getadmintable', ['as' => 'getadmintable', 'uses' => 'AdminController@getAdminTable'
]);

Route::post('/adminfilter', ['as' => 'adminfilter', 'uses' => 'AdminController@adminFilter'
]);

Route::get('/',array('uses' => 'HomeController@showHomePage'));

Route::get('/test', ['as' => 'adminfilter', 'uses' => 'AdminController@thumb'
]);

Route::get('/blogs', ['as' => 'blogs', 'uses' => 'BlogController@showBlogs'
]);

Route::get('/morecontents', ['as' => 'morecontents', 'uses' => 'ContentController@moreContents'
]);

Route::get('/galleries', ['as' => 'galleries', 'uses' => 'GalleryController@showGalleries'
]);

Route::get('/gallery', ['as' => 'gallery', 'uses' => 'GalleryController@showGallery'
]);

Route::get('/about', ['as' => 'gallery', 'uses' => 'HomeController@showAbout'
]);

Route::get('/scroll', ['as' => 'gallery', 'uses' => 'AboutController@autoScroll'
]);

Route::get('/cat', ['as' => 'cat', 'uses' => 'CategoryController@test']);

Route::get('/member', ['as' => 'member', 'uses' => 'MemberController@showMember']);

Route::post('/insert', ['as' => 'insert', 'uses' => 'AdminController@insertQuery']);

Route::get('/edit', ['as' => 'edit', 'uses' => 'AdminController@showEditForm']);

Route::get('/delete', ['as' => 'edit', 'uses' => 'AdminController@delete']);

Route::get('/adminlogin' ,  ['as' => 'adminlogin', 'uses' => 'AdminController@showLogin']);

Route::post('/adminlogin', ['uses' => 'AdminController@doLogin']);

Route::get('/logout', ['uses' => 'AdminController@doLogout']);

Route::get('/contents', ['uses' => 'ContentController@showContents']);

Route::get('/content', ['uses' => 'ContentController@showContent']);

Route::get('/lang', ['uses' => 'HomeController@setLang']);

Route::get('/search', ['uses' => 'HomeController@search']);

Route::get('/getcaptcha', ['uses' => 'HomeController@getCaptcha']);

//Route::get('/tp', simple_php_captcha());

Route::get('/contact', ['uses' => 'HomeController@contact']);

Route::get('/date', ['uses' => 'HomeController@datetest']);

Route::get('sendemail', function () {

    $hc =new HomeController();
    $vars = $hc->getVars();
    $data = array(
        'vars' => $vars
    );

    Mail::send('newsletterbody', $data, function ($message) {

        $message->from('nima.shirvanian@gmail.com', 'Learning Laravel');

        $message->to('nima.shirvanian@gmail.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});

Route::get('mail', function () {
    return view("newsletterbody");
});