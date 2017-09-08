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

// START FRONTEND
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

	use App\Models\Projects;
	Route::get('/projects', function () {
		$call = Projects::where('flag_publish', 'Y')->orderBy('post_date', 'desc')->get();
	    return view('frontend.project-page.index', compact('call'));
	})->name('frontend.projects');
	
	Route::get('/contact', function () {
	    return view('frontend.contact-page.index');
	})->name('frontend.contact');
// END FRONTEND

// START BACKEND
  // Auth::routes();
  Route::prefix('admin')->group(function(){

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('loginForm');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Middleware Auth
    Route::middleware(['auth'])->group(function(){

      Route::get('dashboard', 'Backend\DashboardController@index')->name('dashboard');

      Route::get('account', 'Backend\AccountController@index')->name('account.index');
      Route::post('account', 'Backend\AccountController@store')->name('account.store');
      Route::patch('account/update', 'Backend\AccountController@update')->name('account.update');

      Route::get('account/profile', 'Backend\AccountController@profile')->name('account.profile');

    });

  });
// END BACKEND
