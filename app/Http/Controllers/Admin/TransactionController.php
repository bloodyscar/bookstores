<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        
        $transaction = Transaction::get();
        
        
        return view('pages.admin.transaction.index', [
            'transactions' => $transaction
        ]);
    }

    public function edit(Transaction $transaction){
        return view('pages.admin.transaction.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction){
        $requests = $request->validate([
            'status' => 'required|string|in:PENDING,SUCCESS,CANCEL,FAILED',
        ]);

        $transaction->update($requests);

        return redirect()->route('transaction');
    }
}
