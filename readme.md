## Hướng dẫn sử dụng Sudo Adminer ##

**Giới thiệu:** Đây là package dùng để quản lý trực tiếp Database của dự án.

Mặc định package sẽ tạo ra giao diện quản lý DB được đặt tại `/{admin_dir}/adminer/view`, trong đó admin_dir là đường dẫn admin được đặt tại `config('app.admin_dir')`. Chỉ dev mới được truy cập trang này.

### Cài đặt để sử dụng ###

- Package cần phải có base `sudo/core` để có thể hoạt động không gây ra lỗi
- Để có thể sử dụng Package cần require theo lệnh `composer require sudo/adminer`
- Để sử dụng thì cần phải thêm text prefix config('SudoAdminer.route.prefix') tại except đặt ở app/Http/Middleware/VerifyCsrfToken.php 

		protected $except = [ 
			{prefix_text_here},
			...
		];

- Publish các file cần thiết sử dụng `php artisan vendor:publish --tag=sudo/adminer`

### Cấu hình tại Menu ###

	[
    	'type' 		=> 'single',
		'name' 		=> 'Quản lý Database',
		'icon' 		=> 'fas fa-database',
		'route' 	=> 'admin.adminer.view',
		'role'		=> 'adminer_view'
	],
 
- Vị trí cấu hình được đặt tại `config/SudoMenu.php`
- Để có thể hiển thị tại menu, chúng ta có thể đặt đoạn cấu hình trên tại `config('SudoMenu.menu')`

### Publish ###

Mặc định khi chạy lệnh `php artisan sudo/core` đã sinh luôn cho package này, nhưng có một vài trường hợp chỉ muốn tạo lại riêng cho package này thì sẽ chạy các hàm dưới đây:

* Khởi tạo chung theo core
	- Tạo assets và configs `php artisan vendor:publish --tag=sudo/core`
	- Chỉ tạo assets `php artisan vendor:publish --tag=sudo/core/assets`
	- Chỉ tạo configs `php artisan vendor:publish --tag=sudo/core/config`
* Khởi tạo riêng theo package
	- Tạo assets và configs `php artisan vendor:publish --tag=sudo/adminer`
	- Chỉ tạo assets `php artisan vendor:publish --tag=sudo/adminer/assets`
	- Chỉ tạo configs `php artisan vendor:publish --tag=sudo/adminer/config`

### Sử dụng ###

Cấu hình Đường dẫn tại config('SudoAdminer.route.prefix')

Cấu hình Middleware tại `config('SudoAdminer.route.middleware')` hoặc .ENV `SUDO_ADMINER_MIDDLEWARE={middleware_string}`, trong đó middleware_string là chuỗi các middleware cách nhau bởi dấu phẩy ',' VD web,auth-admin