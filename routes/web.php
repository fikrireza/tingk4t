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
    return view('frontend.first-page.index');
})->name('frontend.dekstop');

Route::get('/home', function () {
    return view('frontend.home-page.index');
})->name('frontend.home');

Route::get('/about/our-commitment', function () {
    return view('frontend.about-page.our-commitment');
})->name('frontend.about.our-commitment');

Route::get('/about/flow-design', function () {
    return view('frontend.about-page.flow-design');
})->name('frontend.about.flow-design');

Route::get('/services', function () {
    return view('frontend.services-page.index');
})->name('frontend.services');
