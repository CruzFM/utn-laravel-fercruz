@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Incomes</h1>
        <table>
            <thead>
                <tr class="p-3">
                    <th class="p-2">Date</th>
                    <th class="p-2">Amount</th>
                    <th class="p-2">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incomes as $income)
                    <tr class="border border-primary p-3">
                        <td class="border border-primary p-2">{{ $income->created_at->format('d-m-Y') }}</td>
                        <td class="border border-primary p-2">{{ $income->amount }}</td>
                        <td class="border border-primary p-2">{{ $income->description }}</td>
                        <td class="p-2">
                        <form action="{{ route('transactions.destroy', $income->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Transaction</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection