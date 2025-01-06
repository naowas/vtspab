<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('blog/{post}', [App\Http\Controllers\HomeController::class, 'showBlog'])->name('blog.show');
Route::get('members', [App\Http\Controllers\HomeController::class, 'member'])->name('member');
Route::get('btrc-notice', [App\Http\Controllers\HomeController::class, 'btrcNotice'])->name('btrc-notice');
Route::get('btrc-licensed-companies', [App\Http\Controllers\HomeController::class, 'btrcLicensed'])->name('btrc-licensed-companies');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::post('/mail', [HomeController::class, 'contactMail'])->name('contact-mail');
