@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Spendings</h1>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spendings as $spending)
                    <tr>
                        <td>{{ $spending->created_at->format('d-m-Y') }}</td>
                        <td>{{ $spending->amount }}</td>
                        <td>{{ $spending->description }}</td>
                        <td>
                            <form action="{{ route('transactions.destroy', $spending->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection