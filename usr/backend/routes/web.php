<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

Route::get('/', function () {
    return view('dashboard');
});

Route::prefix('documents')->group(function () {
    Route::get('/invoice/{invoice}/excel', [DocumentController::class, 'downloadInvoiceExcel'])->name('documents.invoice.excel');
    Route::get('/work-report/{report}/pdf', [DocumentController::class, 'downloadWorkReportPdf'])->name('documents.work_report.pdf');
    Route::get('/cover/{project}/pdf', [DocumentController::class, 'downloadCoverPdf'])->name('documents.cover.pdf');
});
