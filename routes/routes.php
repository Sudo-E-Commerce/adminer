<?php
App::booted(function() {
	$namespace = 'Sudo\Adminer\Http\Controllers';
	
	Route::namespace($namespace)->name('admin.')->middleware(config('SudoAdminer.route.middleware'))->group(function() {
		// view
		Route::any(config('SudoAdminer.route.prefix'), 'AdminerController@index')->name('adminer.index');
		Route::get(config('app.admin_dir').'/adminer/view', 'AdminerController@view')->name('adminer.view');
	});
});