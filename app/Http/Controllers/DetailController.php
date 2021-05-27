<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Partner;
use App\Models\PartnerProfile;
use App\Models\Fish;

class DetailController extends Controller
{
    public function __construct()
    {        
        $this->middleware(['role:admin']);
    }

    public function detailPartner()
    {
        $getPartner = \DB::table('partners')
        ->select('partners.id', 'partner_profiles.company_name', 'partner_profiles.cultivation', 'partner_profiles.npwp', 'partner_profiles.siup', 'partner_statuses.name', 'partners.roi', 'partners.lot', 'partners.lot_price')
        ->join('partner_profiles', 'partner_profiles.partner_id', '=', 'partners.id')
        ->join('partner_statuses', 'partners.status_partner_id', '=', 'partner_statuses.id')
        ->whereNull('partners.deleted_at')
        ->where('partners.status_partner_id', '=', 1)
        ->get();

        return view('admin.detail-partner', ['listPartner' => $getPartner]);
    }

    public function detailPartnerEdit(Partner $partner){
        $dataCompany = \DB::table('partner_profiles')->where('partner_id', '=', $partner->id)->whereNull('deleted_at')->first();
        $dataFish = Fish::all();
        $dataStatus = \DB::table('partner_statuses')->get();

        return view('admin.detail-partner-edit', ['dataFish' => $dataFish, 'dataCompany' => $dataCompany, 'dataPartner' => $partner, 'dataStatus' => $dataStatus]);
    }

    public function detailPartnerPatch(Partner $partner, Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'culvitation' => 'required',
            'fish' => 'required',
            'wide' => 'required|numeric',
            'production_amount' => 'required|numeric',
            'production_value' => 'required|numeric',
            'npwp' => 'required',
            'siup' => 'required',
            'description' => 'required',
            'lot' => 'required|numeric',
            'lot_price' => 'required|numeric',
            'roi' => 'required|numeric'
        ]);

        PartnerProfile::where('partner_id', $partner->id)->update([
            'company_name' => $request->company_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'alternate_number' => $request->opsional_number,
            'cultivation' => $request->culvitation,
            'wide' => $request->wide,
            'amount_of_production' => $request->production_amount,
            'production_value' => $request->production_value,
            'npwp' => $request->npwp,
            'siup' => $request->siup,
            'description' => $request->description
        ]);

        Partner::where('id', $partner->id)->update([
            'lot' => $request->lot,
            'lot_price' => $request->lot_price,
            'roi' => $request->roi,
            'status_partner_id' => $request->status
        ]);

        return redirect('detail-partner');
    }
}
