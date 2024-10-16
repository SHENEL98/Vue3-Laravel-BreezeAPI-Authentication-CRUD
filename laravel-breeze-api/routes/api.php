<?php

use App\Http\Controllers\Api\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RoleController;

Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('skills', SkillController::class);
});

/*Route::group(['prefix' => 'v2'], function() {
   Route::apiResource('books',BookController::class);
});*/




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
/*Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/user',function(Request $request){
        return $request->user();
    });
    Route::resource('/posts',PostController::class);
   
    Route::resource('v2/books',BookController::class);

    Route::resource('roles',RoleController::class);

    Route::get('getuserpermissions',[RoleController::class,'getUserRolePermissions']);

});

