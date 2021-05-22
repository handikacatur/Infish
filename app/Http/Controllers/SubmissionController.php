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
        $partnerUser = $newGetPartner->id;

        $listData = \DB::table('submissions')
        ->select('submissions.amount', 'submissions.description', 'submission_statuses.name', 'submissions.created_at')
        ->join('submission_statuses', 'submissions.status_submission', '=', 'submission_statuses.id')
        ->where('submissions.partner_id', $partnerUser)
        ->whereNull('submissions.deleted_at')
        ->get();

        return view('partner.submission', ['listData' => $listData]);
    }

    public function save(Request $request)
    {
        $user = \Auth::user()->id;
        $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
        $partnerUser = $newGetPartner->id;

        $request->validate([
            'amount' => 'required | numeric',
            'description' => 'required'
        ]);

        $submission = new Submission();
        $submission->partner_id = $partnerUser;
        $submission->amount = $request->amount;
        $submission->description = $request->description;
        $submission->status_submission = 2;
        $submission->save();

        return redirect('submission');
    }
}
