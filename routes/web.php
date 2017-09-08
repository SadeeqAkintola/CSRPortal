<?php
Route::get('/', function () {
    return view('welcome');
})
//    ->middleware('auth')
;

Auth::routes();

//$this->get('events', 'Guest\EventsController@index')->name('events.index');
//$this->get('events/{event}', 'Guest\EventsController@show')->name('events.show');
$this->resource('events', 'Guest\EventsController');

$this->post('payment', 'Guest\PaymentsController@store')->name('guest.payment');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('events', 'Admin\EventsController');
    Route::post('events_mass_destroy', ['uses' => 'Admin\EventsController@massDestroy', 'as' => 'events.mass_destroy']);
    Route::resource('tickets', 'Admin\TicketsController');
    Route::post('tickets_mass_destroy', ['uses' => 'Admin\TicketsController@massDestroy', 'as' => 'tickets.mass_destroy']);
    Route::resource('payments', 'Admin\PaymentsController');

});


Route::resource('system-management/pillar', 'PillarController');

Route::resource('project', 'ProjectController');

Route::get('/details/{id}', 'ProjectController@details')->name('project.details');

Route::get('cpa-board/details/{id}', 'CPABoardController@details')->name('cpa-board.details');

Route::get('project-query', 'ProjectController@query')->name('project.query');

Route::resource('system-management/target', 'TargetController');

Route::resource('system-management/goal', 'GoalController');

//Route::post('system-management/pillar/search', 'DepartmentController@search')->name('department.search');

Route::resource('system-management/company', 'CompanyController');
//Route::post('system-management/company/search', 'CompanyController@search')->name('company.search');

Route::resource('cpa-board', 'CPABoardController');

Route::resource('system-management/division', 'DivisionController');
Route::post('system-management/division/search', 'DivisionController@search')->name('division.search');

Route::get('system-management/report', 'ReportController@index');
Route::post('system-management/report/search', 'ReportController@search')->name('report.search');
Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');

Route::get('avatars/{name}', 'EmployeeManagementController@load');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/reports/report-by-plant', 'ReportByPlantController@highchart')->name('report.plant');
Route::get('/reports/report-by-year', 'ReportByYearController@highchart')->name('report.year');
Route::get('/reports/report-by-pillar', 'ReportByPillarController@highchart')->name('report.pillar');