<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// Show route form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);



// Update Data after edit 
Route::put('/listings/{listing}', [ListingController::class, 'update']);


// Delete
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);
// User Routes
// Register route
Route::get('/register', [UserController::class, 'create']);

// Store us
Route::post('/users', [UserController::class, 'store']);

// Login
Route::get('/login', [UserController::class, 'login']);

// Route Modal Binding -- Show Single -- Must be put at the bottom 
Route::get('/listings/{listing}', [ListingController::class, 'show']);