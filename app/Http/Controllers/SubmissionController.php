<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:partner']);
    }

    public function index()
    {
        $user = \Auth::user()->id;
        $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
        try {
            if ($newGetPartner != NULL) {
                $partnerUser = $newGetPartner->id;
                
                if($newGetPartner->lot_first != NULL)
                {
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
            
                    $sumInvestback = ($getSumInvest * $newGetPartner->roi / 100) + $getSumInvest;
                    $sumInvestMonth = (($getSumInvest * $newGetPartner->roi / 100) + $getSumInvest) / 12;
                } else {
                    $getSumInvest = 0;
                    $getSubmissionDone = 0;
                    $sumInvestback = 0;
                    $sumInvestMonth = 0;
                }
        
                $listData = \DB::table('submissions')
                ->select('submissions.amount', 'submissions.description', 'submission_statuses.name', 'submissions.created_at')
                ->join('submission_statuses', 'submissions.status_submission', '=', 'submission_statuses.id')
                ->where('submissions.partner_id', $partnerUser)
                ->whereNull('submissions.deleted_at')
                ->paginate(5);
        
                return view('partner.submission', ['listData' => $listData, 'sumInvest' => $getSumInvest, 'sumInvestBack' => $sumInvestback, 'sumInvestMonth' => $sumInvestMonth, 'sumSubmissionDone' => $getSubmissionDone, 'statusPartner' => $newGetPartner]);
            } else {
                return redirect('dashboard');
            }

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }

    public function save(Request $request)
    {
        $request->validate([
            'amount' => 'required | numeric',
            'description' => 'required'
        ]);
        try {
            $user = \Auth::user()->id;
            $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
            $partnerUser = $newGetPartner->id;
    
    
            $submission = new Submission();
            $submission->partner_id = $partnerUser;
            $submission->amount = $request->amount;
            $submission->description = $request->description;
            $submission->status_submission = 2;
            $submission->save();
    
            return redirect('submission')->with('submissionSuccess', 'Berhasil Melakukan Pengajuan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }
}
