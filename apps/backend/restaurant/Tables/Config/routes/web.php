<?php

use Illuminate\Support\Facades\Route;
use Apps\Backend\restaurant\Tables\Controllers\TablePostController;

Route::middleware(['auth:sanctum', 'verified'])->post('/table/{id}', TablePostController::class);
