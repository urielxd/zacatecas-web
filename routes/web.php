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

Route::get('/', function () {
    if (Auth::user()) {
        return redirect()->route('home');
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Api
Route::middleware(['web'])->group(function () {
    Route::get('/api/categories', 'Api\ApiController@index')->name('api.categories');
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::resource('categories', 'CategoryController');
    Route::get('article/{id}', 'ArticleController@show')->name('article.show');
    Route::get('article/{id}/create', 'ArticleController@create')->name('article.create');
    Route::post('article/{id}/store', 'ArticleController@store')->name('article.store');
    Route::get('article/{id}/edit', 'ArticleController@edit')->name('article.edit');
    Route::delete('article/{id}', 'ArticleController@delete')->name('article.delete');
    Route::put('article/{id}', 'ArticleController@update')->name('article.update');
    Route::get('/administradores', 'HomeController@admin')->name('admin.index');
    //Administradores cuentas
    Route::get('/administrador/create', 'HomeController@admin_create')->name('admin.create');
    Route::post('/administrador/create', 'HomeController@admin_store')->name('admin.store');
    Route::get('/administrador/edit/{id}', 'HomeController@admin_edit')->name('admin.edit');
    Route::put('/administrador/edit/{id}', 'HomeController@admin_update')->name('admin.update');
    Route::delete('/administrador/delete/{id}', 'HomeController@admin_delete')->name('admin.delete');
    Route::get('/get/administradores', 'HomeController@admin_json');

    //Edit account
    Route::get('/cuenta', 'HomeController@account')->name('account.edit');
    Route::put('/cuenta/update', 'HomeController@update_account')->name('account.update');
});
