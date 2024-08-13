<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RateController;
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
 

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/shop/{cat?}', [HomeController::class, 'shop'])->name('shop');
Route::get('/product/{product}', [HomeController::class, 'product'])->name('product');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'checkLogin']);
// admin group
// Route::group([], function() {});
Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // Route::group(['prefix' => 'category'], function() {
    //     Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    //     Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    //     Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    //     Route::get('/edit/{cat}', [CategoryController::class, 'edit'])->name('category.edit');
    //     Route::post('/update/{cat}', [CategoryController::class, 'update'])->name('category.update');
    //     Route::get('/delete/{cat}', [CategoryController::class, 'delete'])->name('category.delete');
    // });
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('order', OrderController::class);
    Route::resource('comment', CommentController::class);
    Route::resource('rate', RateController::class);

});