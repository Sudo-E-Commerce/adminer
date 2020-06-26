<?php 

return [
	/* -----------------------------------------------------------------
     |  Route settings
     | -----------------------------------------------------------------
     */
    'route' => [
    	'prefix' 		=> env('SUDO_ADMINER_PATH') ? env('SUDO_ADMINER_PATH') : '/'.env('ADMIN_DIR', 'admin').'/adminer',
    	
		'middleware' 	=> env('SUDO_ADMINER_MIDDLEWARE') ? explode(',', env('SUDO_ADMINER_MIDDLEWARE')) : ['web', 'auth-admin', 'only-dev'],
    ],
];