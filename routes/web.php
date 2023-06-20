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
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Storing data to db
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show route form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Manage Listings

Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Update Data after edit 
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');


// Delete
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
// User Routes
// Register route
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Store us
Route::post('/users', [UserController::class, 'store']);

// Login
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

// Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');








// Route Modal Binding -- Show Single -- Must be put at the bottom 
Route::get('/listings/{listing}', [ListingController::class, 'show']);
