<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
//use App\Http\Controllers\CartController;
//use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WistListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\DashboardController;
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

Route::get('admin/login', function(){ return view('admin.users.login');
});

Route::get('admin/login_auth', [AuthController::class, 'login_auth'])->name('admin.login_auth');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('admin/register', [AuthController::class, 'register'])->name('admin.register');
Route::post('admin/register_auth', [AuthController::class, 'register_auth'])->name('admin.register_auth');
Route::get('admin/forget-password', [ForgotPasswordController::class, 'show_forgotPassword'])->name('admin.show_forgotPassword');
Route::post('admin/forgetPassword/', [ForgotPasswordController::class, 'forget_password'])->name('admin.forget_password');

Route::get('customer/register', [UserController::class, 'register_check'])->name('customer.register_check');
Route::get('customer/login_auth', [UserController::class, 'login_auth'])->name('customer.login_auth');
//Route::post('customer/login', [UserController::class, 'login'])->name('customer.login');
//Route::get('customer/register_auth', [UserController::class, 'register_auth'])->name('customer.register_auth');
Route::post('customer/register_auth', [UserController::class, 'register_auth'])->name('customer.register_auth');

//Login facebook
Route::get('admin/login_facebook', [AdminController::class, 'login_facebook'])->name('admins.login_facebook');
Route::get('admin/login_auth/callback',[AdminController::class, 'callback_facebook'])->name('admins.callback_facebook');

Route::post('admin/images/load', [ImageController::class, 'load'])->name('admin.images.load');


//Route::post('admin/login_auth', [AuthController::class, 'login_auth'])->name('admin.login_auth');

