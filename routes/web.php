<?php

use App\Http\Controllers\TrelloLeadController;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home');
Route::view('/iproc-cloud', 'pages.iproc-cloud');
Route::view('/iproc-cloud/form-success', 'pages.iproc-cloud-form-success');
Route::redirect('/iproc-cloud/keamanan-kepatuhan', '/iproc-cloud#security-compliance', 301);
Route::view('/iproc-2go', 'pages.iproc-2go');
Route::view('/iproc-2go/privacy-policy', 'pages.iproc-2go-privacy');
Route::redirect('/iproc-2go/kebijakan-privasi', '/iproc-2go/privacy-policy', 301);
Route::redirect('/iproc-2go/kebijakan-privasi.html', '/iproc-2go/privacy-policy', 301);

Route::prefix('id')->group(function (): void {
    Route::view('/', 'pages.home');
    Route::view('/iproc-cloud', 'pages.iproc-cloud');
    Route::view('/iproc-cloud/form-success', 'pages.iproc-cloud-form-success');
    Route::redirect('/iproc-cloud/keamanan-kepatuhan', '/id/iproc-cloud#security-compliance', 301);
    Route::view('/iproc-2go', 'pages.iproc-2go');
    Route::view('/iproc-2go/kebijakan-privasi', 'pages.iproc-2go-privacy');
    Route::redirect('/iproc-2go/privacy-policy', '/id/iproc-2go/kebijakan-privasi', 301);
    Route::redirect('/iproc-2go/kebijakan-privasi.html', '/id/iproc-2go/kebijakan-privasi', 301);
});

Route::any('/api/trello_card.php', TrelloLeadController::class)
    ->withoutMiddleware([ValidateCsrfToken::class]);
