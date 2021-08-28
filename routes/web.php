<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

Route::get('/user', ([UserController::Class, 'index']))->middleware(['auth'])->name('user');

Route::get('/new_user', function () {
    return view('new_user');
})->middleware(['auth'])->name('new_user');

Route::get('/orders', ([OrderController::Class, 'active']))->middleware(['auth'])->name('orders');
Route::get('/orders/estimated', ([OrderController::Class, 'estimated']))->middleware(['auth'])->name('estimated');
Route::get('/orders/accepted', ([OrderController::Class, 'accepted']))->middleware(['auth'])->name('accepted');
Route::get('/orders/completed', ([OrderController::Class, 'completed']))->middleware(['auth'])->name('completed');
Route::get('/orders/invoiced', ([OrderController::Class, 'invoiced']))->middleware(['auth'])->name('invoiced');
Route::get('/orders/edit/{id}', ([OrderController::Class, 'edit']))->middleware(['auth'])->name('edit');
Route::get('/orders/delete/{id}', ([OrderController::Class, 'delete']))->middleware(['auth'])->name('delete');
Route::get('/orders/all', ([OrderController::Class, 'all_orders']))->middleware(['auth'])->name('all_orders');
Route::get('/orders/new', ([OrderController::Class, 'new_order']))->middleware(['auth'])->name('new_order');
Route::post('/orders/new/setCustomer', ([OrderController::Class, 'setCustomer']))->middleware(['auth'])->name('setCustomer');
Route::get('/orders/new/panels', ([OrderController::Class, 'toPanels']))->middleware(['auth'])->name('toPanels');
Route::post('/orders/new/addpanel', ([OrderController::Class, 'addPanel']))->middleware(['auth'])->name('addPanel');
Route::get('/orders/new/trim', ([OrderController::Class, 'toTrim']))->middleware(['auth'])->name('toTrim');
Route::post('/orders/new/addtrim', ([OrderController::Class, 'addTrim']))->middleware(['auth'])->name('addTrim');
Route::get('/orders/new/add', ([OrderController::Class, 'toCart']))->middleware(['auth'])->name('toCart');
Route::post('/orders/new/additem', ([OrderController::Class, 'addItemToCart']))->middleware(['auth'])->name('addItem');
Route::post('/orders/new/deleteitem', ([OrderController::Class, 'deleteOrderItem']))->middleware(['auth'])->name('deleteOrderItem');
Route::get('/orders/new/quoteorder', ([OrderController::Class, 'submitToQuote']))->middleware(['auth'])->name('submitToQuote');
Route::get('/orders/new/viewQuote', ([OrderController::Class, 'viewQuote']))->middleware(['auth'])->name('viewQuote');
Route::post('/orders/new/updateOrderItem', ([OrderController::Class, 'updateOrderItem']))->middleware(['auth'])->name('updateOrderItem');
Route::get('/orders/new/submitOrder', ([OrderController::Class, 'submitOrder']))->middleware(['auth'])->name('submitOrder');
Route::get('/orders/new/continue', ([OrderController::Class, 'continueOrder']))->middleware(['auth'])->name('continueOrder');
Route::get('/orders/new/clearSession', ([OrderController::Class, 'clearSession']))->middleware(['auth'])->name('clearSession');

Route::get('/customers', ([CustomerController::Class, 'all']))->middleware(['auth'])->name('customers');
Route::get('/customers/new', ([CustomerController::Class, 'new']))->middleware(['auth'])->name('new_cust');
Route::post('/customers', ([CustomerController::Class, 'add']))->middleware(['auth'])->name('add');
// Route::get('/customers/{id}', ([CustomerController::Class, 'view']))->middleware(['auth'])->name('customer');
Route::get('/customers/edit/{id}', ([CustomerController::Class, 'alter']))->middleware(['auth'])->name('edit');
Route::get('/customers/delete/{id}', ([CustomerController::Class, 'delete']))->middleware(['auth'])->name('del_cust');

Route::get('inventory/', ([InventoryController::Class, 'view']))->middleware(['auth'])->name('view-inv');
Route::post('inventory/', ([InventoryController::Class, 'view']))->middleware(['auth'])->name('category');
Route::get('inventory/new', ([InventoryController::Class, 'new']))->middleware(['auth'])->name('new-inv');
Route::get('inventory/add-roll', ([InventoryController::Class, 'newroll']))->middleware(['auth'])->name('new-roll');
Route::get('inventory/rollstore', ([InventoryController::Class, 'storeroll']))->middleware(['auth'])->name('roll-store');
Route::get('inventory/store', ([InventoryController::Class, 'store']))->middleware(['auth'])->name('store');

require __DIR__.'/auth.php';
