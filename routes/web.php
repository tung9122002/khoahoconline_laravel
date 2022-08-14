<?php

use App\Http\Controllers\Admin\DangKyController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\GiangVienController;
use App\Http\Controllers\Admin\KhachHangController;
use App\Http\Controllers\Admin\KhoaHocController;
use App\Http\Controllers\Admin\KhuyenMaiController;
use App\Http\Controllers\Admin\LopController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\CourseController;
use App\Http\Controllers\Client\DangKyKhoaHocController;
use App\Http\Controllers\Client\LayoutController;
use App\Http\Controllers\Client\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('dangky',[LoginController::class,'registerForm'])->name('register');
Route::post('dangky',[LoginController::class,'postRegister'])->name('postRegister');
Route::get('login',[LoginController::class,'getLogin'])->name('login');
Route::post('login',[LoginController::class,'postLogin'])->name('postLogin');
Route::get('logout',[LoginController::class,'getLogout'])->name('logout');
Route::get('home',[LayoutController::class,'index'])->name('trangchu');
Route::get('teacher',[TeacherController::class,'teacher'])->name('teacher');
Route::get('detail-teacher/{id}',[TeacherController::class,'detailTeacher'])->name('detailTeacher');
Route::get('khoahoc',[CourseController::class,'listKhoaHoc'])->name('listKhoaHoc');
Route::get('course-category',[CourseController::class,'categoryKhoaHoc'])->name('list_category_KhoaHoc');
Route::get('single-course/{id}',[CourseController::class,'detailKhoaHoc'])->name('detailKhoaHoc');
Route::post('check-khuyenmai',[CourseController::class,'checkKhuyenMai'])->name('checkKhuyenMai');

Route::get('contact',[ContactController::class,'contact'])->name('contact');
Route::middleware('auth')->group(function(){
    Route::get('dang-ky/{id}',[DangKyKhoaHocController::class,'dangkyCourse'])->name('dangkyCourse');
    Route::post('dang-ky/{id}',[DangKyKhoaHocController::class,'postdangkyCourse'])->name('postdangkyCourse');
    Route::get('lich-su-dang-ky/{id}',[DangKyKhoaHocController::class,'lichsuDangKy'])->name('lichsuDangKy');
    Route::prefix('admin')->name('admin.')->group(function(){
        //banner
        Route::prefix('slider')->name('slider.')->group(function(){
            Route::get('/',[SliderController::class,'banner'])->name('index');
            Route::match(['get','post'],'add',[SliderController::class,'add'])->name('slider_add');
            Route::get('edit/{id}',[SliderController::class,'edit'])->name('slider_edit');
            Route::post('edit/{id}',[SliderController::class,'update'])->name('slider_update');
            Route::get('delete/{id}',[SliderController::class,'delete'])->name('slider_delete');
        });
        // người dùng
        Route::prefix('user')->name('user.')->group(function(){
            Route::get('/',[UserController::class,'index'])->name('index');
            Route::match(['get','post'],'add',[UserController::class,'add'])->name('route_BackEnd_Users_Add');
            Route::get('user/delete/{id}',[UserController::class,'delete'])->name('User_delete');
            Route::get('edit/{id}',[UserController::class,'edit'])->name('user_edit');
            Route::post('edit/{id}',[UserController::class,'update'])->name('user_update');
        });
        // khóa học
        Route::prefix('khoahoc')->name('khoahoc.')->group(function(){
            Route::get('/',[KhoaHocController::class,'index'])->name('index');
            Route::match(['get','post'],'add',[KhoaHocController::class,'add'])->name('khoahoc_add');
            Route::get('edit/{id}',[KhoaHocController::class,'edit'])->name('khoahoc_edit');
            Route::post('edit/{id}',[KhoaHocController::class,'update'])->name('khoahoc_update');
            Route::get('delete/{id}',[KhoaHocController::class,'delete'])->name('khoahoc_delete');
            Route::get('search',[KhoaHocController::class,'search'])->name('search');
        });
        //giảng viên
        Route::prefix('giangvien')->name('giangvien.')->group(function(){
            Route::get('/',[GiangVienController::class,'index'])->name('index');
            Route::match(['get','post'],'add',[GiangVienController::class,'add'])->name('giangvien_add');
            Route::get('edit/{id}',[GiangVienController::class,'edit'])->name('giangvien_edit');
            Route::post('edit/{id}',[GiangVienController::class,'update'])->name('giangvien_update');
            Route::get('delete/{id}',[GiangVienController::class,'delete'])->name('giangvien_delete');
        });
        // lớp
        Route::prefix('lop')->name('lop.')->group(function(){
            Route::get('/',[LopController::class,'index'])->name('index');
            Route::get('detai-lop/{id}',[LopController::class,'detailLop'])->name('detail_lop');
            Route::match(['get','post'],'add',[LopController::class,'add'])->name('lop_add');
            Route::get('edit/{id}',[LopController::class,'edit'])->name('lop_edit');
            Route::post('edit/{id}',[LopController::class,'update'])->name('lop_update');
            Route::get('delete/{id}',[LopController::class,'delete'])->name('lop_delete');
        });
        // danh mục
        Route::prefix('danhmuc')->name('danhmuc.')->group(function(){
            Route::get('/',[DanhMucController::class,'index'])->name('index');
            Route::match(['get','post'],'add',[DanhMucController::class,'add'])->name('danhmuc_add');
            Route::get('edit/{id}',[DanhMucController::class,'edit'])->name('danhmuc_edit');
            Route::post('edit/{id}',[DanhMucController::class,'update'])->name('danhmuc_update');
            Route::get('delete/{id}',[DanhMucController::class,'delete'])->name('danhmuc_delete');
            // Route::get('search',[DanhMucController::class,'search'])->name('search');
        });
        // khuyến mai
        Route::prefix('khuyenmai')->name('khuyenmai.')->group(function(){
            Route::get('/',[KhuyenMaiController::class,'index'])->name('index');
            Route::match(['get','post'],'add',[KhuyenMaiController::class,'add'])->name('khuyenmai_add');
            Route::get('edit/{id}',[KhuyenMaiController::class,'edit'])->name('khuyenmai_edit');
            Route::post('edit/{id}',[KhuyenMaiController::class,'update'])->name('khuyenmai_update');
            Route::get('delete/{id}',[KhuyenMaiController::class,'delete'])->name('khuyenmai_delete');
        });
        // đăng ký
        Route::prefix('dang-ky')->name('dang-ky.')->group(function(){
            Route::get('/',[DangKyController::class,'index'])->name('index');
            Route::match(['get','post'],'add',[DangKyController::class,'add'])->name('dangky_add');
            Route::get('edit/{id}',[DangKyController::class,'edit'])->name('dangky_edit');
            Route::post('edit/{id}',[DangKyController::class,'update'])->name('dangky_update');
            Route::get('delete/{id}',[DangKyController::class,'delete'])->name('dangky_delete');
        });
        // khách hàng
        Route::prefix('khachhang')->name('khachhang.')->group(function(){
            Route::get('/',[KhachHangController::class,'index'])->name('index');
            Route::get('delete/{id}',[KhachHangController::class,'delete'])->name('khachhang_delete');
        });
    });
});
