<?php

Route::get('/admin-login', 'Admin\LoginController@adminLogin')->name('admin.login.get');
Route::post('/admin-login', 'Admin\LoginController@login')->name('admin.login');


Route::get('/admin-forgot-password', 'Admin\ForgotPasswordController@adminPasswordChange')->name('admin.password.request');
Route::post('/admin-password-mail', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');


Route::get('/admin-password-reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('/admin-password-update', 'Admin\ResetPasswordController@reset')->name('admin.password.update');




Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/dashboard', 'Admin\AdminController@adminDashboaed')->name('admin.dashboard');
    Route::get('/admin-logout', 'Admin\AdminController@logout')->name('admin.logout');
});
