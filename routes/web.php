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

Route::get('/', function () {
    return view('layouts.backend');
});

Route::group(['prefix' => 'backend'], function (){
    Route::get('/dashboard', \App\Http\Livewire\Backend\Dashboard\Index::class)->name('dashboard');

    Route::get('/category', \App\Http\Livewire\Backend\Category\Index::class)->name('category.index');
    Route::get('/category/create', \App\Http\Livewire\Backend\Category\Create::class)->name('category.create');
    Route::get('/category/{category}/edit', \App\Http\Livewire\Backend\Category\Edit::class)->name('category.edit');

    Route::get('/post', \App\Http\Livewire\Backend\Post\Index::class)->name('post.index');
    Route::get('/post/create', \App\Http\Livewire\Backend\Post\Create::class)->name('post.create');
    Route::get('/post/{post}/edit', \App\Http\Livewire\Backend\Post\Edit::class)->name('post.edit');
    Route::get('/post/{post}/detail', \App\Http\Livewire\Backend\Post\Detail::class)->name('post.detail');

    Route::get('/profile', \App\Http\Livewire\Backend\Profile\Index::class)->name('profile');
});
