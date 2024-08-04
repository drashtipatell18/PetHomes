<?php

use App\Http\Controllers\UserHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ChatUserController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if(Auth::user() && Auth::user()->role == 'admin')
    {
        return redirect()->route('dashboard');
    }
    return redirect()->route('user.dashboard');
});

// Route::get('/', function () {
//     return view('layouts.main');
// });


// Admin Side Routes
Route::get('/admin/login',[HomeController::class,'Login'])->name('login');
Route::post('/admin/loginstore',[HomeController::class,'LoginStore'])->name('loginstore');
Route::get('/admin/logout',[HomeController::class,'Logout'])->name('logout');
Route::get('/admin/forget-password', [DashboardController::class, 'showForgetPasswordForm'])->name('forget.password');
Route::post('/admin/forget-password', [DashboardController::class, 'sendResetLinkEmail'])->name('forget.password.email');
Route::get('/admin/reset/{token}', [DashboardController::class, 'reset'])->name('reset');
Route::post('/admin/reset/{token}', [DashboardController::class, 'postReset'])->name('post_reset');
Route::get('/admin/cpassword',[HomeController::class,'cPassword'])->name('changepass');
Route::post('/admin/changepassword',[HomeController::class,'changePassword'])->name('changePassword');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


// User

Route::get('/user', [UserController::class, 'users'])->name('user');
Route::get('/user/create',[UserController::class,'userCreate'])->name('create.user');
Route::post('/user/insert',[UserController::class,'userInsert'])->name('insert.user');
Route::get('/user/edit/{id}', [UserController::class, 'userEdit'])->name('edit.user');
Route::post('/user/update/{id}', [UserController::class, 'userUpdate'])->name('update.user');
Route::get('/user/destroy/{id}',[UserController::class,'userDestroy'])->name('destroy.user');
Route::get('/user/profile',[UserController::class,'myProfile'])->name('profile.user');
Route::put('/update-profile/{id}', [UserController::class, 'updateProfile'])->name('update.profile');// Category

Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::get('/category/create', [CategoryController::class, 'createCategory'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('edit.category');
Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('update.category');
Route::get('/category/destroy/{id}',[CategoryController::class,'categoryDestroy'])->name('destroy.category');

// Pet

Route::get('/pet', [PetController::class, 'pet'])->name('pet');
Route::get('/pet/create', [PetController::class, 'createPet'])->name('pet.create');
Route::post('/pet/store', [PetController::class, 'storePet'])->name('pet.store');
Route::get('/pet/edit/{id}', [PetController::class, 'PetEdit'])->name('edit.pet');
Route::post('/pet/update/{id}', [PetController::class, 'PetUpdate'])->name('update.pet');
Route::get('/pet/destroy/{id}',[PetController::class,'PetDestroy'])->name('destroy.pet');

// Appointment

Route::get('/appointment', [AppointmentController::class, 'appointment'])->name('appointment');
Route::get('/appointment/create', [AppointmentController::class, 'createAppointment'])->name('appointment.create');
Route::post('/appointment/store', [AppointmentController::class, 'storeAppointment'])->name('appointment.store');
Route::get('/appointment/edit/{id}', [AppointmentController::class, 'AppointmentEdit'])->name('edit.appointment');
Route::post('/appointment/update/{id}', [AppointmentController::class, 'AppointmentUpdate'])->name('update.appointment');
Route::get('/appointment/destroy/{id}',[AppointmentController::class,'AppointmentDestroy'])->name('destroy.appointment');

//Service

Route::get('/service', [ServiceController::class, 'service'])->name('service');
Route::get('/service/create', [ServiceController::class, 'createService'])->name('service.create');
Route::post('/service/store', [ServiceController::class, 'storeService'])->name('service.store');
Route::get('/service/edit/{id}', [ServiceController::class, 'ServiceEdit'])->name('edit.service');
Route::post('/service/update/{id}', [ServiceController::class, 'ServiceUpdate'])->name('update.service');
Route::get('/service/destroy/{id}',[ServiceController::class,'ServiceDestroy'])->name('destroy.service');

//Product

Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::get('/product/create', [ProductController::class, 'createProduct'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'storeProduct'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'ProductEdit'])->name('edit.product');
Route::post('/product/update/{id}', [ProductController::class, 'ProductUpdate'])->name('update.product');
Route::get('/product/destroy/{id}',[ProductController::class,'ProductDestroy'])->name('destroy.product');

//Order

Route::get('/order', [OrderController::class, 'order'])->name('order');
Route::get('/order/create', [OrderController::class, 'createOrder'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'storeOrder'])->name('order.store');
Route::get('/order/edit/{id}', [OrderController::class, 'OrderEdit'])->name('edit.order');
Route::post('/order/update/{id}', [OrderController::class, 'OrderUpdate'])->name('update.order');
Route::get('/order/destroy/{id}',[OrderController::class,'OrderDestroy'])->name('destroy.order');

//OrderItem

Route::get('/orderitem', [OrderItemController::class, 'orderitem'])->name('orderitem');
Route::get('/orderitem/create', [OrderItemController::class, 'createOrderItem'])->name('orderitem.create');
Route::post('/orderitem/store', [OrderItemController::class, 'storeOrderItem'])->name('orderitem.store');
Route::get('/orderitem/edit/{id}', [OrderItemController::class, 'OrderItemEdit'])->name('edit.orderitem');
Route::post('/orderitem/update/{id}', [OrderItemController::class, 'OrderItemUpdate'])->name('update.orderitem');
Route::get('/orderitem/destroy/{id}',[OrderItemController::class,'OrderItemDestroy'])->name('destroy.orderitem');

//Wishlist

Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
Route::get('/wishlist/create', [WishlistController::class, 'createWishlist'])->name('wishlist.create');
Route::post('/wishlist/store', [WishlistController::class, 'storeWishlist'])->name('wishlist.store');
Route::get('/wishlist/edit/{id}', [WishlistController::class, 'WishlistEdit'])->name('edit.wishlist');
Route::post('/wishlist/update/{id}', [WishlistController::class, 'WishlistUpdate'])->name('update.wishlist');
Route::get('/wishlist/destroy/{id}',[WishlistController::class,'WishlistDestroy'])->name('destroy.wishlist');

//ChatUser

Route::get('/chatuser', [ChatUserController::class, 'chatuser'])->name('chatuser');
Route::get('/chatuser/create', [ChatUserController::class, 'createChatUser'])->name('chatuser.create');
Route::post('/chatuser/store', [ChatUserController::class, 'storeChatUser'])->name('chatuser.store');
Route::get('/chatuser/edit/{id}', [ChatUserController::class, 'ChatUserEdit'])->name('edit.chatuser');
Route::post('/chatuser/update/{id}', [ChatUserController::class, 'ChatUserUpdate'])->name('update.chatuser');
Route::get('/chatuser/destroy/{id}',[ChatUserController::class,'ChatUserDestroy'])->name('destroy.chatuser');

//Chat

Route::get('/chat', [ChatController::class, 'chat'])->name('chat');
Route::get('/chat/create', [ChatController::class, 'createChat'])->name('chat.create');
Route::post('/chat/store', [ChatController::class, 'storeChat'])->name('chat.store');
Route::get('/chat/edit/{id}', [ChatController::class, 'ChatEdit'])->name('edit.chat');
Route::post('/chat/update/{id}', [ChatController::class, 'ChatUpdate'])->name('update.chat');
Route::get('/chat/destroy/{id}',[ChatController::class,'ChatDestroy'])->name('destroy.chat');
});


// User Side routes
Route::get('/home', [UserHomeController::class,'dashboard'])->name('user.dashboard');
Route::post('/user/login', [UserHomeController::class,'login'])->name('user.login');
Route::get('/user/logout', [UserHomeController::class,'logout'])->name('user.logout');
Route::get('/pet/{catid}', [UserHomeController::class,'getPetFromCat']);
Route::get('/viewpet/{petid}', [UserHomeController::class,'getPet']);
Route::get('/contact', [UserHomeController::class,'contactUs'])->name('user.contact');
Route::post('/contact/submit', [UserHomeController::class,'saveContactInfo'])->name('user.contactsave');
Route::post('/user/register', [UserHomeController::class,'registerUser'])->name('user.register');
Route::get('/products', [UserHomeController::class,'getProducts']);
Route::get('/services', [UserHomeController::class,'getServices']);
Route::get('/profile', [UserHomeController::class,'profile']);
Route::post('/profile/update', [UserHomeController::class,'profileUpdate'])->name('user.profile.update');
