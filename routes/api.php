<?php

use App\Http\Controllers\AuthCotroller;
use App\Http\Controllers\ProductCotroller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/logout', [AuthCotroller::class, 'logout']);
    Route::post('/products', [ProductCotroller::class, 'store']);
    Route::put('/products/{id}', [ProductCotroller::class, 'update']);
    Route::delete('/products/{id}', [ProductCotroller::class, 'destroy']);
});

Route::post('/register', [AuthCotroller::class, 'register']);
Route::post('/login', [AuthCotroller::class, 'login']);
Route::get('/products', [ProductCotroller::class, 'index']);
Route::post('/products/{id}', [ProductCotroller::class, 'show']);


Route::apiResources([
    'desks'=> \App\Http\Controllers\Api\DeskController::class,
]);

// Route::get('/products', function(){ 
//     return Product::all();
// });
// Route::post('/products', function(Request $request){
//     return Product::create($request->all());
//     // return Product::create([
//     //     'name' => 'Prod 1',
//     //     'description' => 'This is product 1',
//     //     'price' => '99.99',
//     // ]);    
// });



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
