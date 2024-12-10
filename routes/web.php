<?php

use App\Http\Controllers\ApiIntegrationController;
use Illuminate\Support\Facades\Route;

Route::get('/articles', [ApiIntegrationController::class, 'getArticles'])->name('articles.index');
Route::get('/articles/{articleId}', [ApiIntegrationController::class, 'showArticle'])->name('articles.show');
Route::post('/articles', [ApiIntegrationController::class, 'createArticle'])->name('articles.store');
Route::post('/articles/{articleId}', [ApiIntegrationController::class, 'updateArticle'])->name('articles.update');
Route::delete('/articles/{articleId}', [ApiIntegrationController::class, 'deleteArticle'])->name('articles.delete');

Route::get('/users/{userId}/bank-accounts', [ApiIntegrationController::class, 'getBankAccounts'])->name('bank-accounts.index');
Route::get('/bank-accounts/{accountId}', [ApiIntegrationController::class, 'showBankAccount'])->name('bank-accounts.show');
Route::post('/users/{userId}/bank-accounts', [ApiIntegrationController::class, 'createBankAccount'])->name('bank-accounts.create');
Route::post('/bank-accounts/{accountId}', [ApiIntegrationController::class, 'updateBankAccount'])->name('bank-accounts.update');
Route::delete('/bank-accounts/{accountId}', [ApiIntegrationController::class, 'deleteBankAccount'])->name('bank-accounts.delete');
Route::get('/bank-accounts/{accountId}/transactions', [ApiIntegrationController::class, 'getTransactions']);
Route::post('/bank-accounts/{accountId}/transactions', [ApiIntegrationController::class, 'createTransaction'])->name('transactions.index');



