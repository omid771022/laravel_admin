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
Auth::routes(['verify' => true]);
//Route::get('/','frontController@index');
Route::get('/', 'homeContrioller@index')->name('home');

//Route::get('/s','homeContrioller@samples')->name('samples');
Route::get('/admin', 'backController@admin')->name('admin')->middleware('CheckRole');

Route::get('admin/edit/{user}', 'backController@edit')->name('profiler1');
Route::post('admin/editupdate/{user}', 'backController@update')->name('profileupdat');
Route::get('/admin/delete/{user}', 'backController@destroy')->name('deleted.user');
Route::get('/admin/users/status/{user}', 'backController@status')->name('admin_user_status');
Route::get('/admin/users', 'UsersController@index')->name('adminusers')->middleware('CheckRole');
Route::get('/profile/{user}', 'UserController@edit')->name('profile');
Route::post('/profileupdate/{user}', 'UserController@update')->name('profileupdate');
Route::post('/comment/{articles}', 'frontCommentController@store')->name('admin_comment_store');
///categories route whit prefix
   Route::prefix('admin/categories')->middleware('CheckRole')->group(function () {

    Route::get('/', 'CategoryController@index')->name('admin.Categories');
    Route::post('/store', 'CategoryController@store')->name('admin_Categories_store');
    Route::get('/create', 'CategoryController@create')->name('admin.Categories.create');
    Route::get('/edit/{category}', 'CategoryController@edit')->name('admin_Categories_edit');
    Route::post('/update/{category}', 'CategoryController@Update')->name('admin_Categories_update');
    Route::get('/destroy/{category}', 'CategoryController@destroy')->name('admin.Categories.destroy');
});



Route::prefix('admin/articles')->middleware('CheckRole')->group(function () {
    Route::get('/', 'ArticleController@index')->name('admin.articles');
    Route::post('/store', 'ArticleController@store')->name('admin_articles_store');
    Route::get('/admin/article/status/{articles}', 'ArticleController@status')->name('admin_article_status');
    Route::get('/create', 'ArticleController@create')->name('admin.articles.create');
    Route::get('/edit/{articles}', 'ArticleController@edit')->name('admin_articles_edit');
    Route::post('/update/{articles}', 'ArticleController@update')->name('admin_articles_update');
    Route::get('/destroy/{articles}', 'ArticleController@destroy')->name('admin.articles.destroy');
    Route::get('/articles/{articles}', 'ArticleController@show')->name('show_article');
});
Route::get('articles', 'frontUserController@index')->name('article')->middleware(['auth', 'verified']);



Route::prefix('admin/comments')->middleware('CheckRole')->group(function () {
    Route::get('/', 'commentController@index')->name('admin.comments');
    Route::get('/admin/comment/status/{comment}', 'commentController@status')->name('admin_comments_status');
    Route::get('/edit/{comment}', 'commentController@edit')->name('admin_comments_edit');
    Route::post('/update/{comment}', 'commentController@update')->name('admin_comments_update');
    Route::get('/destroy/{comment}', 'commentController@destroy')->name('admin.comments.destroy');
    Route::get('/articles/{comment}', 'commentController@show')->name('show_comments');
});

Route::prefix('admin/samples')->middleware('CheckRole')->group(function () {
    Route::get('/', 'SampleController@index')->name('admin.sample');
    Route::get('/create', 'SampleController@create')->name('admin.sample.create');
    Route::post('/store', 'SampleController@store')->name('admin_sample_store');
    Route::get('/admin/sample/status/{sample}', 'SampleController@status')->name('admin_Sample_status');
    Route::get('/edit/{sample}', 'SampleController@edit')->name('admin_sample_edit');
    Route::post('/update/{sample}', 'SampleController@update')->name('admin_sample_update');
    Route::get('/destroy/{sample}', 'SampleController@destroy')->name('admin.sample.destroy');
    Route::get('/samples/{sample}', 'SampleController@show')->name('show_sample');
});

Route::prefix('admin/mangecomment')->middleware('CheckRole')->group(function () {
    Route::get('/', 'ManagecommentController@index')->name('admin.mangecomment');
    Route::get('/destroy/{manage}', 'ManagecommentController@destroy')->name('admin.comment.destroy');
});



Route::post('/store', 'ManagecommentController@store')->name('store.comment');




Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
