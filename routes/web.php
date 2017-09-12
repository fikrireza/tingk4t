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
	Route::get('/', 'Frontend\FrontendController@dekstop')
		->name('frontend.dekstop');

	Route::get('/home', 'Frontend\FrontendController@home')
		->name('frontend.home');

	Route::get('/about/our-commitment', 'Frontend\FrontendController@aboutOurCommitment')
		->name('frontend.about.our-commitment');

	Route::get('/about/flow-design', 'Frontend\FrontendController@aboutFlowDesign')
		->name('frontend.about.flow-design');

	Route::get('/services', 'Frontend\FrontendController@services')
		->name('frontend.services');

	Route::get('/projects', 'Frontend\FrontendController@projects')
		->name('frontend.projects');

	Route::get('/contact', 'Frontend\FrontendController@contactView')
		->name('frontend.contact');
	Route::post('/contact/store', 'Frontend\FrontendController@contactStore')
		->name('frontend.contact.store');

	Route::get('/single-page', 'Frontend\FrontendController@singlePage')
		->name('frontend.singlePage');
// END FRONTEND

// START BACKEND
  // Auth::routes();
  Route::prefix('admin')->group(function(){

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('loginForm');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

		Route::get('verify/{confirmation_code}', 'Backend\AccountController@verify')->name('verify.index')->middleware('guest');
		Route::post('verify', 'Backend\AccountController@verifyStore')->name('verify.store');

    // Middleware Auth
    Route::middleware(['auth'])->group(function(){

      Route::get('dashboard', 'Backend\DashboardController@index')->name('dashboard');

      // Projects
      Route::get('projects', 'Backend\ProjectsController@index')->name('projects.index');
      Route::get('projects/add', 'Backend\ProjectsController@add')->name('projects.add');
      Route::post('projects/add', 'Backend\ProjectsController@store')->name('projects.store');
      Route::get('projects/edit/{slug}', 'Backend\ProjectsController@edit')->name('projects.edit');
      Route::post('projects/edit', 'Backend\ProjectsController@update')->name('projects.update');
      Route::get('projects/publish/{id}', 'Backend\ProjectsController@publish')->name('projects.publish');
      Route::get('produk/delete/{id}', 'Backend\ProjectsController@delete')->name('projects.delete');

      // Inbox
      Route::get('inbox', 'Backend\InboxController@index')->name('inbox.index');


			// Account
      Route::get('account', 'Backend\AccountController@index')->name('account.index');
      Route::post('account', 'Backend\AccountController@store')->name('account.store');
			Route::get('account/reset/{id}', 'Backend\AccountController@reset')->name('account.reset');
      Route::patch('account/update', 'Backend\AccountController@update')->name('account.update');

			// Account Profile
			Route::get('account/profile', 'Backend\AccountController@profile')->name('account.profile');
			Route::post('account/profile', 'Backend\AccountController@changeProfile')->name('account.changeProfile');
      Route::post('account/profile/password', 'Backend\AccountController@changePassword')->name('account.changePassword');

    });

  });
// END BACKEND
