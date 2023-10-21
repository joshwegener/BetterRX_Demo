<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// create a test route to test the cache is working
Route::get('/test', function () {
    // test the cache is working
    // get data from the cache
    $data = Cache::get('test');
    if ($data) {
        // data exists in the cache
        echo $data;
    } else {
        // data does not exist in the cache
        echo 'No data in the cache.';
        Cache::put('test', 'Hello World', 10);
    }
    // store data in the cache
});