<?php
App::booted(function() {
	$namespace = 'Sudo\Adminer\Http\Controllers';
	
	Route::namespace($namespace)->name('admin.')->middleware(config('SudoAdminer.route.middleware'))->group(function() {
		// css route
		$prefix = config('SudoAdminer.route.prefix');
		$prefix_array = explode('/', $prefix);
		array_pop($prefix_array);
		$prefix_asset = implode('/', $prefix_array);
		Route::get($prefix_asset.'/adminer.css', function() {
			return redirect('/adminer.css');
		});
		// view
		Route::any(config('SudoAdminer.route.prefix'), 'AdminerController@index')->name('adminer.index');
		Route::get(config('app.admin_dir').'/adminer/view', 'AdminerController@view')->name('adminer.view');
	});
});