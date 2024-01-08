<?php

// Frontend Controller
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\productPageController;
use App\Http\Controllers\Frontend\dashboardController;


// Backend Controller 
use App\Http\Controllers\Backend\AdminPageController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\ProductController;



/*
|--------------------------------------------------------------------------
| Fronted Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// static pages
Route::get('/', [PageController::class, 'Home'])->name('homepage');
Route::get('/about', [PageController::class, 'about'])->name('aboutPage');
Route::get('/contact', [PageController::class, 'contact'])->name('contactPage');
Route::get('/404-not-found', [PageController::class, 'error404'])->name('errorPage');


// product pages
Route::get('/all-product', [productPageController::class, 'allProducts'])->name('allProduct');
Route::get('/offer-product', [productPageController::class, 'offerProducts'])->name('offerProduct');


// user auth pages
Route::get('/user-login', [dashboardController::class, 'userLogin'])->name('user-login');
Route::get('/user-register', [dashboardController::class, 'userRegister'])->name('user-register');
Route::get('/my-dashboard', [dashboardController::class, 'userDashboard'])->name('user-dashboard');
Route::get('/my-profile', [dashboardController::class, 'userProfile'])->name('user-profile');



/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix'=>'/admin'], function(){

    Route::get('/dashboard', [AdminPageController::class, 'index'])->name('admin.dashboard');


   // Brand
    Route::group(['prefix'=>'/brand'], function(){
        Route::get('/manage', [BrandController::class, "manage"])->name('brand.manage');
        Route::get('/create', [BrandController::class, "create"])->name('brand.create');
        Route::post('/store', [BrandController::class, "store"])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, "edit"])->name('brand.edit');
        Route::post('/update/{id}', [BrandController::class, "update"])->name('brand.update');
        Route::get('/destroy/{id}', [BrandController::class, "destroy"])->name('brand.destroy');
        Route::get('/trash/{id}', [BrandController::class, "trash"])->name('brand.trash');
        Route::get('/trash-manager', [BrandController::class, "trashManager"])->name('brand.trash-manager');
    });


    // Category
    Route::group(['prefix'=>'/category'], function(){
        Route::get('/manage', [CategoryController::class, "manage"])->name('category.manage');
        Route::get('/create', [CategoryController::class, "create"])->name('category.create');
        Route::post('/store', [CategoryController::class, "store"])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, "edit"])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, "update"])->name('category.update');
        Route::get('/destroy/{id}', [CategoryController::class, "destroy"])->name('category.destroy');
        Route::get('/trash/{id}', [CategoryController::class, "trash"])->name('category.trash');
        Route::get('/trash-manager', [CategoryController::class, "trashManager"])->name('category.trash-manager');
    });


    // Product
    Route::group(['prefix'=>'/product'], function(){
        Route::get('/manage', [ProductController::class, "manage"])->name('product.manage');
        Route::get('/create', [ProductController::class, "create"])->name('product.create');
        Route::post('/store', [ProductController::class, "store"])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, "edit"])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, "update"])->name('product.update');
        Route::get('/destroy/{id}', [ProductController::class, "destroy"])->name('product.destroy');
        Route::get('/trash/{id}', [ProductController::class, "trash"])->name('product.trash');
        Route::get('/trash-manager', [ProductController::class, "trashManager"])->name('product.trash-manager');
    });


    // Country
    Route::group(['prefix' => '/country'], function(){
        Route::get('/manage', [CountryController::class, "manage"])->name('country.manage');
        Route::get('/create', [CountryController::class, "create"])->name('country.create');
        Route::post('/store', [CountryController::class, "store"])->name('country.store');
        Route::get('/edit/{id}', [CountryController::class, "edit"])->name('country.edit');
        Route::post('/update/{id}', [CountryController::class, "update"])->name('country.update');
        Route::get('/destroy/{id}', [CountryController::class, "destroy"])->name('country.destroy');
        Route::get('/trash/{id}', [CountryController::class, "trash"])->name('country.trash');
        Route::get('/trash-manager', [CountryController::class, "trashManager"])->name('country.trash-manager');
    });


    // State
    Route::group(['prefix' => '/state'], function(){
        Route::get('/manage', [StateController::class, "manage"])->name('state.manage');
        Route::get('/create', [StateController::class, "create"])->name('state.create');
        Route::post('/store', [StateController::class, "store"])->name('state.store');
        Route::get('/edit/{id}', [StateController::class, "edit"])->name('state.edit');
        Route::post('/update/{id}', [StateController::class, "update"])->name('state.update');
        Route::get('/destroy/{id}', [StateController::class, "destroy"])->name('state.destroy');
        Route::get('/trash/{id}', [StateController::class, "trash"])->name('state.trash');
        Route::get('/trash-manager', [StateController::class, "trashManager"])->name('state.trash-manager');
    });

    
     // District
     Route::group(['prefix' => '/district'], function(){
        Route::get('/manage', [DistrictController::class, "manage"])->name('district.manage');
        Route::get('/create', [DistrictController::class, "create"])->name('district.create');
        Route::post('/store', [DistrictController::class, "store"])->name('district.store');
        Route::get('/edit/{id}', [DistrictController::class, "edit"])->name('district.edit');
        Route::post('/update/{id}', [DistrictController::class, "update"])->name('district.update');
        Route::get('/destroy/{id}', [DistrictController::class, "destroy"])->name('district.destroy');
        Route::get('/trash/{id}', [DistrictController::class, "trash"])->name('district.trash');
        Route::get('/trash-manager', [DistrictController::class, "trashManager"])->name('district.trash-manager');
    });

});