<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes([
    'register'  => false,     // Registration Routes...
    'verify'    => true,       // Email Verification Routes...
    'reset'     => true,        // Password Reset Routes...
]);

Route::group( [
    'prefix'    => 'admin',
    'as'        => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'verified', 'admin']
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    // Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    // Route::resource('permissions', 'PermissionsController');

    // // Roles
    // Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    // Route::resource('roles', 'RolesController');

    // // Users
    // Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    // Route::resource('users', 'UsersController');

    // Authors
    Route::resource('authors', 'AuthorsController');

    // Categories
    Route::resource('categories', 'CategoriesController');

    // Menu
    Route::resource('menus', 'MenusController');

    // Tags
    Route::resource('tags', 'TagsController');

    // Posts
    Route::get('posts/{post}/comments', 'PostsController@comments')->name('posts.comments');
    Route::resource('posts', 'PostsController');

    // Posts
    Route::resource('comments', 'CommentsController');

    // Pages
    Route::resource('pages', 'PagesController');

    // Contacts
    Route::get('get-contacts', 'ContactController@getContacts')->name('contacts.get');
    Route::resource('contacts', 'ContactController');

    // Blogs
    // Route::get('get-blogs', 'BlogsController@getBlogs')->name('blogs.get');
    // Route::resource('blogs', 'BlogsController');

    // Setting
    Route::resource('setting', 'WebSettingController');

    // Main Page
    Route::resource('main-page', 'MainPageController');

});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

// Route::get('/artisan-run', 'Web\PagesController@cache');

Route::group([
    'prefix'        => LaravelLocalization::setLocale(),
    'middleware'    => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    'namespace'     => 'Web'
], function() {

    Route::get('/search',                       'PagesController@search')->name('search');

    Route::get('/',                             'PagesController@index')->name('home');

    Route::post('/',                            'PostsController@loadMore')->name('post.load');

    Route::get('/{slug}',                       'PostsController@index')->name('post.index');

    Route::get('/{category}/{author}/{title}',   'PostsController@show')->name('post.show');

    Route::get('/{category}/{author}/{title}',   'PostsController@show')->name('post.show');
    
    Route::post('/comment/reply',                'CommentsController@store')->name('comments.store');

});

