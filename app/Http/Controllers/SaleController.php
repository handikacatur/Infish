<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Transaction;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:partner']);
    }

    public function index()
    {
        $newGetPartner = \DB::table('partners')->where('user_id', '=', \Auth::user()->id)->whereNull('deleted_at')->first();
        try {
            if ($newGetPartner != NULL) {
                $partnerUser = $newGetPartner->id;
                $listData = \DB::table('transactions')
                ->select('transactions.id', 'fishes.name', 'transactions.weight', 'transactions.amount', 'transactions.created_at')
                ->join('fishes', 'transactions.partner_fish_id', '=', 'fishes.id')
                ->where('transactions.partner_id', '=', $partnerUser)
                ->whereNull('transactions.deleted_at')
                ->paginate(5);
    
                $dataFish = \DB::table('partner_fishes')
                ->select('partner_fishes.id', 'fishes.name')
                ->join('fishes', 'partner_fishes.fish_id', '=', 'fishes.id')
                ->where('partner_fishes.partner_id', '=', $partnerUser)
                ->whereNull('partner_fishes.deleted_at')
                ->get();
    
                $penjualanCount = Transaction::select(\DB::raw('COUNT(*) as count'))
                ->whereYear('created_at', date('Y'))
                ->whereNull('deleted_at')
                ->where('partner_id', '=', $partnerUser)
                ->groupBy(\DB::raw("Month(created_at)"))
                ->pluck('count');
    
                /* $penjualanCount = Transaction::select(\DB::raw('SUM(amount) as sum'))
                ->whereYear('created_at', date('Y'))
                ->whereNull('deleted_at')
                ->where('partner_id', '=', $partnerUser)
                ->groupBy(\DB::raw("Month(created_at)"))
                ->pluck('sum'); */
                /* dd($penjualanCount); */
    
                $penjualanBulan = Transaction::select(\DB::raw('Month(created_at) as month'))
                ->whereYear('created_at', date('Y'))
                ->whereNull('deleted_at')
                ->where('partner_id', '=', $partnerUser)
                ->groupBy(\DB::raw("Month(created_at)"))
                ->pluck('month');
    
                $dataPenjualan = array(0,0,0,0,0,0,0,0,0,0,0,0);
                foreach ($penjualanBulan as $index => $month) {
                    $dataPenjualan[$month] = $penjualanCount[$index];
                }
    
                return view('partner.sale', ['listData' => $listData, 'dataFish' => $dataFish], compact('dataPenjualan'));
            } else {
                return redirect('dashboard');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }

    public function save(Request $request)
    {
        try {
            $newGetPartner = \DB::table('partners')->where('user_id', '=', \Auth::user()->id)->whereNull('deleted_at')->first();
            $partnerUser = $newGetPartner->id;

            $request->validate([
                'weight' => 'required',
                'amount' => 'required'
            ]);

            $transaction = new Transaction();
            $transaction->partner_id = $partnerUser;
            $transaction->partner_fish_id = $request->fish;
            $transaction->weight = $request->weight;
            $transaction->amount = $request->amount;
            $transaction->save();

            return redirect('sale')->with('saleSuccess', 'Berhasil Menambahkan Penjualan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }

    public function edit(Sale $sale)
    {
        try {
            $newGetPartner = \DB::table('partners')->where('user_id', '=', \Auth::user()->id)->whereNull('deleted_at')->first();
            $partnerUser = $newGetPartner->id;
            $dataFish = \DB::table('partner_fishes')
            ->select('partner_fishes.id', 'fishes.name')
            ->join('fishes', 'partner_fishes.fish_id', '=', 'fishes.id')
            ->where('partner_fishes.partner_id', '=', $partnerUser)
            ->whereNull('partner_fishes.deleted_at')
            ->get();

            return view('partner.sale-edit', ['dataFish' => $dataFish, 'dataSale' => $sale]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }

    public function put(Request $request, Sale $sale)
    {
        try {
            $request->validate([
                'weight' => 'required',
                'amount' => 'required'
            ]);
    
            Sale::where('id', $sale->id)->update([
                'partner_fish_id' => $request->fish,
                'weight' => $request->weight,
                'amount' => $request->amount
            ]);
    
            return redirect('sale')->with('saleSuccess', 'Berhasil Memperbarui Ddata Penjualan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }

    public function destroy(Sale $sale)
    {
        try {
            Sale::destroy('id', $sale->id);
            return redirect('sale')->with('saleSuccess', 'Berhasil Menghapus Penjualan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed_control', 'Terjadi Kesalahan '.$th);
        }
    }
}
