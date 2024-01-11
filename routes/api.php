<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Models\SubCategory;


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


// get sub category route api
Route::get("/get-subCat/{id}", function($id){
    // dd('Route accessed with ID: ' . $id); 
    return json_encode( App\Models\SubCategory::where('category_id', $id)->get() );
});




