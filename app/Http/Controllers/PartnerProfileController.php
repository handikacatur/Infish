<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fish;
use App\Models\PartnerProfile;
use App\Models\PartnerFish;
use App\Models\Partner;

class PartnerProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:partner']);
    }

    public function index()
    {
        $user = \Auth::user()->id;
        $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
        
        if ($newGetPartner != NULL){
            $getPartnerStatus = \DB::table('partners')->select('status_partner_id')->where('user_id', $user)->whereNull('deleted_at')->first();
            $partnerUser = $newGetPartner->id;
    
            $getPartnerProfile = \DB::table('partner_profiles')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->first();
            return view('partner.company-profile', ['statusPartner' => $getPartnerStatus, 'dataPartnerProfile' => $getPartnerProfile]);
        } else {
            return view('partner.company-profile-empty');
        }

    }

    public function edit(){
        $user = \Auth::user()->id;
        $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
        $dataFish = Fish::all();

        if($newGetPartner != NULL)
        {
            $partnerUser = $newGetPartner->id;
            $dataCompany = \DB::table('partner_profiles')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->first();
            return view('partner.company-profile-edit', ['dataFish' => $dataFish, 'dataCompany' => $dataCompany, 'dataPartner' => $newGetPartner]);
        } else {
            return view('partner.company-profile-edit-empty', ['dataFish' => $dataFish]);
        }
    }

    public function save(Request $request){
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
            'description' => 'required'
        ]);

        $user = \Auth::user()->id;
        $getPartner = \DB::table('partners')->where('user_id', $user)->whereNull('deleted_at')->first();

        $date = date('H-i-s');
        $random = \Str::random(5);

        $partner = new Partner();
        $partner->user_id = $user;
        $partner->roi = NULL;
        $partner->lot_price = NULL;
        $partner->lot = NULL;
        $partner->status_partner_id = 2;
        $partner->save();

        $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
        $partnerUser = $newGetPartner->id;
        $getPartnerFishes = \DB::table('partner_fishes')->select('id')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->first();
        $getPartnerProfile = \DB::table('partner_profiles')->select('id')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->first();

        if ($getPartnerFishes == NULL)
        {
            $partnerFish = new PartnerFish();
            $partnerFish->partner_id = $partner->id;
            $partnerFish->fish_id = $request->fish;
            $partnerFish->save();
        } else {
            PartnerFish::where('partner_id', $partnerUser)->update([
                'fish_id' => $request->fish
            ]);
        }

        if ($getPartnerProfile == NULL)
        {
            $partnerProfile = new PartnerProfile();
            $partnerProfile->partner_id = $partner->id;
            $partnerProfile->company_name = $request->company_name;
            $partnerProfile->address = $request->address;
            $partnerProfile->phone_number = $request->phone_number;
            $partnerProfile->alternate_number = $request->opsional_number;
            $partnerProfile->cultivation = $request->culvitation;
            $partnerProfile->wide = $request->wide;
            $partnerProfile->amount_of_production = $request->production_amount;
            $partnerProfile->production_value = $request->production_value;
            $partnerProfile->npwp = $request->npwp;
            $partnerProfile->siup = $request->siup;
            $partnerProfile->description = $request->description;

            if($request->file('image'))
            {
                $request->file('image')->move('images/upload/companyProfile', $random.$date.$request->file('image')->getClientOriginalName());
                $partnerProfile->image = $random.$date.$request->file('image')->getClientOriginalName();
            } else {
                
                $partnerProfile->image ='defaultCompany.jpg';
            }
            $partnerProfile->save();
        } else {
            if($request->file('image'))
            {                
                $request->file('image')->move('images/upload/companyProfile', $random.$date.$request->file('image')->getClientOriginalName());
                PartnerProfile::where('partner_id', $partnerUser)->update([
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
                    'description' => $request->description,
                    'image' => $random.$date.$request->file('image')->getClientOriginalName()
                ]);
            } else {
                PartnerProfile::where('partner_id', $partnerUser)->update([
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
            }
        }

        return redirect('company-profile');
    }
}