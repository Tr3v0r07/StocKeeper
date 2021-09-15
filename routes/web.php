<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;
use App\Models\Order;

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

Route::get('/dashboard', ([UserController::Class, 'dashview']))->middleware(['auth'])->name('admindashboard');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

Route::get('/user', ([UserController::Class, 'index']))->middleware(['auth'])->name('user');
Route::get('/newuser', function () {
    return view('users.newUser');
})->middleware(['auth'])->name('newUserForm');
Route::post('/user', ([UserController::Class, 'newUser']))->middleware(['auth'])->name('newUser');
Route::get('/user/edit/{id}', ([UserController::Class, 'edit']))->middleware(['auth'])->name('editUser');


Route::get('/orders', ([OrderController::Class, 'all']))->middleware(['auth'])->name('orders');
Route::get('/orders/query/{status}',([OrderController::Class, 'view']))->middleware(['auth'])->name('view');
Route::get('/orders/view/{id}', ([OrderController::Class, 'viewOrder']))->middleware(['auth'])->name('viewOrder');
// Route::get('/orders/edit/{id}', ([OrderController::Class, 'edit']))->middleware(['auth'])->name('edit');
// Route::get('/orders/delete/{id}', ([OrderController::Class, 'delete']))->middleware(['auth'])->name('delete');
Route::get('/orders/advance/{status}', ([OrderController::Class, 'advance']))->middleware(['auth'])->name('advance');
Route::post('/orders/Accepted/accepted', ([OrderController::Class, 'accept']))->middleware(['auth'])->name('accept');
Route::get('/orders/new', ([Ordercontroller::Class, 'newOrder' ]))->middleware(['auth'])->name('newOrder');
Route::post('/orders/new/setCustomer', ([OrderController::Class, 'quoteOrder']))->middleware(['auth'])->name('quoteOrder');
// Route::get('/orders/new/panels', ([OrderController::Class, 'toPanels']))->middleware(['auth'])->name('toPanels');
// Route::post('/orders/new/addpanel', ([OrderController::Class, 'addPanel']))->middleware(['auth'])->name('addPanel');
// Route::get('/orders/new/trim', ([OrderController::Class, 'toTrim']))->middleware(['auth'])->name('toTrim');
// Route::post('/orders/new/addtrim', ([OrderController::Class, 'addTrim']))->middleware(['auth'])->name('addTrim');
// Route::get('/orders/new/add', ([OrderController::Class, 'toCart']))->middleware(['auth'])->name('toCart');
// Route::post('/orders/new/additem', ([OrderController::Class, 'addItemToCart']))->middleware(['auth'])->name('addItem');
// Route::post('/orders/new/deleteitem', ([OrderController::Class, 'deleteOrderItem']))->middleware(['auth'])->name('deleteOrderItem');
Route::post('/orders/new/quote', ([OrderController::Class, 'totalQuote']))->middleware(['auth'])->name('totalQuote');
// Route::get('/orders/new/viewQuote', ([OrderController::Class, 'viewQuote']))->middleware(['auth'])->name('viewQuote');
// Route::post('/orders/new/updateOrderItem', ([OrderController::Class, 'updateOrderItem']))->middleware(['auth'])->name('updateOrderItem');
// Route::get('/orders/new/submitOrder', ([OrderController::Class, 'submitOrder']))->middleware(['auth'])->name('submitOrder');
// // Route::get('/orders/new/continue', ([OrderController::Class, 'toPanels']))->middleware(['auth'])->name('toPanels');
// Route::get('/orders/new/clearSession', ([OrderController::Class, 'clearSession']))->middleware(['auth'])->name('clearSession');
// Route::post('/orders/new/deletePanel', ([OrderController::Class, 'deletePanel']))->middleware(['auth'])->name('deletePanel');
// Route::post('/orders/new/deleteTrim', ([OrderController::Class, 'deleteTrim']))->middleware(['auth'])->name('deleteTrim');
// Route::post('/orders/new/deleteMisc', ([OrderController::Class, 'deleteMisc']))->middleware(['auth'])->name('deleteMisc');


Route::get('/customers', ([CustomerController::Class, 'all']))->middleware(['auth'])->name('customers');
Route::get('/customers/new', ([CustomerController::Class, 'new']))->middleware(['auth'])->name('new_cust');
Route::post('/customers', ([CustomerController::Class, 'add']))->middleware(['auth'])->name('add');
Route::get('/customers/{id}', ([CustomerController::Class, 'viewCustomer']))->middleware(['auth'])->name('viewCustomer');
Route::get('/customers/{id}/edit', ([CustomerController::Class, 'alter']))->middleware(['auth'])->name('edit');
Route::post('/customers/edit/submit', ([CustomerController::Class, 'edit']))->middleware(['auth'])->name('customerEdit');
Route::get('/customers/{id}/delete', ([CustomerController::Class, 'delete']))->middleware(['auth'])->name('del_cust');

Route::get('inventory/', ([InventoryController::Class, 'view']))->middleware(['auth'])->name('view-inv');
Route::post('inventory/', ([InventoryController::Class, 'view']))->middleware(['auth'])->name('category');
Route::get('inventory/new', ([InventoryController::Class, 'new']))->middleware(['auth'])->name('new-inv');
Route::get('inventory/add-roll', ([InventoryController::Class, 'newroll']))->middleware(['auth'])->name('new-roll');
Route::get('inventory/rollstore', ([InventoryController::Class, 'storeroll']))->middleware(['auth'])->name('roll-store');
Route::get('inventory/store', ([InventoryController::Class, 'store']))->middleware(['auth'])->name('store');
Route::get('inventory/new/shipment', ([InventoryController::Class, 'newShipment']))->middleware(['auth'])->name('newShipment');
Route::post('inventory/receive', ([InventoryController::Class, 'newShip']))->middleware(['auth'])->name('newShip');

require __DIR__.'/auth.php';
