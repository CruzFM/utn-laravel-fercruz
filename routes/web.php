<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Models\Transactions;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/incomes', [TransactionController::class, 'incomes'])->name('incomes.index');
Route::get('/spendings', [TransactionController::class, 'spendings'])->name('spendings.index');
// Route::delete('/incomes/{id}', [TransactionController::class, 'destroy'])->name('incomes.destroy');
Route::delete('/transactions/{id}', function ($id) {
    $transaction = Transactions::findOrFail($id);
    if ($transaction->transaction_type == 'income') {
        $transaction->delete();
        return redirect()->route('incomes.index')->with('success', 'Income deleted successfully.');
    } elseif ($transaction->transaction_type == 'spending') {
        $transaction->delete();
        return redirect()->route('spendings.index')->with('success', 'Spending deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Invalid transaction type.');
    }
})->name('transactions.destroy');