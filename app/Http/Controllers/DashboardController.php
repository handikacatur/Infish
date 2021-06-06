<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadmin|admin|investor|partner']);
    }

    public function index()
    {
        if(\Auth::user()->hasRole('superadmin'))
        {
            return "superadmin";
        } elseif (\Auth::user()->hasRole('admin')) {
            return view('admin.dashboard');
        } elseif (\Auth::user()->hasRole('investor')) {
            return view('investor.dashboard');
        } elseif (\Auth::user()->hasRole('partner')) {
            $user = \Auth::user()->id;
            $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
            $partnerUser = $newGetPartner->id;
            
            $getPartnerStatus = \DB::table('partners')->select('status_partner_id')->where('user_id', $user)->whereNull('deleted_at')->first();
            $getPartnerProfile = \DB::table('partner_profiles')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->first();
            $getAmount = \DB::table('transactions')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->sum('amount');
            $getProgress = \DB::table('progress')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->count();
            $getSubmission = \DB::table('submissions')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->count();
            $submissionAmount = \DB::table('submissions')->where('partner_id', '=', $partnerUser)->where('status_submission', '=', '1')->whereNull('deleted_at')->sum('amount');

            return view('partner.dashboard', ['statusPartner' => $getPartnerStatus, 'getPartnerProfile' => $getPartnerProfile, 'getAmount' => $getAmount, 'getProgress' => $getProgress, 'getSubmission' => $getSubmission, 'submissionAmount' => $submissionAmount]);
        }
    }
    
    public function faq()
    {
        if(\Auth::user()->hasRole('superadmin'))
        {
            return "faq superadmin";
        } elseif (\Auth::user()->hasRole('admin')) {
            return view('admin.faq');
        } elseif (\Auth::user()->hasRole('investor')) {
            return "faq investor";
        } elseif (\Auth::user()->hasRole('partner')) {
            return view('partner.faq');
        }
    }
}
