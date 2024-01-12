<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeadOffice\BranchController;
use App\Http\Controllers\HeadOffice\Configuration\CityController;
use App\Http\Controllers\HeadOffice\Configuration\ColorControler;
use App\Http\Controllers\HeadOffice\Configuration\GroupController;
use App\Http\Controllers\HeadOffice\Configuration\StateController;
use App\Http\Controllers\HeadOffice\Configuration\CountryControler;
use App\Http\Controllers\HeadOffice\Configuration\CompanyController;
use App\Http\Controllers\HeadOffice\Configuration\CategoryController;
use App\Http\Controllers\HeadOffice\Configuration\DepartmentController;
use App\Http\Controllers\HeadOffice\Configuration\DesignationController;
use App\Http\Controllers\HeadOffice\Configuration\SubCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('department', DepartmentController::class, ['except' => ['show']]);
Route::get('department-list/{pagination?}',[DepartmentController::class,'render_list']);
Route::get('department-dropdown',[DepartmentController::class,'dropdown']);

Route::resource('designation', DesignationController::class, ['except' => ['show']]);
Route::get('designation-list/{pagination?}',[DesignationController::class,'render_list']);
Route::get('designation-dropdown',[DesignationController::class,'dropdown']);

Route::resource('city', CityController::class, ['except' => ['show']]);
Route::get('city-list/{pagination?}',[CityController::class,'render_list']);
Route::get('city-dropdown',[CityController::class,'dropdown']);

Route::resource('company', CompanyController::class, ['except' => ['show']]);
Route::get('company-list/{pagination?}',[CompanyController::class,'render_list']);
Route::get('company-dropdown',[CompanyController::class,'dropdown']);

Route::resource('group', GroupController::class, ['except' => ['show']]);
Route::get('group-list/{pagination?}',[GroupController::class,'render_list']);
Route::get('group-dropdown',[GroupController::class,'dropdown']);

Route::resource('state', StateController::class, ['except' => ['show']]);
Route::get('state-list/{pagination?}',[StateController::class,'render_list']);
Route::get('state-dropdown',[StateController::class,'dropdown']);

Route::resource('category', CategoryController::class, ['except' => ['show']]);
Route::get('category-list/{pagination?}',[CategoryController::class,'render_list']);
Route::get('category-dropdown',[CategoryController::class,'dropdown']);

Route::resource('subcategory', SubCategoryController::class, ['except' => ['show']]);
Route::get('subcategory-list/{pagination?}',[SubCategoryController::class,'render_list']);
Route::get('subcategory-dropdown',[SubCategoryController::class,'dropdown']);

Route::resource('branch', BranchController::class, ['except' => ['show']]);
Route::get('branch-list/{pagination?}',[BranchController::class,'render_list']);
Route::get('branch-dropdown',[BranchController::class,'dropdown']);

Route::resource('country', CountryControler::class, ['except' => ['show']]);
Route::get('country-list/{pagination?}',[CountryControler::class,'render_list']);
Route::get('country-dropdown',[CountryControler::class,'dropdown']);

Route::resource('color', ColorControler::class, ['except' => ['show']]);
Route::get('color-list/{pagination?}',[ColorControler::class,'render_list']);
Route::get('color-dropdown',[ColorControler::class,'dropdown']);


Route::resource('city', CityController::class, ['except' => ['show']]);
Route::get('city-list/{pagination?}',[CityController::class,'render_list']);
