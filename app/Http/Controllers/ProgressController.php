<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:partner']);
    }

    public function index()
    {
        try {
            $user = \Auth::user()->id;
            $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
            $partnerUser = $newGetPartner->id;

            $listData = \DB::table('progress')
            ->select('progress.description', 'progress_statuses.name', 'progress.created_at', 'progress.proof_physic', 'progress.proof_purchase')
            ->join('progress_statuses', 'progress.progress_statuses', '=', 'progress_statuses.id')
            ->where('progress.partner_id', $partnerUser)
            ->whereNull('progress.deleted_at')
            ->paginate(5);

            return view('partner.progress', ['listData' => $listData]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }

    public function save(Request $request)
    {
        try {
            $user = \Auth::user()->id;
            $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
            $partnerUser = $newGetPartner->id;
    
            $date = date('H-i-s');
            $random = \Str::random(5);
    
            $request->validate([
                'description' => 'required'
            ]);
    
            if(empty($request->file('proof_physic')) || empty($request->file('proof_purchase'))){
                return redirect('progress')->with('progressFailed', 'Mohon Isi Bukti Fisik atau Bukti Pembelian');
            } else {
                $progress = new Progress();
                $progress->partner_id = $partnerUser;
                $progress->description = $request->description;
    
                if($request->file('proof_physic'))
                {
                    $request->file('proof_physic')->move('images/upload/progress/proofPhysic', $random.$date.$request->file('proof_physic')->getClientOriginalName());
                    $progress->proof_physic = $random.$date.$request->file('proof_physic')->getClientOriginalName();
                }
    
                if($request->file('proof_purchase'))
                {
                    $request->file('proof_purchase')->move('images/upload/progress/proofPurchase', $random.$date.$request->file('proof_purchase')->getClientOriginalName());
                    $progress->proof_purchase = $random.$date.$request->file('proof_purchase')->getClientOriginalName();
                }
    
                $progress->progress_statuses = 2;
                $progress->save();
            }
            return redirect('progress')->with('progressSuccess', 'Berhasil Menambahkan Penjualan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }
}
