<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with('category')->with('account')->get();

        return response()->json($transactions);
    }

    public function transactionType($id) {
        $categories = Transaction::where('transaction_type','=',$id)->with('category')->with('account')->get();
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->name = $request->name;
        $transaction->date = $request->date;
        $transaction->amount = $request->amount;
        $transaction->category_id = $request->category;
        $transaction->account_id = $request->account;
        $transaction->transaction_type = $request->transaction_type;
        $transaction->description = $request->description;
        $transaction->save();
        return response()->json($transaction);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);
        return response()->json($transaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->name = $request->name;
        $transaction->date = $request->date;
        $transaction->amount = $request->amount;
        $transaction->category_id = $request->category;
        $transaction->account_id = $request->account;
        $transaction->transaction_type = $request->transaction_type;
        $transaction->description = $request->description;
        $transaction->save();
        return response()->json($transaction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        return response()->json(['success' => $transaction->delete()]);
    }
}