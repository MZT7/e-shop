<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
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
// Route::get('cart', App\Http\Livewire\Shopcart::class)->name('cart')->middleware(['auth', 'PreventBackHistory']);

//product controller
// Route::get('/', [ProductController::class, 'index'])->name('products');
Route::get('/', App\Http\Livewire\AddProducts::class)->name('products');
// Route::get('/products/men', [ProductController::class, 'menProducts'])->name('products.men');
// Route::get('/products/women', [ProductController::class, 'womenProducts'])->name('products.women');
Route::get('/search', [ProductController::class, 'search'])->name('search');


//add to cart
Route::get('cart/addToCart/{id}', [ProductController::class, 'addProductsToCart'])->name('addToCart');
// Route::get('productDetails/{id}', [ProductController::class, 'productDetails'])->name('productDetails');
Route::get('productDetails/{id}', App\Http\Livewire\ProductDetails::class)->name('productDetails');
//show cart
Route::get('cart/inc/{id}', [ProductController::class, 'increment'])->name('cart.inc');
Route::get('cart/dec/{id}', [ProductController::class, 'decrement'])->name('cart.dec');
Route::get('cart', App\Http\Livewire\Shopcart::class)->name('cart')->middleware(['auth', 'PreventBackHistory']);
// Route::get('cart', [ProductController::class, 'showCart'])->name('cart')->middleware(['auth', 'PreventBackHistory']);
//delete item from cart
Route::get('cart/deleteFromCart/{id}', [ProductController::class, 'deleteItemsFromCart'])->name('DeleteFromCart');
Route::get('/login', [LoginController::class, 'showAdminLogin'])->name('login');
//admin controller
route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {

        Route::post('/login', [LoginController::class, 'adminLogin'])->name('logon');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::post('/editImage/{id}', [AdminController::class, 'editImage'])->name('editImage');
        Route::post('/logout', [LoginController::class, 'adminLogout'])->name('logout');
    });
});

Route::resource('admin', AdminController::class)->parameters([
    'admin' => 'id',
])->middleware(['auth:admin', 'PreventBackHistory']);

//order

Route::get('products/checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::get('products/createOrder', [ProductController::class, 'createOrder'])->name('createOrder');
Route::post('products/orderD', [ProductController::class, 'orderD'])->name('orderD');

//Route::get('admin/register', [LoginController::class, 'showAdminRegister'])->name('admin.register');

//Route::post('admin/register', [LoginController::class, 'adminRegister']);

//payment
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);
// Route::post('/paystack-webhook', [PaymentController::class, 'webhook']);
Route::resource('payment', PaymentController::class);
//auth users
Auth::routes();
//redirect home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', 'PagesController@index');
// Route::get('/', ['uses' => 'ProductController@index']);

//increment of quantity
//Route::get('deleteFromCart/{id}', [ProductController::class, 'deleteItemsFromCart'])->name('DeleteFromCart');

// Route::get('/addToCart/{id}', ['uses' => 'ProductController@addProductsToCart','as'=>'addtocart']);
// Route::get('user', 'UserController@index')->name('user');

// Route::get('/about', 'PagesController@about');
// Route::get('/services', 'PagesController@services');
// Route::get('/gallery', 'PagesController@gallery');
// Route::get('/gallery2', 'PagesController@gallery2');
// Route::get('/', 'PagesController@products');
// Route::get('/products2', 'PagesController@products2');
// Route::get('/product1', 'PagesController@product1');
// Route::get('/product2', 'PagesController@product2');
// Route::get('/product3', 'PagesController@product3');
// Route::get('/product4', 'PagesController@product4');
// Route::get('/product5', 'PagesController@product5');
// Route::get('/product6', 'PagesController@product6');
// Route::get('/product7', 'PagesController@product7');
// Route::get('/product8', 'PagesController@product8');
// Route::get('/product9', 'PagesController@product9');
// Route::get('/product10', 'PagesController@product10');
// Route::get('/product11', 'PagesController@product11');
// Route::get('/product12', 'PagesController@product12');
// Route::get('/product13', 'PagesController@product13');
// Route::get('/product14', 'PagesController@product14');
// Route::get('/product15', 'PagesController@product15');
// Route::get('/product16', 'PagesController@product16');
// Route::get('/product17', 'PagesController@product17');
// Route::get('/product18', 'PagesController@product18');
// Route::get('/product19', 'PagesController@product19');
// Route::get('/product20', 'PagesController@product20');
// Route::get('/product21', 'PagesController@product21');
// Route::get('/service1', 'PagesController@service1');
// Route::get('/service2', 'PagesController@service2');
// Route::get('/service3', 'PagesController@service3');
