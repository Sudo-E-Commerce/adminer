# Hướng dẫn sử dụng Sudo Log Viewer #

## Cài đặt để sử dụng ##
- Để sử dụng thì cần phải thêm text prefix config('SudoAdminer.route.prefix') tại except đặt ở app/Http/Middleware/VerifyCsrfToken.php

	protected $except = [
        {prefix_text_here},
		...
    ];

## Cấu hình tại Menu ##

	[
    	'type' 		=> 'single',
		'name' 		=> 'Quản lý Database',
		'icon' 		=> 'fas fa-database',
		'route' 	=> 'admin.adminer.view',
		'role'		=> 'adminer_view'
	],

## Cấu hình tại Module ##

## Publish ##
* Mặc định khi chạy lệnh **php artisan sudo/core** đã sinh luôn cho package này, nhưng có một vài trường hợp chỉ muốn tạo lại riêng cho package này thì sẽ chạy các hàm dưới đây:
* Khởi tạo chung theo core
	- Tạo assets và configs

		php artisan vendor:publish --tag=sudo/core	

	- Chỉ tạo assets

		php artisan vendor:publish --tag=sudo/core/assets

	- Chỉ tạo configs

		php artisan vendor:publish --tag=sudo/core/config

* Khởi tạo riêng theo package
	- Tạo assets và configs

		php artisan vendor:publish --tag=sudo/adminer	

	- Chỉ tạo assets

		php artisan vendor:publish --tag=sudo/adminer/assets

	- Chỉ tạo configs

		php artisan vendor:publish --tag=sudo/adminer/config

* Lưu ý: Nếu muốn ghi đè lên các file config hiện tại thì sử dụng thêm tag "--force" (Chỉ config mới dùng), các file assets sẽ mặc định ghi đè

## Sử dụng ##

- Cấu hình Prefix tại config('SudoAdminer.route.prefix')

- Cấu hình Middleware tại config('SudoAdminer.route.middleware')