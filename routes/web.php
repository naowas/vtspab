<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('blog/{post}', [App\Http\Controllers\HomeController::class, 'showBlog'])->name('blog.show');
Route::get('members', [App\Http\Controllers\HomeController::class, 'member'])->name('member');
