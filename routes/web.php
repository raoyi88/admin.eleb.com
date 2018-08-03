<?php

Route::resource('admin','AdminController');
Route::resource('shop','ShopController');
Route::resource('user','UserController')->middleware('check');
Route::get('/shop/change_status/{shop}','ShopController@changeStatus');
Route::get('login','LoginController@login');
Route::resource('login','LoginController');
Route::delete('logout','LoginController@logout')->name('logout');
Route::post('editpassword','AdminController@editpassword')->name('editpassword');
Route::post('newpass','AdminController@savenewpass')->name('newpass');
Route::resource('activity','ActivityController');
Route::get('all','ActivityController@all')->name('all');
Route::get('ongoing','ActivityController@ongoing')->name('ongoing');
Route::get('overdue','ActivityController@overdue')->name('overdue');
Route::resource('rbac','RbacController');
Route::resource('roles','RoleController');

//抽奖活动
Route::resource('event','EventController');

//奖品
Route::resource('eventprize','EventPrizeController');