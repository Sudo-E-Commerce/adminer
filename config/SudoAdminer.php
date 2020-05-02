<?php 

return [
	/* -----------------------------------------------------------------
     |  Route settings
     | -----------------------------------------------------------------
     */
    'route' => [
    	'prefix' 		=> '/admin/adminer',
		'middleware' 	=> env('SUDO_ADMINER_MIDDLEWARE') ? explode(',', env('SUDO_ADMINER_MIDDLEWARE')) : ['web', 'auth-admin', 'only-dev'],
    ],
];