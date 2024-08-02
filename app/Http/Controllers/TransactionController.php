<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
  public function index()
  {
    $transactions = Transaction::where('user_id', auth()->user()->id)->get();

    return view('transaction', compact('transactions'));
  }

  public function create(Request $request)
  {

    $validation = $request->validate([
      'item_id' => 'required',
    ], [
      'item_id.required' => 'Item is required',
    ]);

    $transaction = Transaction::create([
      'user_id' => auth()->user()->id,
      'item_id' => $request->item_id,
    ]);


    return redirect()->route('home', compact('transaction'))->with('success', 'Transaction created successfully');
  }

  public function delete($id)
  {
    $transaction = Transaction::find($id);

    $transaction->delete();

    return redirect()->route('home')->with('success', 'Transaction deleted successfully');
  }
}
