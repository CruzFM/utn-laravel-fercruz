<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'transaction_type' => 'required',
            'amount' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $transaction = new Transactions;
        $transaction->user_id = auth()->user()->id;
        $transaction->transaction_type = $request->transaction_type;
        $transaction->amount = $request->amount;
        $transaction->description = $request->description;
        $transaction->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $income = Transactions::findOrFail($id);
        $income->delete();

        return redirect()->route('incomes.index')->with('successs', 'Income delete successfully!');
    }

    public function incomes()
    {
        $user_id = auth()->user()->id;
        $incomes = Transactions::where('user_id', $user_id)->where('transaction_type', 'income')->get();
        return view('incomes.index', compact('incomes'));
    }

    public function spendings()
    {
        $user_id = auth()->user()->id;
        $spendings = Transactions::where('user_id', $user_id)->where('transaction_type', 'spending')->get();
        return view('spendings.index', compact('spendings'));
    }
}
