<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubCategoryController;  
use Illuminate\Support\Facades\Route;

use App\Livewire\RegionList;
use App\Livewire\ClubList;
use App\Livewire\UserList;
use App\Livewire\ClientList;

use App\Livewire\Orders;
use App\Livewire\NewUser;
use App\Livewire\NewClient;
use App\Livewire\ClientCategoryList;
use App\Livewire\NewClientCategory;

use App\Livewire\NewRegion;
use App\Livewire\EditRegion;
use App\Livewire\PriceList;
use App\Livewire\NewPrice;
use App\Livewire\OrderSummery;
use App\Livewire\EditClientCategory;
use App\Livewire\EditUser;
use App\Livewire\EditClient;
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
Route::get('/clubs', ClubList::class);
Route::get('/users', UserList::class);
Route::get('/clients', ClientList::class);



Route::get('/orders', Orders::class);
Route::get('/client-home', ClientHome::class);
Route::get('/new-user', NewUser::class);
Route::get('/new-client', NewClient::class);
Route::get('/client-categories', ClientCategoryList::class);
Route::get('/new-client-category', NewClientCategory::class);
Route::get('/new-region', NewRegion::class);
Route::get('/edit-region/{id}', EditRegion::class)->name('edit-region');
Route::get('/edit-client-cat/{id}', EditClientCategory::class)->name('edit-client-cat');
Route::get('/edit-user/{id}', EditUser::class)->name('edit-user');
Route::get('/edit-client/{id}', EditClient::class)->name('edit-client');
Route::get('/prices', PriceList::class);
Route::get('/new-price', NewPrice::class);
Route::get('/order-summary', OrderSummery::class); 
Route::get('/checkout', Checkout::class); 
Route::get('/client-orders', ClientOrders::class); 


// Route for mailing
Route::get('/email', function(){
    $order = OrderHeader::find(10);
    return new OrderNotification($order);
});

require __DIR__.'/auth.php';