Route::middleware(['admin'])->name('admin.')->group(function () {
    //auth controller
//    Route::get('admin/register', [AuthController::class, 'register-auth'])->name('register');

    Route::get('admin/users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('admin/', [AdminController::class, 'index'])->name('index');
    Route::get('admin/create', [AdminController::class, 'create'])->name('create');
    Route::post('admin/store', [AdminController::class, 'store'])->name('store');
    Route::get('admin/show/{id}', [AdminController::class, 'show'])->name('show');
    Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::patch('admin/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::post('admin/update_account/{id}', [AdminController::class, 'update_account'])->name('update_account');

    Route::get('admin/block/{id}', [AdminController::class, 'block'])->name('block');
    Route::get('admin/edit_password/{id}', [AdminController::class, 'edit_password'])->name('edit_password');
    Route::post('admin/change_password/{id}', [AdminController::class, 'change_password'])->name('change_password');

    Route::get('admin/reset-password/{token}', [ForgotPasswordController::class, 'show_resetPassword'])->name('show_resetPassword');
    Route::post('admin/reset_password/', [ForgotPasswordController::class, 'reset_password'])->name('reset_password');



    //room categories
    Route::get('admin/room_categories', [RoomCategoryController::class, 'index'])->name('room_categories.index');
    Route::get('admin/room_categories/create', [RoomCategoryController::class, 'create'])->name('room_categories.create');
    Route::post('admin/room_categories/store', [RoomCategoryController::class, 'store'])->name('room_categories.store');
    Route::get('admin/room_categories/edit/{id}', [RoomCategoryController::class, 'edit'])->name('room_categories.edit');
    Route::patch('admin/room_categories/update/{id}', [RoomCategoryController::class, 'update'])->name('room_categories.update');
    Route::get('admin/room_categories/delete/{id}', [RoomCategoryController::class, 'delete'])->name('room_categories.delete');
//rooms
    Route::get('admin/rooms/', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('admin/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('admin/rooms/store', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('admin/rooms/show/{id}', [RoomController::class, 'show'])->name('rooms.show');
    Route::get('admin/rooms/edit/{id}', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::patch('admin/rooms/update/{id}', [RoomController::class, 'update'])->name('rooms.update');
    Route::get('admin/rooms/delete/{id}', [RoomController::class, 'delete'])->name('rooms.delete');
    Route::get('admin/rooms/upload_images/{id}', [RoomController::class, 'upload_images'])->name('rooms.upload_images');
    Route::post('admin/rooms/save_images/{id}', [RoomController::class, 'save_images'])->name('rooms.save_images');
    Route::get('admin/rooms/card', [RoomController::class, 'room_card'])->name('rooms.card');
    Route::post('admin/rooms/load_images', [RoomController::class, 'load_images'])->name('rooms.load_images');
    Route::get('admin/rooms/delete_images/{id}', [RoomController::class, 'delete_image'])->name('rooms.delete_image');



    ///Post controller
    Route::get('admin/posts/', [PostController::class, 'index'])->name('posts.index');
    Route::get('admin/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('admin/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('admin/posts/show/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::get('admin/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('admin/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('admin/posts/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');

///postcategory
    Route::get('admin/post_categories/', [PostCategoryController::class, 'index'])->name('post_categories.index');
    Route::get('admin/post_categories/create', [PostCategoryController::class, 'create'])->name('post_categories.create');
    Route::post('admin/post_categories/store', [PostCategoryController::class, 'store'])->name('post_categories.store');
    Route::get('admin/post_categories/show/{id}', [PostCategoryController::class, 'show'])->name('post_categories.show');
    Route::get('admin/post_categories/edit/{id}', [PostCategoryController::class, 'edit'])->name('post_categories.edit');
    Route::patch('admin/post_categories/update/{id}', [PostCategoryController::class, 'update'])->name('post_categories.update');
    Route::get('admin/post_categories/delete/{id}', [PostCategoryController::class, 'delete'])->name('post_categories.delete');


    ////Comments
    Route::get('admin/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('admin/allow_comment', [CommentController::class, 'allow_comment'])->name('comments.allow_comment');
    Route::post('admin/reply_comment', [CommentController::class, 'reply_comment'])->name('comments.reply_comment');
    Route::get('admin/comments/reply/{id}', [CommentController::class, 'reply'])->name('comments.reply');

    //user-comment

    /////filter users
    Route::get('admin/search', [UserController::class, 'search'])->name('users.search');
    Route::get('admin/filter-search', [UserController::class, 'filter_search'])->name('users.filter');
    Route::get('admin/sex-search', [UserController::class, 'sex_search'])->name('users.sex_search');
    Route::get('admin/room_search', [RoomController::class, 'room_search'])->name('rooms.room_search');
    Route::get('admin/rooms/filter_search', [RoomController::class, 'filter_search'])->name('rooms.filter_search');



    //transaction
    Route::get('admin/transaction', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('admin/transaction/show/{id}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::get('admin/transaction/edit/{id}', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::get('admin/transaction/key_search', [TransactionController::class, 'key_search'])->name('transactions.key_search');
    Route::get('admin/transaction/payment_search', [TransactionController::class, 'payment_search'])->name('transactions.payment_search');
    Route::get('admin/transaction/mail_reminder', [TransactionController::class, 'mail_reminder'])->name('transactions.mail_reminder');

    ////dashboard
    Route::post('admin/dashboard/statistic_order', [DashboardController::class, 'statistic_order'])->name('dashboard.statistic_order');
    Route::get('admin/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
//    Route::post('admin/dashboard/statistic_order', [DashboardController::class, 'statistic_order'])->name('dashboard.statistic_order');


});

//user controller
Route::get('users', [UserController::class, 'index'])->name('user.index');
Route::get('users/all_foods', [UserController::class, 'all_foods'])->name('user.all_foods');

Route::get('admin/change_roles/{id}', [AdminController::class, 'change_role'])->name('admin.change_role');
Route::post('admin/assign_roles/{id}', [AdminController::class, 'assign_roles'])->name('admin.assign_roles');

Route::get('guest/index', [PageController::class, 'index'])->name('guest.index');
Route::get('guest/detail/{id}', [PageController::class, 'detail'])->name('guest.detail');
Route::get('guest/search', [PageController::class, 'search'])->name('guest.search');
Route::get('guest/show_category/{id}', [PageController::class, 'show_category'])->name('guest.show_category');

Route::get('guest/add_cart/{id}', [CartController::class, 'add_cart'])->name('guest.add_cart');
Route::get('guest/show_cart', [CartController::class, 'show_cart'])->name('guest.show_cart');
Route::get('guest/delete_cart/{id}', [CartController::class, 'delete_cart'])->name('guest.delete_cart');

Route::get('guest/order', [CartController::class,'order'])->name('guest.order');

Route::get('admin/transaction', [TransactionController::class, 'index'])->name('admin.transactions.index');
Route::post('guest/transaction/store', [TransactionController::class, 'store'])->name('guest.transaction.store');


////customer info customer_login
Route::get('customer/customer_login', [CustomerController::class, 'customer_login'])->name('customer.customer_login');
Route::post('customer/login', [CustomerController::class, 'login'])->name('customer.login');
Route::get('customer/customer_register', [CustomerController::class, 'customer_register'])->name('customer.customer_register');
Route::post('customer/store_customer', [CustomerController::class, 'store_customer'])->name('customer.store_customer');

Route::get('customer/logout', [CustomerController::class, 'logout'])->name('customer.logout');
Route::get('customer/', [CustomerController::class, 'index'])->name('customer.index');
Route::get('customer/edit_profile/{id}', [CustomerController::class, 'edit_profile'])->name('customer.edit_profile');
Route::post('customer/update_profile/{id}', [CustomerController::class, 'update_profile'])->name('customer.update_profile');
Route::get('customer/booking_history/{id}', [CustomerController::class, 'booking_history'])->name('customer.booking_history');
Route::get('customer/booking_history/show/{id}', [CustomerController::class, 'booking_details'])->name('customer.booking_details');


//test-modal
Route::get('customer/test_modal', [CustomerController::class, 'test_modal'])->name('customer.test_modal');


//rooms details
Route::get('customer/rooms/listing', [CustomerController::class, 'listing'])->name('customer.rooms.listing');
Route::get('customer/rooms/details/{id}', [CustomerController::class, 'details'])->name('customer.rooms.details');
Route::post('customer/rooms/send_comment', [RoomController::class, 'send_comment'])->name('customer.rooms.send_comment');
Route::post('customer/rooms/load_comment', [RoomController::class, 'load_comment'])->name('customer.rooms.load_comment');


//wishlists
Route::get('customer/wistlist/{id}', [WistlistController::class, 'add_wistlist'])->name('customer.add_wistlist');
Route::get('customer/count_wistlist/{id}', [WistlistController::class, 'count_wistlist'])->name('customer.count_wistlist');
//Route::post('customer/wishlist/{id}', [WistlistController::class, 'wish_list'])->name('customer.wish_list');
Route::get('customer/show_wistlist/{id}', [WistlistController::class, 'show_wishlist'])->name('customer.show_wishlist');
Route::get('customer/wishlist/delete/{id}', [WistlistController::class, 'delete'])->name('customer.wishlist.delete');



Route::get('customer/test', [CustomerController::class, 'test'])->name('customer.test');
Route::get('customer/about_us', [InformationController::class, 'about_us'])->name('customer.about_us');
Route::get('customer/categories', [InformationController::class, 'categories'])->name('customer.categories');

Route::get('customer/rooms/filter_service', [RoomController::class, 'filter_service'])->name('customer.rooms.filter_service');
Route::get('customer/posts/listing', [PostController::class, 'listing'])->name('customer.posts.listing');
Route::get('customer/posts/details/{id}', [PostController::class, 'detail'])->name('customer.posts.details');
Route::get('customer/rooms/filter_price', [CustomerController::class, 'filter_price'])->name('customer.posts.filter_price');
Route::get('customer/posts/search', [PostController::class, 'search'])->name('customer.posts.search');


//comments
Route::post('customer/send_comment', [CommentController::class, 'send_comment'])->name('customer.posts.send_comment');
Route::post('customer/load_comment', [CommentController::class, 'load_comment'])->name('customer.load_comment');

//order
Route::post('customer/booking/customer_order', [BookingController::class, 'customer_order'])->name('customer.customer_order');
Route::post('customer/booking/load_user', [BookingController::class, 'load_user'])->name('customer.load_user');
Route::get('customer/booking/delete_user/{id}', [BookingController::class, 'delete_user'])->name('customer.delete_user');

Route::get('customer/booking/{id}', [BookingController::class, 'booking'])->name('customer.rooms.booking');
Route::post('customer/booking/store', [BookingController::class, 'store'])->name('customer.booking.store');
Route::get('customer/rooms/payment/{id}', [BookingController::class, 'payment'])->name('customer.rooms.payment');
Route::post('customer/payment/vnpay', [BookingController::class, 'vnpay'])->name('customer.payment.vnpay');
Route::post('customer/payment/momo', [BookingController::class, 'momo'])->name('customer.payment.momo');
Route::get('customer/payment/success', [BookingController::class, 'payment_success'])->name('customer.payment.success');
Route::get('customer/payment/vnpay_online/{id}', [BookingController::class, 'vnpay_online'])->name('customer.payment.vnpay_online');
Route::post('customer/payment/vnpay_payment', [BookingController::class, 'vnpay_payment'])->name('customer.payment.vnpay_payment');

Route::get('customer/cancel_booking/{id}', [BookingController::class, 'cancel_booking'])->name('customer.cancel_booking');


Route::get('customer/post_category/{id}', [PostController::class, 'post_category'])->name('customer.post_category');
Route::get('customer/show_category/{id}', [CustomerController::class, 'show_category'])->name('customer.show_category');
Route::post('customer/global_search', [CustomerController::class, 'global_search'])->name('customer.global_search');
Route::post('customer/search', [CustomerController::class, 'search'])->name('customer.search');
Route::get('admin/customer_profile/{id}', [TransactionController::class, 'customer_profile'])->name('admin.customer_profile');
Route::post('admin/update_status/{id}', [TransactionController::class, 'update_status'])->name('admin.update_status');
