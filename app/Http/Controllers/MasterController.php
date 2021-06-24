<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fish;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function indexFish()
    {
        $listData = Fish::all();
        return view('admin.fish-index', ['listData' => $listData]);
    }

    public function saveFish(Request $request)
    {
        $request->validate([
            'fish_name' => 'required',
            'harvest' => 'required|numeric'
        ]);

        $newFish = new Fish();
        $newFish->name = $request->fish_name;
        $newFish->harvest = $request->harvest;
        $newFish->save();

        return redirect('master-fish')->with('success', 'Berhasil Menambahkan Data Ikan');
    }

    public function dropFish(Fish $fish){
        Fish::destroy('id', $fish->id);
        return redirect('master-fish')->with('success', 'Berhasil Menghapus Data Ikan');
    }
}
