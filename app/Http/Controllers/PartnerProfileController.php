<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fish;
use App\Models\PartnerProfile;
use App\Models\PartnerFish;
use App\Models\Partner;
use App\Models\User;

class PartnerProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:partner']);
    }

    public function index()
    {
        /* try { */
            $user = \Auth::user()->id;
            $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
            $getPartnerStatus = \DB::table('partners')->select('status_partner_id')->where('user_id', $user)->whereNull('deleted_at')->first();
            $getPureFish = \DB::table('fishes')->whereNull('deleted_at')->get();
            
            if ($newGetPartner != NULL){
                $partnerUser = $newGetPartner->id;
                $getFish = \DB::table('partner_fishes')
                ->select('partner_fishes.id', 'fishes.name')
                ->join('fishes', 'partner_fishes.fish_id', '=', 'fishes.id')
                ->where('partner_fishes.partner_id', '=', $partnerUser)
                ->whereNull('partner_fishes.deleted_at')
                ->paginate(5);
                $getJumlahProduksi = \DB::table('transactions')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->sum('weight');
                $getWeight = number_format($getJumlahProduksi / 12, 2, '.', '');
    
                $getNilaiProduksi = \DB::table('transactions')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->sum('amount');
                $getAmount = number_format($getNilaiProduksi / 12, 2, '.', '');
    
                $getPartnerProfile = \DB::table('partner_profiles')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->first();
    
                $partnerImages = \DB::table('partner_images')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->get();
    
                return view('partner.company-profile', ['statusPartner' => $getPartnerStatus, 'dataPartnerProfile' => $getPartnerProfile, 'getFishPartner' => $getFish, 'getPureFish' => $getPureFish, 'getWeight' => $getWeight, 'getAmount' => $getAmount, 'getPartnerImages' => $partnerImages, 'newGetPartner' => $newGetPartner]);
            } else {
                return view('partner.company-profile-empty',['statusPartner' => $getPartnerStatus]);
            }
        /* } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        } */
    }

    public function edit()
    {
        try {
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
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }

    public function save(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'culvitation' => 'required',
            'wide' => 'required|numeric',
            /* 'production_amount' => 'required|numeric',
            'production_value' => 'required|numeric', */
            'npwp' => 'required',
            'siup' => 'required',
            'description' => 'required'
        ]);

        try {
            $user = \Auth::user()->id;
            $getPartner = \DB::table('partners')->where('user_id', $user)->whereNull('deleted_at')->first();

            $date = date('H-i-s');
            $random = \Str::random(5);

            $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();

            if($newGetPartner == NULL)
            {
                $partner = new Partner();
                $partner->user_id = $user;
                $partner->roi = NULL;
                $partner->lot_price = NULL;
                $partner->lot = NULL;
                $partner->status_partner_id = 2;
                $partner->save();

                $partnerUser = $partner->id;
            } else {
                $partnerUser = $newGetPartner->id;
            }

            $getPartnerFishes = \DB::table('partner_fishes')->select('id')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->first();
            $getPartnerProfile = \DB::table('partner_profiles')->select('id')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->first();

            if ($getPartnerFishes == NULL)
            {
                $partnerFish = new PartnerFish();
                $partnerFish->partner_id = $partner->id;
                $partnerFish->fish_id = $request->fish;
                $partnerFish->save();
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
                $partnerProfile->amount_of_production = 0;
                $partnerProfile->production_value = 0;
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

                if($request->file('product')){
                    $imageProducts = $request->file('product');
                    foreach ($imageProducts as $loop) {
                        \DB::table('partner_images')->insert([
                            'partner_id' => $partner->id,
                            'product_image' => $random.$date.$loop->getClientOriginalName(),
                            'description' => 'Foto Produk'
                        ]);
                        $loop->move('images/upload/productPartner', $random.$date.$loop->getClientOriginalName());
                    }
                }
            } else {
                $checkChange = \DB::table('partner_profiles')->where('partner_id', '=', $partnerUser)->whereNull('deleted_at')->first();
                if($checkChange->npwp != $request->npwp || $checkChange->siup != $request->siup || $checkChange->wide != $request->wide || $checkChange->company_name != $request->company_name)
                {
                    Partner::where('id', $partnerUser)->update([
                        'status_partner_id' => 2,
                    ]);
                }

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
                        'npwp' => $request->npwp,
                        'siup' => $request->siup,
                        'description' => $request->description,
                        'image' => $random.$date.$request->file('image')->getClientOriginalName()
                    ]);

                    if($request->file('product')){
                        $imageProducts = $request->file('product');
                        foreach ($imageProducts as $loop) {
                            \DB::table('partner_images')->insert([
                                'partner_id' => $partnerUser,
                                'product_image' => $random.$date.$loop->getClientOriginalName(),
                                'description' => 'Foto Produk'
                            ]);
                            $loop->move('images/upload/productPartner', $random.$date.$loop->getClientOriginalName());
                        }
                    }

                } else {
                    PartnerProfile::where('partner_id', $partnerUser)->update([
                        'company_name' => $request->company_name,
                        'address' => $request->address,
                        'phone_number' => $request->phone_number,
                        'alternate_number' => $request->opsional_number,
                        'cultivation' => $request->culvitation,
                        'wide' => $request->wide,
                        'npwp' => $request->npwp,
                        'siup' => $request->siup,
                        'description' => $request->description
                    ]);
                    
                    if($request->file('product')){
                        $imageProducts = $request->file('product');
                        foreach ($imageProducts as $loop) {
                            \DB::table('partner_images')->insert([
                                'partner_id' => $partnerUser,
                                'product_image' => $random.$date.$loop->getClientOriginalName(),
                                'description' => 'Foto Produk'
                            ]);
                            $loop->move('images/upload/productPartner', $random.$date.$loop->getClientOriginalName());
                        }
                    }
                }
            }

            return redirect('company-profile')->with('companySuccess', 'Berhasil Memperbarui Profil Mitra');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }

    public function saveFish(Request $request)
    {
        try {
            $newGetPartner = \DB::table('partners')->where('user_id', '=', \Auth::user()->id)->whereNull('deleted_at')->first();
            $partnerUser = $newGetPartner->id;
            $getPartnerFishes = \DB::table('partner_fishes')
            ->where('partner_id', '=', $partnerUser)
            ->where('fish_id', '=', $request->fish_partner)
            ->whereNull('deleted_at')->first();
            
            $request->validate([
                'fish_partner' => 'required'
            ]);
            
            if ($getPartnerFishes == null) {
                $fishPartner = new PartnerFish();
                $fishPartner->partner_id = $partnerUser;
                $fishPartner->fish_id = $request->fish_partner;
                $fishPartner->save();
            }
            return redirect('company-profile')->with('companySuccess', 'Berhasil Menambahkan Jenis Ikan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }

    public function dropFish(PartnerFish $partnerFish)
    {
        try {
            PartnerFish::destroy('id', $partnerFish->id);
            return redirect('company-profile')->with('companySuccess', 'Berhasil Menghapus Jenis Ikan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }

    public function editProfile()
    {
        try {
            $user = \Auth::user()->id;
            $newGetPartner = \DB::table('partners')->where('user_id', '=', $user)->whereNull('deleted_at')->first();
            $getPartnerStatus = \DB::table('partners')->select('status_partner_id')->where('user_id', $user)->whereNull('deleted_at')->first();
            $getPartnerProfile = \DB::table('partner_profiles')->where('partner_id', '=', $newGetPartner->id)->whereNull('deleted_at')->first();
            return view('partner.edit-profile', ['getPartnerProfile' => $getPartnerProfile, 'getPartnerStatus' => $getPartnerStatus]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }

    public function formEditProfile()
    {
        try {
            return view('partner.edit-profile-form');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email'
        ]);

        try {
            $profile = User::find(\Auth::user()->id);
            $profile->name = $request->full_name;
            $profile->phone = $request->phone_number;
            $profile->email = $request->email;
            $profile->save();
    
            return redirect('edit-profile')->with('profileSuccess', 'Berhasil Memperbarui Profile');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }

    }

    public function passwordProfile(Request $request)
    {
        $request->validate([
            'new_password' => 'Required_with:confirm_password|same:confirm_password|min:8',
            'confirm_password' => 'min:8',
            'old_password' => 'Required'
        ]);

        try {
            if (\Hash::check($request->old_password, \Auth::user()->password)) {
                $profile = User::find(\Auth::user()->id);
                $profile->password = bcrypt($request->new_password);
                $profile->save();
                return redirect('edit-profile')->with('profileSuccess', 'Berhasil Memperbarui Password');
            } else {
                return redirect('edit-profile')->with('profileFailed', 'Password Baru dan Konfirmasi Password Harus Sama!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }

    }
}