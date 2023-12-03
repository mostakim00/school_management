<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\StoreInController;
use App\Http\Controllers\Backend\StoreOutController;
use App\Http\Controllers\Backend\ClassroomController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ActivityLogController;
use App\Http\Controllers\Backend\RoleAndPermissionController;

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







/*
|--------------------------------------------------------------------------
| Route For Admin Dashboard
|--------------------------------------------------------------------------*/
//<--route for Dashboard-->
Route::get('/', function () {
    return view('backend.pages.dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->prefix('admin')->group(function(){
    //<--route for adminstration-->
    Route::prefix('administration')->group(function (){
        //user
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/add-edit-user/{id?}', [UserController::class, 'add_edit'])->where('id', '.*')->name('users.add_edit');
        Route::post('/store-update-user/{id?}', [UserController::class, 'store_update'])->where('id', '.*')->name('users.store_update');

        //activity log
       Route::get('/user-activity',[ActivityLogController::class,'index'])->name('activityLog.index');

        //Role and permissions
        Route::get('/role-permissions',[RoleAndPermissionController::class,'index'])->name('role-permission.index');
        Route::get('/add-edit-role/{id?}',[RoleAndPermissionController::class,'add_edit'])->where('id', '.*')->name('role-permission.add_edit');
        Route::post('/role-store',[RoleAndPermissionController::class,'store'])->name('role-permission.store');
        Route::post('/role-update/{id}',[RoleAndPermissionController::class,'update'])->name('role-permission.update');

    });


    //<--route for brand-->
    Route::get('/list-brand',[BrandController::class,'index'])->name('brand.index');

    //<--route for category-->
    Route::get('/list-category',[CategoryController::class,'index'])->name('category.index');

    //<--route for Unit-->
    Route::get('/list-unit',[UnitController::class,'index'])->name('unit.index');

    //<--route for Product-->
    Route::get('/list-product',[ProductController::class,'index'])->name('product.index');
    Route::get('/add-product',[ProductController::class,'create'])->name('product.create');

    //<--route for Store in -->
    Route::get('/list-store-in',[StoreInController::class,'index'])->name('store_in.index');
    Route::get('/create-new-store-in',[StoreInController::class,'create'])->name('store_in.create');

    //<--route for Store Out -->
    Route::get('/list-store-out',[StoreOutController::class,'index'])->name('store_out.index');
    Route::get('/create-new-store-out',[StoreOutController::class,'create'])->name('store_out.create');

    //<--route for Classroom -->
    Route::get('/index',[\App\Http\Controllers\Backend\ClassroomController::class, 'index'])->name('classroom.index');

});





/*
|--------------------------------------------------------------------------
| Route For Demo Template
|--------------------------------------------------------------------------*/
Route::get('/blank',function(){
    return view('backend.pages.blank');
})->name('blank');

Route::get('/table',function (){
    return view('backend.pages.table');
})->name('table');

Route::get('/forms',function (){
    return view('backend.pages.forms');
})->name('forms');


/*
|--------------------------------------------------------------------------
| End Demo Template
|--------------------------------------------------------------------------*/


require __DIR__.'/auth.php';
