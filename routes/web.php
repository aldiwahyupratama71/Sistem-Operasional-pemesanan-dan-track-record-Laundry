<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index']);
Route::get('/track/{invoice}', [LandingController::class, 'track']);

Route::get(
    '/invoice/{id}',
    [InvoiceController::class, 'download']
);