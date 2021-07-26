<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Book $book, User $user, Transaction $transaction)
    {

        return view('pages.admin.dashboard', [
            'book' => $book,
            'user' => $user,
            'transaction' => $transaction,
            'transaction_pending' => Transaction::where('status', 'PENDING')->count(),
        ]);
    }
}
