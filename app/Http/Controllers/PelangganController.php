<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Models\Repair;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        
        if($request->has('search')){
            $pelanggan = Pelanggan::where('nama_pelanggan', 'LIKE', '%' .$request->search. '%')
            ->orWhere('notelp', 'like', '%' .$request->search. '%')
            ->paginate(10);
        } else {
            $pelanggan = DB::table('pelanggan')
            ->latest('id')->paginate(10);
        }

        return view('home.pelanggan')
        ->with('pelanggan', $pelanggan);
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
     * @param  \App\Http\Requests\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePelangganRequest $request)
    {
        DB::table('pelanggan')->insert($request->validated());

        return redirect()->route('pelanggan.index')
            ->with('success', 'berhasil menambah data pelanggan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelangganRequest  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        // Check if the new phone number already exists for another pelanggan
        $existingPelanggan = Pelanggan::where('notelp', $request->input('notelp'))
            ->where('id', '<>', $pelanggan->id) // Exclude the current pelanggan
            ->first();
    
        if ($existingPelanggan) {
            return redirect()->back()->with('error', 'Nomor telepon sudah digunakan oleh pelanggan lain.');
        }
    
        $pelanggan->update($request->validated());
    
        return redirect()->route('pelanggan.index')
            ->with('success', 'Berhasil update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $hasPelanggan = Repair::where('pelanggan_id', $pelanggan->id)->exists();

            // Periksa apakah ada relasi data yang masih terkait dengan pelanggan
            if ($hasPelanggan) {
                return redirect()->route('pelanggan.index')
                    ->with('error', 'Tidak dapat menghapus data pelanggan karena memiliki keterhubungan dengan transaksi yang ada.');
            }
    
            // Jika tidak ada relasi data yang terkait, hapus data pelanggan
            $pelanggan->delete();
    
            return redirect()->route('pelanggan.index')
                ->with('success', 'Berhasil menghapus data!');
    }

    public function redirectToWhatsapp($phoneNumber)
    {
        $message = 'Halo kami dari light service!'; // Ganti dengan pesan yang ingin Anda kirim

        // Menambahkan kode negara Indonesia jika tidak dimulai dengan "+62"
        if (!str_starts_with($phoneNumber, '+62')) {
            $phoneNumber = '+62' . ltrim($phoneNumber, '0');
        }

        $url = 'https://api.whatsapp.com/send?phone=' . $phoneNumber . '&text=' . urlencode($message);

        return redirect()->away($url)->withHeaders(['target' => '_blank']);
    }

}