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
        $transactions = Transaction::where('user_id','=' , auth()->user()->id)->with('category')->with('account')->get();

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
        $this->validate(request(), [
            'category' => 'required',
            'date' => 'required',
            'amount' => 'required',
            'account' => 'required',
        ]);
        $transaction = new Transaction();
        $transaction->date = $request->date;
        $transaction->description = $request->description;
        $transaction->category_id = $request->category;
        $transaction->amount = $request->amount;
        $transaction->account_id = $request->account;
        $transaction->transaction_type = $request->transaction_type;
        $transaction->user_id = auth()->user()->id;
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
        $this->validate(request(), [
            'cate' => 'required',
            'date' => 'required',
            'amount' => 'required',
            'account' => 'required',
        ]);
        $transaction = Transaction::find($id);
        $transaction->date = $request->date;
        $transaction->description = $request->description;
        $transaction->category_id = $request->category;
        $transaction->amount = $request->amount;
        $transaction->account_id = $request->account;
        $transaction->transaction_type = $request->transaction_type;
        $transaction->user_id = auth()->user()->id;
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
