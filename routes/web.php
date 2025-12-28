<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Native\Desktop\Facades\AutoUpdater;

Route::get('/', function () {
    $posts = Post::all();
    return view('welcome',
        [
            'posts' => $posts
        ]
    );
});

Route::get('/check-for-updates', function () {
    AutoUpdater::checkForUpdates();
    AutoUpdater::downloadUpdate();
    AutoUpdater::quitAndInstall();

    return;
})->name('check-for-updates');
