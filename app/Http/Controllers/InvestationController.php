<?php

namespace App\Http\Controllers;

use App\Models\Investation;
use App\Models\Partner;
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

    public function detail(Partner $detail)
    {
        $partnerUser = $detail->id;

        $getPartner = \DB::table('partners')
        ->select('partners.id', 'partners.roi', 'partners.lot', 'partners.lot_price', 'users.name', 'partner_profiles.company_name', 'partner_profiles.address', 'partner_profiles.phone_number', 'partner_profiles.alternate_number', 'partner_profiles.cultivation', 'partner_profiles.wide', 'partner_profiles.amount_of_production', 'partner_profiles.production_value', 'partner_profiles.npwp', 'partner_profiles.siup', 'partner_profiles.description', 'partner_profiles.image')
        ->join('users', 'partners.user_id', '=', 'users.id')
        ->join('partner_profiles', 'partner_profiles.partner_id', '=', 'partners.id')
        ->whereNull('partners.deleted_at')
        ->where('partners.id', '=', $partnerUser)
        ->first();

        $getFish = \DB::table('partner_fishes')
        ->select('fishes.name')
        ->join('fishes', 'partner_fishes.fish_id', '=', 'fishes.id')
        ->whereNull('partner_fishes.deleted_at')
        ->where('partner_fishes.partner_id', '=', $partnerUser)
        ->get();

        return view('investor.invest-detail', ['getPartner' => $getPartner, 'getFish' => $getFish]);
    }

    public function investCheck(Partner $check)
    {
        $partnerUser = $check->id;

        $getPartner = \DB::table('partners')
        ->select('partners.id', 'partners.roi', 'partners.lot', 'partners.lot_price', 'partner_profiles.company_name')
        ->join('partner_profiles', 'partner_profiles.partner_id', '=', 'partners.id')
        ->whereNull('partners.deleted_at')
        ->where('partners.id', '=', $partnerUser)
        ->first();

        return view('investor.invest-check', ['getPartner' => $getPartner]);
    }

    public function invest(Partner $invest, Request $request)
    {
        $request->validate([
            'req_lot' => 'required',
            'transfer_number' => 'required',
            'image' => 'required'
        ]);

        $date = date('H-i-s');
        $random = \Str::random(5);

        if($request->file('image'))
        {
            $request->file('image')->move('images/upload/investProof', $random.$date.$request->file('image')->getClientOriginalName());

            $investation = new Investation();
            $investation->user_id = \Auth::user()->id;
            $investation->partner_id = $invest->id;
            $investation->bank_target_id = 6;
            $investation->bank_sender_id = $request->sender;
            $investation->transfer_number = $request->transfer_number;
            $investation->amount = (int)$invest->lot_price * (int)$request->req_lot;
            $investation->note = 'lorem ipsum dolor sit amet.';
            $investation->invest_status_id = 2;
            $investation->proof = $random.$date.$request->file('image')->getClientOriginalName();
            $investation->save();
        } else {
            return redirect('invest-partner');
        }
        return redirect('invest-partner');
    }

    public function transaction()
    {
        $getInvest = \DB::table('invests')
        ->select('partner_profiles.company_name', 'partner_profiles.cultivation', 'invests.amount', 'invest_statuses.name', 'invests.created_at')
        ->join('partners', 'invests.partner_id', '=', 'partners.id')
        ->join('partner_profiles', 'partners.id', '=', 'partner_profiles.partner_id')
        ->join('invest_statuses', 'invests.invest_status_id', '=', 'invest_statuses.id')
        ->whereNull('invests.deleted_at')
        ->where('invests.user_id', '=', \Auth::user()->id)
        ->get();

        return view('investor.invest-transaction', ['getInvest' => $getInvest]);
    }
}