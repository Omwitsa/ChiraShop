<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubCategoryController;  
use Illuminate\Support\Facades\Route;
use App\Livewire\UserComponent;
use App\Livewire\ClientComponent;
use App\Livewire\CategoryList;
use App\Livewire\Orders;
use App\Livewire\SingleBox;
use App\Livewire\NewUser;
use App\Livewire\VarietyComponent;
use App\Livewire\NewVariety;
use App\Livewire\NewSubCategory;
use App\Livewire\NewCategory;
use App\Livewire\NewClient;
use App\Livewire\DropoffList;
use App\Livewire\NewDropoff;
use App\Livewire\ClientCategoryList;
use App\Livewire\NewClientCategory;
use App\Livewire\RegionList;
use App\Livewire\NewRegion;
use App\Livewire\EditRegion;
use App\Livewire\PriceList;
use App\Livewire\NewPrice;
use App\Livewire\PackRateList;
use App\Livewire\NewPackRate;
use App\Livewire\OrderSummery;
use App\Livewire\MixBoxComponent;
use App\Livewire\MixedBox;
use App\Livewire\NewMixedBox;
use App\Livewire\EditCategory;
use App\Livewire\EditClientCategory;
use App\Livewire\EditUser;
use App\Livewire\EditClient;
use App\Livewire\EditVariety;
use App\Livewire\EditSubCategory;
use App\Livewire\EditDropOff;
use App\Livewire\SubCategoryList;
use App\Livewire\ClientHome;
use App\Livewire\CategoryComponent;
use App\Livewire\SubCategoryComponent;
use App\Livewire\Checkout;

use App\Models\OrderHeader;
use App\Mail\OrderNotification;
// Route::view('/', 'welcome');

// Route::get('/', 'HomeController@index');
Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::get('/logout', [HomeController::class, 'logout']);
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

Route::get('/orders', Orders::class);
Route::get('/client-home', ClientHome::class);
Route::get('/category-component', CategoryComponent::class);
Route::get('/single-box', SingleBox::class);
Route::get('/mixed-box', MixedBox::class);
Route::get('/list-mixed-box', MixBoxComponent::class);
Route::get('/new-mixed-box', NewMixedBox::class);
Route::get('/users', UserComponent::class);
Route::get('/new-user', NewUser::class);
Route::get('/clients', ClientComponent::class);
Route::get('/new-client', NewClient::class);
Route::get('/categories', CategoryList::class);
Route::get('/new-category', NewCategory::class);
Route::get('/varieties', VarietyComponent::class);
Route::get('/new-variety', NewVariety::class);
Route::get('/sub-categories', SubCategoryList::class);
Route::get('/new-sub-category', NewSubCategory::class);
Route::get('/dropoffs', DropoffList::class);
Route::get('/new-dropoff', NewDropoff::class);
Route::get('/client-categories', ClientCategoryList::class);
Route::get('/new-client-category', NewClientCategory::class);
Route::get('/regions', RegionList::class);
Route::get('/new-region', NewRegion::class);
Route::get('/edit-region/{id}', EditRegion::class)->name('edit-region');
Route::get('/edit-category/{id}', EditCategory::class)->name('edit-category');
Route::get('/edit-client-cat/{id}', EditClientCategory::class)->name('edit-client-cat');
Route::get('/edit-user/{id}', EditUser::class)->name('edit-user');
Route::get('/edit-client/{id}', EditClient::class)->name('edit-client');
Route::get('/edit-variety/{id}', EditVariety::class)->name('edit-variety');
Route::get('/edit-sub-category/{id}', EditSubCategory::class)->name('edit-sub-category');
Route::get('/edit-dropoff/{id}', EditDropOff::class)->name('edit-dropoff');
Route::get('/prices', PriceList::class);
Route::get('/new-price', NewPrice::class);
Route::get('/packrates', PackRateList::class);
Route::get('/new-packrate', NewPackRate::class);
Route::get('/order-summary', OrderSummery::class); 
Route::get('/sub-category-component/{category}', SubCategoryComponent::class); 
Route::get('/checkout', Checkout::class); 


// Route for mailing
Route::get('/email', function(){
    $order = OrderHeader::find(10);
    return new OrderNotification($order);
});

require __DIR__.'/auth.php';
