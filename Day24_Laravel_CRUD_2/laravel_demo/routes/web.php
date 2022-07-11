<?php
//routes/web.php
use App\Http\Controllers\ProductController;
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

// - Route: get, post, put, delete, tuân theo chuẩn API RESTFul
// Route get: hiển thị
// Route post: thêm mới dữ liệu
// Route put: cập nhật dữ liệu
// Route delete: xóa dữ liệu
// - Url hiển thị form thêm mới sản phẩm:
Route::get('them-moi-sp',
    [ProductController::class, 'create']);
// - Url insert sản phẩm
Route::post('insert-sp',
    [ProductController::class, 'createSave']);
// - Url danh sách sp
Route::get('danh-sach-sp',
    [ProductController::class, 'index']);
