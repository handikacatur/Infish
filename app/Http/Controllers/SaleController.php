<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:partner']);
    }

    public function index()
    {
        $newGetPartner = \DB::table('partners')->where('user_id', '=', \Auth::user()->id)->whereNull('deleted_at')->first();
        $partnerUser = $newGetPartner->id;
        $listData = \DB::table('transactions')
        ->select('fishes.name', 'transactions.weight', 'transactions.amount', 'transactions.created_at')
        ->join('fishes', 'transactions.partner_fish_id', '=', 'fishes.id')
        ->where('transactions.partner_id', '=', $partnerUser)
        ->whereNull('transactions.deleted_at')
        ->get();
        return view('partner.sale', ['listData' => $listData]);
    }
}
