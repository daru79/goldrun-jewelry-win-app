<?php

use Illuminate\Support\Facades\Route;
use Native\Desktop\Facades\AutoUpdater;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/check-for-updates', function () {
    AutoUpdater::checkForUpdates();

    dd(AutoUpdater::checkForUpdates());

    return;
})->name('check-for-updates');
