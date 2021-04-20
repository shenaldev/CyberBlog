<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Auth::routes();

/**
 * Normal Users To Manage There Account
 */

Route::post('/my-account/update/{id}',[
    'uses' => 'MyAccountController@update',
    'as' => 'myaccount.update'
]);

Route::post('/my-account/update-password/{id}',[
    'uses' => 'MyAccountController@updatePassword',
    'as' => 'myaccount.updatePassword'
]);

Route::post('/my-account/update-avatar/{userID}',[
    'uses' => 'MyAccountController@updateAvatar',
    'as' => 'myaccount.updateAvatar'
]);

Route::get('/my-account',[
    'uses' => 'MyAccountController@index',
    'as' => 'myaccount',
]);

/**
 * Social Media Login Routes
 *
 */

Route::get('/login/{provider}',[
    'uses' => 'SocialAuthController@redirectToProvider',
    'as' => 'social.login'
]);

Route::get('/login/{provider}/callback',[
    'uses' => 'SocialAuthController@handleProviderCallback',
    'as' => 'social.callback'
]);

Route::get('/test',[
    'uses' => 'FrontEndController@test',
    'as' => 'social'
]);
/**
 * File Manager Routes
 *
 */

Route::get('/filemanager',[
    'uses' => 'FilemanagerController@index',
    'as' => 'filemanager.index'
]);

Route::get('/filemanager/search/{query}',[
    'uses' => 'FilemanagerController@search',
    'as' => 'filemanager.search'
]);

Route::post('/filemanager/upload',[
    'uses' => 'FilemanagerController@upload',
    'as' => 'filemanager.upload'
]);

Route::post('/filemanager/delete',[
    'uses' => 'FilemanagerController@delete',
    'as' => 'filemanager.delete'
]);

/**
 * Posts Like And Dislike Routes LikeController
 */
Route::post('/post/vote/{value}',[
    'uses' => 'VoteController@vote',
    'as' => 'post.vote'
]);

/**
 *
 * Frontend Routes Posts Categories
 */
Route::get('/post/{slug}',[
    'uses' => 'FrontEndController@post',
    'as' => 'post'
]);

Route::get('/category/{category}/posts',[
    'uses' => 'FrontEndController@categoryAllPosts',
    'as' => 'category.posts'
]);

/** All Categories */
Route::get('/categories',[
    'uses' => 'FrontEndController@categories',
    'as' => 'categories'
]);

/** Author Route Frontend */
Route::get('/author/{name}',[
    'uses' => 'FrontEndController@author',
    'as' => 'author'
]);

/** Search Posts Using Keyword */
Route::get('/search',[
    'uses' => 'FrontEndController@search',
    'as' => 'search'
]);

/** Posts For Tag Name */
Route::get('/tag/{tag}/posts',[
    'uses' => 'FrontEndController@postsForTag',
    'as' => 'tag.posts'
]);

/** Contact Us Page */
Route::get('/contact-us',[
    'uses' => 'ContactController@index',
    'as' => 'contact-us'
]);

/**
 * Admin Panel Routes
 *
 */
Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard',[
        'uses' => 'DashboardController@index',
        'as' => 'dashboard'
    ]);

    /**
     * User Controller Routes
     */
    Route::post('/user/permission/{id}/{access}',[
        'uses' => 'UserController@permission',
        'as' => 'user.permission'
    ]);

    Route::resource('user', 'UserController');

    /**
     * Post Controller Routes
     */
    Route::get('/post/trash',[
        'uses' => 'PostController@trash',
        'as' => 'post.trash'
    ]);

    Route::post('/post/restore/{id}',[
        'uses' => 'PostController@restore',
        'as' => 'post.restore'
    ]);

    Route::post('/post/action',[
        'uses' => 'PostController@action',
        'as' => 'post.action'
    ]);

    Route::post('/post/kill/{id}',[
        'uses' => 'PostController@kill',
        'as' => 'post.kill'
    ]);

    Route::resource('post', 'PostController');

    /**
     * Category Controller Routes
     */

    Route::post('/category/action',[
        'uses' => 'CategoryController@action',
        'as' => 'category.action'
    ]);

    Route::resource('category', 'CategoryController');

    /**
     * Tag Controller Routes
     */

    Route::post('/tag/action',[
        'uses' => 'TagController@action',
        'as' => 'tag.action'
    ]);

    Route::resource('tag', 'TagController')->except([
        'create','edit'
    ]);

    /**
     * Settings Controller Routes
     */

    Route::get('/settings',[
        'uses' => 'SettingController@index',
        'as' => 'settings.index'
    ]);

    Route::post('/settings/update',[
        'uses' => 'SettingController@update',
        'as' => 'settings.update'
    ]);

    Route::get('/settings/homepage',[
        'uses' => 'SettingController@homeSettings',
        'as' => 'settings.home'
    ]);

    Route::post('/settings/homepage/update',[
        'uses' => 'SettingController@homeSettingsUpdate',
        'as' => 'settings.home.update'
    ]);

});
