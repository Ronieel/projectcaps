<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransportBookingController;
// Route::get('/', function () {
//     return view('index');
// });


Route::get('/home', [HomepageController::class, 'index'])->name('homepage');
Route::get('/tour-package', [HomepageController::class, 'tour_package'])->name('tour-package');
Route::get('/rentals', [HomepageController::class, 'rentals'])->name('rentals');
Route::get('/hotel-reservation', [HomepageController::class, 'hotel_resevation'])->name('hotel-reservation');
Route::get('/flights', [HomepageController::class, 'flights'])->name('flights');
Route::get('/login', [HomepageController::class, 'login'])->name('login');
Route::get('/register', [HomepageController::class, 'register'])->name('register');
Route::get('/user-dashboard', [HomepageController::class, 'user_dashboard'])->name('user-dahsboard');


// ======================= ADMIN DASHBOARD ======================================
// ======================= TOUR CREATION  ======================================
Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->name('admin-dashboard');
Route::get('/admin-profile', [AdminController::class, 'admin_profile'])->name('admin-profile');
Route::get('/create-tours', [AdminController::class, 'create_tour'])->name('create-tours');
Route::get('/view-destination', [AdminController::class, 'view_destination'])->name('view-destination');
Route::get('/manage-tour', [AdminController::class, 'manage_tours'])->name('manage-tour');
Route::get('/destination/{id}', [AdminController::class, 'show']);  // View destination details
Route::get('/edit-destination/{id}', [AdminController::class, 'edit']);  // View destination details
// ======================= TRANSPORT BOOKING  ======================================
Route::get('/create-booking', [TransportBookingController::class, 'create_booking'])->name('create_booking');
Route::get('/manage-booking', [TransportBookingController::class, 'manage_booking'])->name('manage-booking');
Route::get('/view-booking/{id}', [TransportBookingController::class, 'show']);  // View destination details
Route::get('/edit-booking/{id}', [TransportBookingController::class, 'edit']); 
// =================================================================================
