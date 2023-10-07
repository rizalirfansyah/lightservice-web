<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\DetailServis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDetailServisRequest;
use App\Http\Requests\UpdateDetailServisRequest;

class DetailServisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DetailServis $detailServis)
    {
        $detailServis = DetailServis::all();
        
        return view('home.terima-servis', compact('detailServis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetailServisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailServisRequest $request)
    {
        // dd($request->validated());
        $user_id = $request->user()->id;

        if (Repair::where('user_id', $user_id)->where('status', 'perbaikan')->exists()) {
            DB::table('detail_servis')->insert($request->validated());
    
            return redirect()->route('repairs.index')
                ->with('success', 'Berhasil menambah data servis');
        } else {
            return redirect()->back()
                ->with('error', 'Tidak dapat menambah data servis karena data servis bukan dalam status "perbaikan".');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailServis  $detailServis
     * @return \Illuminate\Http\Response
     */
    public function show(DetailServis $detailServis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailServis  $detailServis
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailServis $detailServis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailServisRequest  $request
     * @param  \App\Models\DetailServis  $detailServis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailServisRequest $request, DetailServis $detailServis)
    {
        $id=$request->input('perbaikan_servis_id');
        DB::table('detail_servis')->where('id', $id)
        ->update($request->validated());

        return redirect()->route('repairs.index')
            ->with('success', 'berhasil update detail servis!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailServis  $detailServis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailServis = DetailServis::find($id);

        if ($detailServis) {
            $detailServis->delete();
            return redirect()->back()->with('success', 'Detail servis berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Maaf, Detail servis tidak ditemukan.');
        }
        // $detailServis->delete();
    }
}
