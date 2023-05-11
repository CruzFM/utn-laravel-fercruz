<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $transactions = Transactions::where('user_id',$user_id)->get();
        $total_income = $transactions->where('transaction_type', 'income')->sum('amount');
        $total_spending = $transactions->where('transaction_type', 'spending')->sum('amount');
        $balance = $total_income - $total_spending;

        return view('home', compact('transactions', 'balance', 'total_income', 'total_spending'));
    }
}
