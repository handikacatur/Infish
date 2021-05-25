<?php

namespace App\Http\Controllers;

use App\Models\Investation;
use Illuminate\Http\Request;

class InvestationController extends Controller
{
    public function __construct()
    {        
        $this->middleware(['role:investor']);
    }

    public function index()
    {
        $listData = \DB::table('partners')
        ->select('partners.id', 'partners.roi', 'partners.lot_price', 'partners.lot', 'partner_profiles.company_name', 'partner_profiles.description', 'partner_profiles.image', 'partner_profiles.cultivation')
        ->join('partner_profiles', 'partner_profiles.partner_id', '=', 'partners.id')
        ->whereNull('partners.deleted_at')
        ->get();
        return view('investor.invest-partner', ['listData' => $listData]);
    }
}
