<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
//use App\Http\Controllers\CartController;
//use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForgotPasswordController;
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

Route::get('admin/login', function(){
    return view('admin.users.login');
});
Route::get('admin/login_auth', [AuthController::class, 'login_auth'])->name('admin.login_auth');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('admin/register', [AuthController::class, 'register'])->name('admin.register');
Route::post('admin/register_auth', [AuthController::class, 'register_auth'])->name('admin.register_auth');

//Login facebook
Route::get('admin/login_facebook', [AdminController::class, 'login_facebook'])->name('admins.login_facebook');
Route::get('admin/login_auth/callback',[AdminController::class, 'callback_facebook'])->name('admins.callback_facebook');


//Route::post('admin/login_auth', [AuthController::class, 'login_auth'])->name('admin.login_auth');

Route::middleware(['admin'])->name('admin.')->group(function () {
    //auth controller
//    Route::get('admin/register', [AuthController::class, 'register-auth'])->name('register');


    Route::get('admin/', [AdminController::class, 'index'])->name('index');
    Route::get('admin/create', [AdminController::class, 'create'])->name('create');
    Route::post('admin/store', [AdminController::class, 'store'])->name('store');
    Route::get('admin/show/{id}', [AdminController::class, 'show'])->name('show');
    Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::patch('admin/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('admin/block/{id}', [AdminController::class, 'block'])->name('block');
    Route::get('admin/edit_password/{id}', [AdminController::class, 'edit_password'])->name('edit_password');
    Route::post('admin/change_password/{id}', [AdminController::class, 'change_password'])->name('change_password');

    Route::get('admin/forgot-password/', [ForgotPasswordController::class, 'show_forgot_password'])->name('show_forgotPassword');
    Route::post('admin/forgotPassword/', [ForgotPasswordController::class, 'forgot_password'])->name('submit_forgotPassword');
    Route::get('admin/reset-password/{token}', [ForgotPasswordController::class, 'show_resetPassword'])->name('show_resetPassword');
    Route::post('admin/reset-password/', [ForgotPasswordController::class, 'reset_password'])->name('submit_resetPassword');



    //room categories
    Route::get('admin/room_categories', [RoomCategoryController::class, 'index'])->name('room_categories.index');
    Route::get('admin/room_categories/create', [RoomCategoryController::class, 'create'])->name('room_categories.create');
    Route::post('admin/room_categories/store', [RoomCategoryController::class, 'store'])->name('room_categories.store');
    Route::get('admin/room_categories/edit/{id}', [RoomCategoryController::class, 'edit'])->name('room_categories.edit');
    Route::patch('admin/room_categories/update/{id}', [RoomCategoryController::class, 'update'])->name('room_categories.update');
    Route::get('admin/room_categories/delete/{id}', [RoomCategoryController::class, 'delete'])->name('room_categories.delete');
//foods
    Route::get('admin/rooms/', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('admin/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('admin/rooms/store', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('admin/rooms/show/{id}', [RoomController::class, 'show'])->name('rooms.show');
    Route::get('admin/rooms/edit/{id}', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::patch('admin/rooms/update/{id}', [RoomController::class, 'update'])->name('rooms.update');
    Route::get('admin/rooms/delete/{id}', [RoomController::class, 'delete'])->name('rooms.delete');

    ////Comments
    Route::get('admin/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('admin/allow_comment', [CommentController::class, 'allow_comment'])->name('comments.allow_comment');
    Route::post('admin/reply_comment', [CommentController::class, 'reply_comment'])->name('comments.reply_comment');

});

//user controller
Route::get('users', [UserController::class, 'index'])->name('user.index');
Route::get('users/all_foods', [UserController::class, 'all_foods'])->name('user.all_foods');

Route::post('user/assign_roles', [UserController::class, 'assign_roles'])->name('user.assign_roles');

Route::get('guest/index', [PageController::class, 'index'])->name('guest.index');
Route::get('guest/detail/{id}', [PageController::class, 'detail'])->name('guest.detail');
Route::get('guest/search', [PageController::class, 'search'])->name('guest.search');
Route::get('guest/show_category/{id}', [PageController::class, 'show_category'])->name('guest.show_category');

//comment
Route::post('guest/load_comment', [PageController::class, 'load_comment'])->name('guest.load_comment');
Route::post('guest/send_comment', [PageController::class, 'send_comment'])->name('guest.send_comment');


Route::get('guest/add_cart/{id}', [CartController::class, 'add_cart'])->name('guest.add_cart');
Route::get('guest/show_cart', [CartController::class, 'show_cart'])->name('guest.show_cart');
Route::get('guest/delete_cart/{id}', [CartController::class, 'delete_cart'])->name('guest.delete_cart');

Route::get('guest/order', [CartController::class,'order'])->name('guest.order');

Route::get('admin/transaction', [TransactionController::class, 'index'])->name('admin.transactions.index');
Route::post('guest/transaction/store', [TransactionController::class, 'store'])->name('guest.transaction.store');





