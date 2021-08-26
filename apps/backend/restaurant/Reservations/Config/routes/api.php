<?php

use Apps\Backend\restaurant\Reservations\Controllers\ReservationPostController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->post("/reservation/{id}", ReservationPostController::class);

