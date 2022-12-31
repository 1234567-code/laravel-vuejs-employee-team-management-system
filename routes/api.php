<?php
//namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Controller;
use app\Http\Controllers\EmployeeController;
use app\Http\Controllers\RoleController;
use app\Http\Controllers\TeamController;
use app\Http\Controllers\TeamMemberController;
use app\Http\Controllers\UserAccountController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('employee')->name('employee')->group(function(){
    Route::get('index', [App\Http\Controllers\EmployeeController::class, 'index']);


 });
Route::prefix('user_account')->name('user_account')->group(function(){
    Route::post('store', [App\Http\Controllers\UserAccountController::class, 'store']);
    Route::get('index', [App\Http\Controllers\UserAccountController::class, 'index']);
    Route::get('create', [App\Http\Controllers\UserAccountController::class, 'create']);

});
Route::prefix('team')->name('team')->group(function(){
    Route::get('index', [App\Http\Controllers\TeamController::class, 'index']);
    Route::get('create', [App\Http\Controllers\TeamController::class, 'create']);
    Route::post('store', [App\Http\Controllers\TeamController::class, 'store']);
});
Route::prefix('role')->name('role')->group(function(){
    Route::post('store', [App\Http\Controllers\RoleController::class, 'store']);
    Route::get('index', [App\Http\Controllers\RoleController::class, 'index']);
    Route::get('create', [App\Http\Controllers\RoleController::class, 'create']);
});

Route::prefix('team_member')->group(function(){
    Route::post('store', [App\Http\Controllers\TeamMemberController::class, 'store']);
});