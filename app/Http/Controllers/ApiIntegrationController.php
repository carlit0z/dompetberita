<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiIntegrationController extends Controller
{
    // Konsumsi API Suarane - Artikel
    public function getArticles()
    {
        $client = new Client();

        $apiUrl = 'http://127.0.0.1:8001/api/articles';
        $response = $client->request('GET', $apiUrl);
        $articles = json_decode($response->getBody()->getContents());

        if ($response->getStatusCode() == 200) {
            return view('articles.index', [
                'articles' => $articles
            ]);
        }
    }

    public function showArticle($articleId)
    {
        $client = new Client();

        $apiUrl = "http://localhost:8001/api/articles/{$articleId}";
        $response = $client->request('GET', $apiUrl);
        $articles = json_decode($response->getBody()->getContents());

        if ($response->getStatusCode() == 200) {
            return view('articles.show', compact('articles'));
        }
    }

    public function createArticle(Request $request)
    {
        $client = new Client();

        $apiUrl = "http://localhost:8001/api/articles";
        $response = $client->request('POST', $apiUrl, [
            'form_params' => [
                'title' => $request->title,
                'contents' => $request->contents,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
            ]
        ]);

        if ($response->getStatusCode() == 201) {
            return redirect()->route('articles.index')->with('success', 'Article created successfully.');
        }
    }

    public function updateArticle(Request $request, $articleId)
    {
        $client = new Client();

        $apiUrl = "http://localhost:8001/api/articles/$articleId";
        $response = $client->request('POST', $apiUrl, [
            'form_params' => [
                'title' => $request->title,
                'contents' => $request->contents,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
        }
    }

    public function deleteArticle($articleId)
    {
        $client = new Client();

        $apiUrl = "http://localhost:8001/api/articles/$articleId";
        $response = $client->request('DELETE', $apiUrl);

        if ($response->getStatusCode() == 200) {
            return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
        }
    }

    // Konsumsi API SaldoPlus - BankAccount dan Transactions
    public function getBankAccounts($userId)
    {
        // $response = Http::get("http://localhost:8000/users/{$userId}/bank-accounts");

        // if ($response->successful()) {
        //     $bankAccounts = $response->json();
        //     return view('bank_accounts.index', compact('bankAccounts'));
        // } else {
        //     return back()->with('error', 'Failed to fetch bank accounts');
        // }
        $client = new Client();

        $apiUrl = "http://127.0.0.1:8000/api/users/{$userId}/bank-accounts";
        $response = $client->request('GET', $apiUrl);
        $bankAccounts = json_decode($response->getBody()->getContents());

        if ($response->getStatusCode() == 200) {
            return view('bank_accounts.index', compact('bankAccounts'));
        }
    }

    public function showBankAccount($id)
    {
        $client = new Client();

        $apiUrl = "http://127.0.0.1:8000/api/bank-accounts/{$id}";
        $response = $client->request('GET', $apiUrl);
        $bankAccounts = json_decode($response->getBody()->getContents());

        if ($response->getStatusCode() == 200) {
            return view('bank_accounts.show', compact('bankAccounts'));
        }
    }


    public function getTransactions($accountId)
    {
        $response = Http::get("http://localhost:8000/api/bank-accounts/{$accountId}/transactions");

        if ($response->successful()) {
            $transactions = $response->json();
            return view('transactions.index', compact('transactions'));
        } else {
            return back()->with('error', 'Failed to fetch transactions');
        }
    }

    public function createBankAccount(Request $request, $userId)
    {
        $response = Http::post("http://localhost:8000/api/users/{$userId}/bank-accounts", [
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'balance' => $request->balance,
            'currency' => $request->currency,
        ]);

        if ($response->successful()) {
            return redirect()->route('bank_accounts.index', $userId)->with('success', 'Bank account created successfully.');
        } else {
            return back()->with('error', 'Failed to create bank account');
        }
    }

    public function createTransaction(Request $request, $accountId)
    {
        $response = Http::post("http://localhost:8000/api/bank-accounts/{$accountId}/transactions", [
            'transaction_date' => $request->transaction_date,
            'amount' => $request->amount,
            'description' => $request->description,
            'category' => $request->category,
            'transaction_type' => $request->transaction_type,
            'currency' => $request->currency,
        ]);

        if ($response->successful()) {
            return redirect()->route('transactions.index', $accountId)->with('success', 'Transaction created successfully.');
        } else {
            return back()->with('error', 'Failed to create transaction');
        }
    }
}
