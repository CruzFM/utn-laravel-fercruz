@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-center">
                    @if (isset($transactions) && $transactions->isNotEmpty() )
                    <h2>Total balance: {{ $balance }}</h2>
                    @else
                    <div>No transactions yet.</div>
                    @endif
                </div>
                <div class="d-flex justify-content-around mt-1">

                        <div class="card p-3">
                            <h3>Incomes</h3>
                            @if (isset($transactions) && $transactions->isNotEmpty() )
                            <div>{{$total_income}}</div>
                            @else
                            <div>No incomes added.</div>
                            @endif
                            <a href="{{ route('incomes.index') }}" >List of incomes</a>
                        </div>
                        <div class="card p-3">
                        <h3>Spending</h3>
                            @if (isset($transactions) && $transactions->isNotEmpty() )
                            <div>{{$total_spending}}</div>
                            @else
                            <div>No Spending added.</div>
                            @endif
                            <a href="{{ route('spendings.index') }}">List of Spendings</a>
                        </div>
                </div>
                <div class="p-2 mt-2">
                    <h2 class="text-center">Add a new transaction</h2>
                    <form method="POST" action="{{ route('transactions.store') }}" class="">
                        @csrf
                        <div class="form-group">
                            <label for="transaction_type" >Transaction Type:</label>
                            <select name="transaction_type" class="form-control">
                                <option value="income">Income</option>
                                <option value="saving">Saving</option>
                                <option value="spending">Spending</option>
                            </select>
                        </div>
                        <div>
                            <label for="amount" id="amount">Amount:</label>
                            <input type="number" name="amount" id="amount" class="form-control"></input>
                        </div>
                        <div>
                            <label for="description" id="description">Description:</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="my-1 btn btn-primary">Add Transaction</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection