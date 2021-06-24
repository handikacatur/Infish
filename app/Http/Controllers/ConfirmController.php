<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use App\Models\Partner;
use App\Models\Progress;
use App\Models\Submission;
use App\Models\Investation;
use App\Models\DepositPartner;

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
        /* ->where('partners.status_partner_id', '!=', 1) */
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
        /* ->where('progress.progress_statuses', '!=', 1) */
        ->get();
        
        return view('admin.confirm-progress', ['listProgress' => $getProgress]);
    }

    public function confirmSubmission(){
        $getSubmission = \DB::table('submissions')
        ->select('submissions.id', 'partner_profiles.company_name', 'submissions.amount', 'submissions.description', 'submission_statuses.name')
        ->join('partner_profiles', 'submissions.partner_id', '=', 'partner_profiles.partner_id')
        ->join('submission_statuses', 'submissions.status_submission', '=', 'submission_statuses.id')
        ->whereNull('submissions.deleted_at')
        /* ->where('submissions.status_submission', '=', 2) */
        ->get();
        
        return view('admin.confirm-submission', ['listSubmission' => $getSubmission]);
    }

    public function confirmDeposit()
    {
        $getDeposit = \DB::table('partner_deposits')
        ->select('partner_deposits.id', 'partner_profiles.company_name', 'partner_deposits.transfer_number', 'partner_deposits.amount', 'partner_deposits.proof', 'partner_deposit_statuses.name as status')
        ->join('partner_profiles', 'partner_deposits.partner_id', '=', 'partner_profiles.partner_id')
        ->join('partner_deposit_statuses', 'partner_deposits.status_partner_deposit_id', '=', 'partner_deposit_statuses.id')
        ->whereNull('partner_deposits.deleted_at')
        ->get();
        
        return view('admin.confirm-deposit', ['listDeposit' => $getDeposit]);
    }

    public function confirmInvest(){
        $getInvest = \DB::table('invests')
        ->select('invests.id', 'users.name', 'partner_profiles.company_name', 'invests.amount', 'invests.proof', 'invest_statuses.name as status')
        ->join('users', 'invests.user_id', 'users.id')
        ->join('partners', 'invests.partner_id', 'partners.id')
        ->join('partner_profiles', 'partner_profiles.partner_id', 'partners.id')
        ->join('invest_statuses', 'invests.invest_status_id', 'invest_statuses.id')
        ->get();

        return view('admin.confirm-invest', ['listInvest' => $getInvest]);
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

    public function actionDeposit(DepositPartner $deposit){
        $dataCompany = \DB::table('partner_profiles')->where('partner_id', '=', $deposit->partner_id)->whereNull('deleted_at')->first();
        $dataStatus = \DB::table('partner_deposit_statuses')->get();

        return view('admin.confirm-deposit-detail', ['dataCompany' => $dataCompany, 'dataDeposit' => $deposit, 'dataStatus' => $dataStatus]);
    }

    public function actionInvest(Investation $invest)
    {
        $dataStatus = \DB::table('invest_statuses')->get();
        $dataInvest = \DB::table('invests')
        ->select('invests.id', 'users.name', 'partner_profiles.company_name', 'invests.amount', 'invests.proof', 'invests.invest_status_id')
        ->join('users', 'invests.user_id', 'users.id')
        ->join('partners', 'invests.partner_id', 'partners.id')
        ->join('partner_profiles', 'partner_profiles.partner_id', 'partners.id')
        ->join('invest_statuses', 'invests.invest_status_id', 'invest_statuses.id')
        ->where('invests.id', $invest->id)
        ->first();

        return view('admin.confirm-invest-detail', ['dataInvest' => $dataInvest, 'dataStatus' => $dataStatus]);
    }

    public function patchPartner(Partner $partner, Request $request){
        $request->validate([
            'lot' => 'required|numeric',
            'lot_price' => 'required|numeric',
            'roi' => 'required|numeric'
        ]);

        Partner::where('id', $partner->id)->update([
            'lot' => $request->lot,
            'lot_first' => $request->lot,
            'lot_price' => $request->lot_price,
            'roi' => $request->roi,
            'status_partner_id' => $request->status
        ]);

        return redirect('confirm-partner')->with('success', 'Berhasil Melakukan Konfirmasi');
    }

    public function patchProgress(Progress $progress, Request $request){
        $request->validate([
            'description' => 'required',
        ]);

        Progress::where('id', $progress->id)->update([
            'description' => $request->description,
            'progress_statuses' => $request->status
        ]);

        return redirect('confirm-progress')->with('success', 'Berhasil Melakukan Konfirmasi');
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

        return redirect('confirm-submission')->with('success', 'Berhasil Melakukan Konfirmasi');
    }

    public function patchDeposit(DepositPartner $deposit, Request $request){
        DepositPartner::where('id', $deposit->id)->update([
            'status_partner_deposit_id' => $request->status
        ]);

        return redirect('confirm-invest')->with('success', 'Berhasil Melakukan Konfirmasi');
    }

    public function patchInvest(Investation $invest, Request $request){
        Investation::where('id', $invest->id)->update([
            'invest_status_id' => $request->status
        ]);

        return redirect('confirm-invest')->with('success', 'Berhasil Melakukan Konfirmasi');
    }
}
