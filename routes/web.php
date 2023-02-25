<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
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
    return view('frontend.pages.home', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('frontend.pages.about', ['title' =>'about']);
});

Route::get('/blog', [PostController::class, 'index']);
Route::get('/single_blog/{slug}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);

// baca https://laravel.com/docs/9.x/middleware#main-content
// baca juga penamaan route https://laravel.com/docs/9.x/routing#named-routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'authenticate']);

// baca https://laravel.com/docs/9.x/middleware#main-content
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// baca https://laravel.com/docs/9.x/middleware#main-content
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// baca https://laravel.com/docs/9.x/controllers#resource-controllers
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('auth');
Route::resource('/dashboard/users', AdminUserController::class)->middleware('auth');



// Route::get('/categories/{category:slug}', function(Category $category) {
//     // route ini ngambil data dari model lalu di arahkan ke view tanpa melalui controller
//     return view('frontend.pages.blog', [
//         'title' =>$category->name, //untuk title di browser
//         'blogs' =>$category->posts, //variabel posts ngambil dari method model kategori
       
//         'namajudul' => $category->name, // ini untuk heading di view category
//         'judul' => 'Kategori Artikel'
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author) {
//     return view('frontend.pages.blog', [
//         'title' =>'Penulis', //untuk title di browser
//         //'blogs' =>$author->posts, //lazy loading
//         'blogs' =>$author->posts->load('category','author'), //eager loading
//         'namajudul' => $author->name, // ini untuk heading di view category karena author minjem view category
//         'judul' =>'Semua Artikel Oleh' // ini untuk heading di view category karena author minjem view category
//     ]);
// });

