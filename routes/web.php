<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

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
// index
Route::get('/', [ListingController::class, 'index']);
// Create new Gig
Route::get('/listings/create', [ListingController::class, 'create']);

// Storing data to db
Route::post('/listings', [ListingController::class, 'store']);











// Route Modal Binding -- Show Single -- Must be put at the bottom 
Route::get('/listings/{listing}', [ListingController::class, 'show']);