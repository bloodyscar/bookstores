<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('role:admin')->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('book', 'BookController@index')->name('book');

    Route::get('book/create', 'BookController@create')->name('book.create');
    Route::post('book/store', 'BookController@store')->name('book.store');

    Route::get('book/{book:slug}/edit', 'BookController@edit')->name('book.edit');
    Route::patch('book/{book:slug}/edit', 'BookController@update');

    Route::delete('book/{book:slug}/delete', 'BookController@destroy')->name('book.destroy');


    Route::get('member', 'UserController@index')->name('member');

    Route::get('member/{user:id}/edit', 'UserController@edit')->name('member.edit');
    Route::patch('member/{user:id}/edit', 'UserController@update');

    Route::delete('member/{user:id}/delete', 'UserController@destroy')->name('member.destroy');

    Route::get('transaction', 'TransactionController@index')->name('transaction');

    Route::get('transaction/{transaction:id}/edit', 'TransactionController@edit')->name('transaction.edit');
    Route::patch('transaction/{transaction:id}/edit', 'TransactionController@update');

    Route::get('book/{book:slug}', 'BookController@show');
});
