<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use App\Models\Partner;
use App\Models\Progress;
use App\Models\Submission;

use Illuminate\Http\Request;

class ConfirmController extends Controller
{    
    public function __construct()
    {        
        $this->middleware(['role:admin']);
    }

    public function confirmPartner(){
        $getPartner = \DB::table('partners')
        ->select('partners.id', 'partner_profiles.company_name', 'partner_profiles.cultivation', 'partner_profiles.npwp', 'partner_profiles.siup', 'partner_statuses.name')
        ->join('partner_profiles', 'partner_profiles.partner_id', '=', 'partners.id')
        ->join('partner_statuses', 'partners.status_partner_id', '=', 'partner_statuses.id')
        ->whereNull('partners.deleted_at')
        ->where('partners.status_partner_id', '!=', 1)
        ->get();
        
        return view('admin.confirm-partner', ['listPartner' => $getPartner]);
    }  

    public function confirmProgress(){
        $getProgress = \DB::table('progress')
        ->select('progress.id', 'partner_profiles.company_name', 'progress.description', 'progress_statuses.name')
        ->join('partners', 'progress.partner_id', '=', 'partners.id')
        ->join('partner_profiles', 'partner_profiles.partner_id', '=', 'partners.id')
        ->join('progress_statuses', 'progress_statuses.id', '=', 'progress.progress_statuses')
        ->whereNull('progress.deleted_at')
        ->where('progress.progress_statuses', '!=', 1)
        ->get();
        
        return view('admin.confirm-progress', ['listProgress' => $getProgress]);
    }

    public function confirmSubmission(){
        $getSubmission = \DB::table('submissions')
        ->select('submissions.id', 'partner_profiles.company_name', 'submissions.amount', 'submissions.description', 'submission_statuses.name')
        ->join('partner_profiles', 'submissions.partner_id', '=', 'partner_profiles.partner_id')
        ->join('submission_statuses', 'submissions.status_submission', '=', 'submission_statuses.id')
        ->whereNull('submissions.deleted_at')
        ->where('submissions.status_submission', '=', 2)
        ->get();
        
        return view('admin.confirm-submission', ['listSubmission' => $getSubmission]);
    }

    public function actionPartner(Partner $partner){
        $dataCompany = \DB::table('partner_profiles')->where('partner_id', '=', $partner->id)->whereNull('deleted_at')->first();
        $dataFish = Fish::all();
        $dataStatus = \DB::table('partner_statuses')->get();

        return view('admin.confirm-partner-detail', ['dataFish' => $dataFish, 'dataCompany' => $dataCompany, 'dataPartner' => $partner, 'dataStatus' => $dataStatus]);
    }

    public function actionProgress(Progress $progress){
        $dataCompany = \DB::table('partner_profiles')->where('partner_id', '=', $progress->partner_id)->whereNull('deleted_at')->first();
        $dataStatus = \DB::table('progress_statuses')->get();

        return view('admin.confirm-progress-detail', ['dataCompany' => $dataCompany, 'dataProgress' => $progress, 'dataStatus' => $dataStatus]);
    }

    public function actionSubmission(Submission $submission){
        $dataCompany = \DB::table('partner_profiles')->where('partner_id', '=', $submission->partner_id)->whereNull('deleted_at')->first();
        $dataStatus = \DB::table('submission_statuses')->get();

        return view('admin.confirm-submission-detail', ['dataCompany' => $dataCompany, 'dataSubmission' => $submission, 'dataStatus' => $dataStatus]);
    }

    public function patchPartner(Partner $partner, Request $request){
        $request->validate([
            'lot' => 'required|numeric',
            'lot_price' => 'required|numeric',
            'roi' => 'required|numeric'
        ]);

        Partner::where('id', $partner->id)->update([
            'lot' => $request->lot,
            'lot_price' => $request->lot_price,
            'roi' => $request->roi,
            'status_partner_id' => $request->status
        ]);

        return redirect('confirm-partner');
    }

    public function patchProgress(Progress $progress, Request $request){
        $request->validate([
            'description' => 'required',
        ]);

        Progress::where('id', $progress->id)->update([
            'description' => $request->description,
            'progress_statuses' => $request->status
        ]);

        return redirect('confirm-progress');
    }

    public function patchSubmission(Submission $submission, Request $request){
        $request->validate([
            'description' => 'required',
            'amount' => 'required'
        ]);

        Submission::where('id', $submission->id)->update([
            'description' => $request->description,
            'amount' => $request->amount,
            'status_submission' => $request->status
        ]);

        return redirect('confirm-submission');
    }
}
