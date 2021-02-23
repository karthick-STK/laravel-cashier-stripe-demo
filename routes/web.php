<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Billable;

use Illuminate\Http\Request;

Route::get('/billing-portal', function (Request $request) {
    return $request->user()->redirectToBillingPortal();
});


Route::post('/user/subscribe', function (Request $request) {
    $request->user()->newSubscription(
        'default', 'price_premium'
    )->create($request->paymentMethodId);
});

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

Auth::routes();

Route::resource('products',ProductController::class);

Route::resource('home',HomeController::class);

//::get('/checkout/{$id}',CheckoutController::index');
Route::resource('checkout', CheckoutController::class);



