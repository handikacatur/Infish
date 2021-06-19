<?php

namespace App\Http\Controllers;

use App\Models\DepositPartner;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DepositPartnerController extends Controller
{
    public function index()
    {
        try {
            $user = \Auth::user()->id;
            $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
            $partnerUser = $newGetPartner->id;
    
            $listData = \DB::table('partner_deposits')
            ->select('partner_deposits.*', 'partner_deposit_statuses.name')
            ->join('partner_deposit_statuses', 'partner_deposits.status_partner_deposit_id', 'partner_deposit_statuses.id')
            ->where('partner_deposits.partner_id', $partnerUser)
            ->whereNull('partner_deposits.deleted_at')
            ->paginate(5);
    
            $getSumInvest = \DB::table('invests')
            ->where('partner_id', $partnerUser)
            ->where('invest_status_id', 1)
            ->whereNull('deleted_at')
            ->sum('amount');
    
            $getSubmissionDone = \DB::table('submissions')
            ->where('partner_id', $partnerUser)
            ->where('status_submission', 1)
            ->whereNull('deleted_at')
            ->sum('amount');
    
            $getDepositThisMonth = \DB::table('partner_deposits')
            ->select('partner_deposits.*', 'partner_deposit_statuses.name')
            ->join('partner_deposit_statuses', 'partner_deposits.status_partner_deposit_id', 'partner_deposit_statuses.id')
            ->where('partner_id', $partnerUser)
            ->whereMonth('partner_deposits.created_at', Carbon::now()->month)
            ->whereNull('partner_deposits.deleted_at')
            ->first();
    
            $sumInvestback = ($getSumInvest * $newGetPartner->roi / 100) + $getSumInvest;
            $sumInvestMonth = (($getSumInvest * $newGetPartner->roi / 100) + $getSumInvest) / 12;
    
            return view('partner.deposit-partner', ['listData' => $listData, 'sumInvest' => $getSumInvest, 'sumInvestBack' => $sumInvestback, 'sumInvestMonth' => $sumInvestMonth, 'sumSubmissionDone' => $getSubmissionDone, 'getDepositThisMonth' => $getDepositThisMonth]);
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }

    public function save(Request $request)
    {
        try {
            $request->validate([
                'sender' => 'required',
                'transfer_number' => 'required',
                'amount' => 'required',
                'proof' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ]);
    
            $date = date('H-i-s');
            $random = \Str::random(5);
            
            if($request->file('proof'))
            {
                $request->file('proof')->move('images/upload/depositProof', $random.$date.$request->file('proof')->getClientOriginalName());
                $user = \Auth::user()->id;
                $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
                $partnerUser = $newGetPartner->id;
    
                $depositPartner = new DepositPartner();
                $depositPartner->partner_id = $partnerUser;
                $depositPartner->bank_target_id = 3;
                $depositPartner->bank_sender_id = $request->sender;
                $depositPartner->transfer_number = $request->transfer_number;
                $depositPartner->amount = $request->amount;
                $depositPartner->proof = $random.$date.$request->file('proof')->getClientOriginalName();
                $depositPartner->status_partner_deposit_id = 2;
                $depositPartner->save();
            }
            return redirect('deposit-partner')->with('depositSuccess', 'Berhasil Melakukan Setoran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }
}
