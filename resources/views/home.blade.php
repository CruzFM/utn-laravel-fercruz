@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div>
                    @if (isset($transactions) && $transactions->isNotEmpty() )
                    <div>Total balance: {{ $balance }}</div>
                    @else
                    <div>Te falta cancha, pibe.</div>
                    @endif
                </div>
                <div>
                    <form method="POST" action="{{ route('transactions.store') }}">
                        @csrf
                        <div>
                            <label for="transaction_type">Transaction Type:</label>
                            <select name="transaction_type">
                                <option value="income">Income</option>
                                <option value="saving">Saving</option>
                                <option value="spending">Spending</option>
                            </select>
                        </div>
                        <div>
                            <label for="amount" id="amount">Amount:</label>
                            <input type="number" name="amount" id="amount"></input>
                        </div>
                        <div>
                            <label for="description" id="description">Description:</label>
                            <textarea name="description"></textarea>
                        </div>
                        <button type="submit">Add Transaction</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection