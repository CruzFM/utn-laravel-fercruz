@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Spendings</h1>
        <table>
            <thead>
                <tr class="p-3">
                    <th class="p-2">Date</th>
                    <th class="p-2">Amount</th>
                    <th class="p-2">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spendings as $spending)
                    <tr class="border border-danger p-3">
                        <td class="border border-danger p-2">{{ $spending->created_at->format('d-m-Y') }}</td>
                        <td class="border border-danger p-2">{{ $spending->amount }}</td>
                        <td class="border border-danger p-2">{{ $spending->description }}</td>
                        <td class="p-2">
                            <form action="{{ route('transactions.destroy', $spending->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection