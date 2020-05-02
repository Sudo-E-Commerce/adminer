<?php

namespace Sudo\Adminer\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminerController extends Controller
{

	function __construct() {
        // Sử dụng middleware để check phân quyền và set ngôn ngữ
        $this->middleware(function ($request, $next) {
            // Đặt lại ngôn ngữ nếu trên url có request setLanguage
            setLanguage($request->setLanguage);

            return $next($request);
        });
    }

    /**
     * Giao diện hiển thị admin chính
     * Url = config('SudoAdminer.route.prefix')
     */
    public function index() {
        return view('Adminer::adminer');
    }

    /**
     * View hiển thị nội dung lấy chung với giao diện
     * Url = /admin/logs/view
     */
	public function view() {
		return view('Adminer::view');
	}

}