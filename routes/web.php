<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;




Route::get('/', function () {
    return view('welcome');
});


Route::get('/categories', [CategoryController::class, 'getCategories']);

Route::get('/staff', [StaffController::class, 'getStaff']);

Route::get('/services', [ServiceController::class, 'getServices']);

Route::get('/displayServices', [ServiceController::class, 'displayServices']);


Route::get('/appointments/{userId}', [AppointmentController::class, 'getAppointments']);

Route::get('/appointments', [AppointmentController::class, 'getAllAppointments']);

Route::post('/addCategory', [CategoryController::class, 'store']);

Route::post('/addService', [ServiceController::class, 'store']); 

Route::post('/addStaff', [StaffController::class, 'store']); 


Route::post('/addPromotion', [PromotionController::class, 'store']); 

Route::post('/addAppointment', [AppointmentController::class, 'store']); 

Route::post('/addPayment', [PaymentController::class, 'store']); 