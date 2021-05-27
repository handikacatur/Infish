<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Fish;
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

    public function actionPartner(Partner $partner){
        $dataCompany = \DB::table('partner_profiles')->where('partner_id', '=', $partner->id)->whereNull('deleted_at')->first();
        $dataFish = Fish::all();
        $dataStatus = \DB::table('partner_statuses')->get();

        return view('admin.confirm-partner-detail', ['dataFish' => $dataFish, 'dataCompany' => $dataCompany, 'dataPartner' => $partner, 'dataStatus' => $dataStatus]);
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
}
