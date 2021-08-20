<?php

use Apps\Backend\restaurant\Tables\Controllers\TablePutController;
use Illuminate\Support\Facades\Route;
use Apps\Backend\restaurant\Tables\Controllers\TablePostController;

Route::middleware(['auth:sanctum', 'verified'])->post('/table/{id}', TablePostController::class);
Route::middleware(['auth:sanctum', 'verified'])->put('/table', TablePutController::class);
