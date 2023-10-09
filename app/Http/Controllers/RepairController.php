<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\User;
use App\Models\Repair;
use App\Models\Pelanggan;
use Illuminate\Support\Str;
use App\Models\DetailServis;
use Illuminate\Http\Request;
use App\Jobs\SendEmailQueueJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\StoreRepairRequest;
use App\Http\Requests\UpdateRepairRequest;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')) {
            $repair = Repair::join('pelanggan', 'repairs.pelanggan_id', '=', 'pelanggan.id')
            ->join('users', 'repairs.user_id', '=', 'users.id')
            ->where('repairs.nomor_servis', 'LIKE', '%' . $request->search . '%')
            ->orWhere('users.name', 'LIKE', '%' . $request->search. '%')
            ->paginate(10);
        } else {
            $repair = Repair::latest()->paginate(10);
        }

        $pelanggan = Pelanggan::latest()->get();
        $detailServis = DetailServis::latest()->get();
        $users = User::latest()->get();

        return view('home.terima-servis', compact('repair','pelanggan','detailServis', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::latest()->get();
        $users = User::latest()->get();
        
        return view ('home.input-servis', compact('pelanggan', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRepairRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRepairRequest $request)
    {
        $repair = new Repair($request->validated());
        $repair['nomor_servis']="1";
        $repair['status']="daftar";

        //prefix
        if($repair->jenis_gadget == 'iPhone') {
            $prefix = "SER01"; // Prefix yang diinginkan
        } if($repair->jenis_gadget == 'Android') {
            $prefix = "SER02";
        } if($repair->jenis_gadget == 'MacBook') {
            $prefix = "SER03";
        } if($repair->jenis_gadget == 'Laptop') {
            $prefix = "SER04";
        }
        $randomNumber = mt_rand(100000, 999999); // Menghasilkan angka acak
        $repair->nomor_servis = $prefix . $randomNumber;
        $repair->save();

        // $detailService = new DetailServis();
        // $detailService->perbaikan_servis_id = $repair->id;
        // Lanjutkan dengan atribut-atribut lain yang ingin Anda simpan

        // $detailService->save();

        return redirect()->route('repairs.index')
            ->with('success', 'Berhasil menambah data servis');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function show(Repair $repair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function edit(Repair $repair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepairRequest  $request
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepairRequest $request, Repair $repair)
    {
        // cek status jika selesai maka tidak dapat diperbarui
        if ($repair->status == 'selesai') {
            return redirect()->back()->with('error', 'Tidak dapat memperbarui data yang sudah selesai perbaikan.');
        }

        if ($repair->status != 'daftar') {
            $send_mail = $repair->pelanggan->email;
            dispatch(new SendEmailQueueJob($send_mail));
        }

        $repair->update($request->validated());

        return redirect()->route('repairs.index')
            ->with('success', 'berhasil update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repair $repair)
    {
        $repair->delete();

        return redirect()->route('repairs.index')
        ->with('success', 'berhasil menghapus data!');
    }

    public function getStatus(Request $request)
    {
        $keyword = $request->search;
        $repair = Repair::where('nomor_servis', '=', $keyword)
            ->latest()->get();
        
        if ($repair->isEmpty()) {
            $errorMessage = 'Data tidak ditemukan';
            return view('landing.check-status', compact('errorMessage', 'repair'));
        } else {
            $status = $repair->first()->status; // Mendapatkan status reparasi pertama dalam koleksi
            if ($status === 'batal') {
                $errorMessage = 'Reparasi telah dibatalkan';
                return view('landing.check-status', compact('errorMessage', 'repair'));
            } else {
                return view('landing.status-gadget', compact('repair'));
            }
        }
    }

    public function addComment(Request $request)
    {
        // Assuming 'id' is the primary key of the repair record you want to update
        $repair = Repair::findOrFail($request->input('id'));

        $repair->comments = $request->input('comments');
        $repair->save();
        
        return redirect()->back()->with('success', 'Terima kasih atas kritik dan saran anda!');
    }

    public function showComment(Request $request)
    {
        if($request->has('search')) {
            $repair = Repair::where('comments','like', '%' . $request->search . '%')
            ->orWhere('nomor_servis', 'like', '%' . $request->search . '%')
            ->paginate(10);
        } else {
            $repair = Repair::latest()->paginate(10);
        }
        
        return view ('home.komentar', compact('repair'));
    }
    
    public function cetakbukti(Repair $repair)
    {
        $pelanggan = Pelanggan::where('nama_pelanggan', $repair->pelanggan->nama_pelanggan)->first();

    // Buat objek Dompdf

        // Buat objek Dompdf
        $dompdf = new Dompdf();

        // Render view ke dalam HTML
        $html = view('layouts.pdfbukti', compact('pelanggan', 'repair'))->render();

        // Load HTML ke dalam Dompdf
        $dompdf->loadHtml($html);
        // Render PDF
        $dompdf->render();

        $pdfContent = $dompdf->output();

        // Buat nama file berdasarkan nama pelanggan
        $fileName = 'nota_' . $repair->pelanggan->nama_pelanggan . '.pdf';

        // Tampilkan pratinjau PDF di browser
        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $fileName .'"'
        ]);
    }
}
