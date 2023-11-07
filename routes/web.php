<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TenderController;
use App\Http\Controllers\Admin\ListTenderController;
use App\Http\Controllers\Admin\ReadTenderController;
use App\Http\Controllers\Admin\AllProductController;
use App\Http\Controllers\Admin\CreateProductController;
use App\Http\Controllers\Admin\ViewProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\CustomerRoleController;
use App\Http\Controllers\Admin\TenderMappingController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\UserRolePermissionController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductManagementController;
use App\Http\Controllers\Admin\TenderManagementController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\Admin\ProfileController;




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



Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'middleware' => 'auth:web',
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/reset-password', [ProfileController::class, 'resetPassword'])->name('reset-password');

    //user management
    Route::group([
        'prefix' => 'users',
        'as' => 'users.'
    ], function () {
        Route::get('/', [UserManagementController::class, 'index'])->name('all');
        Route::get('/create-user', [UserManagementController::class, 'create'])->name('create-user');
        Route::post('/store-user', [UserManagementController::class, 'store'])->name('store-user');
        Route::get('/get-user', [UserManagementController::class, 'getAjaxUserData'])->name('get-user');
        Route::delete('/delete-user/{id}', [UserManagementController::class, 'destroy'])->name('delete-user');
        Route::get('/edit-user/{id}', [UserManagementController::class, 'edit'])->name('edit-user');
        Route::put('/update-user/{id}', [UserManagementController::class, 'update'])->name('update-user');        
    });

    //user role & permission
    Route::group([
        'prefix' => 'role-and-permissions',
        'as' => 'role.'
    ], function () {
        Route::get('/roles', [UserRolePermissionController::class, 'index'])->name('roles');
        Route::get('/create-role', [UserRolePermissionController::class, 'create'])->name('create-role');
        Route::post('/store-role', [UserRolePermissionController::class, 'store'])->name('store-role');
        Route::get('/get-user-role', [UserRolePermissionController::class, 'getAjaxRoleData'])->name('get-user-role');
        Route::get('/edit-role/{id}', [UserRolePermissionController::class, 'edit'])->name('edit-role');
        Route::put('/update-role/{id}', [UserRolePermissionController::class, 'update'])->name('update-role');
       
    });

    // Tender Management
    Route::group([
        'prefix' => 'tenders',
        'as' => 'tender.'
    ], function () {
        Route::get('/tender-reading',[TenderManagementController::class, 'index'])->name('tender-reading');
        Route::get('/tender-evaluation', [TenderManagementController::class, 'edit'])->name('tender-evaluation');
        Route::get('/previous-tenders', [TenderManagementController::class, 'create'])->name('previous-tenders');
        Route::get('/tender-mapping', [TenderManagementController::class, 'view'])->name('tender-mapping');

        // Route::get('/tender-reading', [ReadTenderController::class, 'ReadTender'])->name('tender-reading');
});

    //Product
    Route::group([
        'prefix' => 'manage-products',
        'as' => 'product.'
    ], function () {
        Route::get('/all-products', [ProductManagementController::class, 'index'])->name('all-products');
        Route::get('/create-product',[ProductManagementController::class, 'create'])->name('create-product');
        Route::get('/view-product',[ProductManagementController::class, 'edit'])->name('view-product');
    });

    // CutomerRoleController
    Route::get('/customer-role', [CustomerRoleController::class, 'AllCustomerRole'])->name('customer-role');
    Route::get('/tender-mapping',  [TenderMappingController::class, 'TenderMapping'])->name('tender-mapping');

    Route::get('full-calender', [FullCalenderController::class, 'index']);

    Route::post('full-calender/action', [FullCalenderController::class, 'action']);


    // Supplier Management
    Route::group([
        'prefix' => 'manage-supllier',
        'as' => 'supplier.'
    ], function () {
        Route::get('/create-brands', [SupplierController::class, 'index'])->name('create-brands');
    });


    // FullCalendar

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('full-calender', [FullCalenderController::class, 'index']);

    Route::post('full-calender/action', [FullCalenderController::class, 'action']);


});

    


