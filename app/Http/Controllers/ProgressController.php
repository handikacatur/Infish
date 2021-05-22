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
        $user = \Auth::user()->id;
        $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
        $partnerUser = $newGetPartner->id;

        $listData = \DB::table('progress')
        ->select('progress.description', 'progress_statuses.name', 'progress.created_at')
        ->join('progress_statuses', 'progress.progress_statuses', '=', 'progress_statuses.id')
        ->where('progress.partner_id', $partnerUser)
        ->whereNull('progress.deleted_at')
        ->get();

        return view('partner.progress', ['listData' => $listData]);
    }

    public function save(Request $request)
    {
        $user = \Auth::user()->id;
        $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
        $partnerUser = $newGetPartner->id;

        $request->validate([
            'description' => 'required'
        ]);

        $progress = new Progress();
        $progress->partner_id = $partnerUser;
        $progress->description = $request->description;
        $progress->progress_statuses = 2;
        $progress->save();

        return redirect('progress');
    }
}
