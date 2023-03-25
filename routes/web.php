<?php

use App\Http\Controllers\FrontEnd\Landind\LandingPageController;

Route::get('/', [LandingPageController::class, 'index']);

Route::post('/contactus', [LandingPageController::class, 'contactUs'])->name('contactUs');
