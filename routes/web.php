<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('contact.index');
});

Route::resource('contact', \App\Http\Controllers\ContactController::class);
