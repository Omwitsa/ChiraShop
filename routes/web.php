<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubCategoryController;  
use Illuminate\Support\Facades\Route;

use App\Livewire\RegionList;
use App\Livewire\RegionNew;
use App\Livewire\RegionEdit;
use App\Livewire\ClubList;
use App\Livewire\ClubNew;
use App\Livewire\ClubEdit;
use App\Livewire\UserList;
use App\Livewire\UserNew;
use App\Livewire\UserEdit;
use App\Livewire\ClientList;
use App\Livewire\ClientNew;
use App\Livewire\ClientEdit;
use App\Livewire\ClientCategoryList;
use App\Livewire\ClientCategoryNew;
use App\Livewire\ClientCategoryEdit;
use App\Livewire\PriceList;
use App\Livewire\PriceNew;
use App\Livewire\CourseList;
use App\Livewire\CourseNew;
use App\Livewire\CourseEdit;
use App\Livewire\ProductCategoryList;
use App\Livewire\ProductCategoryNew;
use App\Livewire\ProductCategoryEdit;

use App\Livewire\Orders;
use App\Livewire\OrderSummery;
use App\Livewire\ClientHome;
use App\Livewire\Checkout;
use App\Livewire\Client\ClientOrders;

use App\Models\OrderHeader;
use App\Mail\OrderNotification;
// Route::view('/', 'welcome');

// Route::get('/', 'HomeController@index');
Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::get('/client-dashboard', [HomeController::class, 'clientDashboard']);
Route::get('/logout', [HomeController::class, 'logout']);
// Route::get('/login-agent', [HomeController::class, 'loginAgent']);
Route::get('/guest', [HomeController::class, 'guest']);
Route::get('/sub-category/{categoryName}', [SubCategoryController::class, 'subCategory']);
Route::get('/variety/{subCategory}', [SubCategoryController::class, 'variety']);
Route::get('/add-to-cart/{param}', [SubCategoryController::class, 'addToCart']);
Route::view('/foreign-dashboard', 'foreign-dashboard');
Route::get('/increment-order-item/{variety}', [HomeController::class, 'incrementOrderItem']);
Route::get('/decrement-order-item/{variety}', [HomeController::class, 'decrementOrderItem']);
Route::get('/remove-bunch/{variety}', [HomeController::class, 'removeBunch']);

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/regions', RegionList::class);
Route::get('/new-region', RegionNew::class);
Route::get('/edit-region/{id}', RegionEdit::class)->name('edit-region');
Route::get('/clubs', ClubList::class);
Route::get('/new-club', ClubNew::class);
Route::get('/edit-club', ClubEdit::class);
Route::get('/users', UserList::class);
Route::get('/new-user', UserNew::class);
Route::get('/edit-user/{id}', UserEdit::class)->name('edit-user');
Route::get('/clients', ClientList::class);
Route::get('/new-client', ClientNew::class);
Route::get('/edit-client/{id}', ClientEdit::class)->name('edit-client');
Route::get('/client-categories', ClientCategoryList::class);
Route::get('/new-client-category', ClientCategoryNew::class);
Route::get('/edit-client-cat/{id}', ClientCategoryEdit::class)->name('edit-client-cat');
Route::get('/prices', PriceList::class);
Route::get('/new-price', PriceNew::class);
Route::get('/courses', CourseList::class);
Route::get('/new-course', CourseNew::class);
Route::get('/edit-course/{id}', CourseEdit::class)->name('edit-course');
Route::get('/product-categories', ProductCategoryList::class);
Route::get('/new-product-category', ProductCategoryNew::class);
Route::get('/edit-product-category/{id}', ProductCategoryEdit::class)->name('edit-product-category');


Route::get('/orders', Orders::class);
Route::get('/client-home', ClientHome::class);
Route::get('/order-summary', OrderSummery::class); 
Route::get('/checkout', Checkout::class); 
Route::get('/client-orders', ClientOrders::class); 


// Route for mailing
Route::get('/email', function(){
    $order = OrderHeader::find(10);
    return new OrderNotification($order);
});

require __DIR__.'/auth.php';
