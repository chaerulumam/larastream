<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['package', 'user'])->get();
        // dd($data);
        return view('admin.movies.transactions', [
            'transactions' => $transactions
        ]);
    }
}
