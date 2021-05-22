<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Fish;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index()
    {
        $dataPartner = \DB::table('partner_profiles')
        ->select('partners.id', 'partner_profiles.company_name')
        ->join('partners', 'partner_profiles.partner_id', '=', 'partners.id')
        ->get();
        $dataFish = Fish::all();
        $listData = \DB::table('transactions')
        ->select('transactions.id', 'partner_profiles.company_name', 'fishes.name', 'transactions.weight', 'transactions.amount')
        ->join('partners', 'transactions.partner_id', '=', 'partners.id')
        ->join('partner_profiles', 'partners.id', '=', 'partner_profiles.partner_id')
        ->join('fishes', 'transactions.partner_fish_id', '=', 'fishes.id')
        ->get();
        return view('admin.transaction-detail', ['dataFish' => $dataFish, 'dataPartner' => $dataPartner, 'listData' => $listData]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'weight' => 'required',
            'amount' => 'required'
        ]);

        $transaction = new Transaction();
        $transaction->partner_id = $request->partner;
        $transaction->partner_fish_id = $request->fish;
        $transaction->weight = $request->weight;
        $transaction->amount = $request->amount;
        $transaction->save();

        return redirect('transaction');
    }
}
