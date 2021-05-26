<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    public function confirimPartner(){
        $getPartner = \DB::table('partners')
        ->select('partners.id', 'partner_profiles.company_name', 'partner_profiles.cultivation', 'partner_profiles.npwp', 'partner_profiles.siup', 'partner_statuses.name')
        ->join('partner_profiles', 'partner_profiles.partner_id', '=', 'partners.id')
        ->join('partner_statuses', 'partners.status_partner_id', '=', 'partner_statuses.id')
        ->whereNull('partners.deleted_at')
        ->where('partners.status_partner_id', '!=', 1)
        ->get();
        
        return view('admin.confirm-partner', ['listPartner' => $getPartner]);
    }
}
