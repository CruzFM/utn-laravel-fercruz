@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Incomes</h1>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incomes as $income)
                    <tr>
                        <td>{{ $income->created_at->format('d-m-Y') }}</td>
                        <td>{{ $income->amount }}</td>
                        <td>{{ $income->description }}</td>
                        <td>
                        <form action="{{ route('transactions.destroy', $income->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete Transaction</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection