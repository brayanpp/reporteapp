<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicReportController;

Route::get('/report/create', [PublicReportController::class, 'create'])->name('reports.create');
Route::post('/report', [PublicReportController::class, 'store'])->name('reports.store');
Route::get('/', [PublicReportController::class, 'create']);
