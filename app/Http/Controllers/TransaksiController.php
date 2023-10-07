<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Repair;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Nette\Utils\DateTime;
use App\Models\DetailServis;
use Illuminate\Http\Request;
use App\Jobs\SendEmailTagihanJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Transaksi::query();
        
        if ($request->has('search')) {
            $query->join('repairs', 'transaksi.perbaikan_id', '=', 'repairs.id')
                ->join('pelanggan', 'repairs.pelanggan_id', '=', 'pelanggan.id')
                ->select('transaksi.*', 'repairs.nomor_servis', 'pelanggan.nama_pelanggan', 'repairs.tipe_gadget')
                ->where(function ($query) use ($request) {
                    $query->where('repairs.nomor_servis', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('pelanggan.nama_pelanggan', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('repairs.tipe_gadget', 'LIKE', '%' . $request->search . '%');
                })
                ->where('transaksi.status_transaksi', 'Belum Lunas');
        } else {
            $query->where('status_transaksi', 'Belum Lunas');
        }

        $transaksi = $query->orderBy('transaksi.id', 'desc')->paginate(10);
        $pelanggan = Pelanggan::all();
        $repair = Repair::all();
        
        return view('home.tagihan', compact('repair', 'pelanggan', 'transaksi'));
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
     * @param  \App\Http\Requests\StoreTransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiRequest $request)
    {
        // Mengambil nilai status dari tabel repair berdasarkan id yang diberikan dalam request
        $repairStatus = DB::table('repairs')->where('id', $request->perbaikan_id)->value('status');

        // Memeriksa apakah status pada tabel repair belum selesai
        if (in_array($repairStatus, ['daftar', 'pengecekan', 'perbaikan'])) {
            return redirect()->route('transaksi.index')
                ->with('error', 'Tidak dapat menambah data karena status perbaikan belum selesai');
        }

        // Memeriksa apakah status pada tabel repair adalah 'batal'
        if ($repairStatus === 'batal') {
            return redirect()->route('transaksi.index')
                ->with('error', 'Tidak dapat menambah data karena status perbaikan adalah batal');
        }

          // Memeriksa apakah tabel detailservis sudah terisi
        $detailServisCount = DB::table('detail_servis')->where('perbaikan_servis_id', $request->perbaikan_id)->count();

        if ($detailServisCount === 0) {
            return redirect()->route('transaksi.index')
                ->with('error', 'Tidak dapat menambah data karena tabel Detail Servis belum terisi');
        }

        // Menyiapkan data untuk disimpan ke tabel transaksi
        $data = $request->validated();
        $data['created_at'] = Carbon::now();

        // Jika status tidak batal, maka data akan ditambahkan ke tabel transaksi
        DB::table('transaksi')->insert($data);
        $pelanggan_id =  DB::table('repairs')->where('id', $request->perbaikan_id)->value('pelanggan_id');
        // $nama_pelanggan = DB::table('pelanggan')->where('id', $pelanggan_id)->value('nama_pelanggan');
        $email = DB::table('pelanggan')->where('id', $pelanggan_id)->value('email');

        $send_mail = $email;
        $biaya = $request->harga;
        dispatch(new SendEmailTagihanJob($send_mail, $biaya));

        return redirect()->route('transaksi.index')
            ->with('success', 'Berhasil menambah tagihan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransaksiRequest  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        $transaksi->update($request->validated());

        return redirect()->route('transaksi.index')
            ->with('success', 'berhasil update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index')
        ->with('success', 'berhasil menghapus!');
    }

    public function index_pembayaran(Request $request)
    {
        $query = Transaksi::query();
        
        if ($request->has('search')) {
            $query->join('repairs', 'transaksi.perbaikan_id', '=', 'repairs.id')
                ->join('pelanggan', 'repairs.pelanggan_id', '=', 'pelanggan.id')
                ->select('transaksi.*', 'repairs.nomor_servis', 'pelanggan.nama_pelanggan', 'repairs.tipe_gadget')
                ->where(function ($query) use ($request) {
                    $query->where('repairs.nomor_servis', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('pelanggan.nama_pelanggan', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('repairs.tipe_gadget', 'LIKE', '%' . $request->search . '%');
                })
                ->where('transaksi.status_transaksi', 'Lunas');
        } else {
            $query->where('status_transaksi', 'Lunas');
        }

        $transaksi = $query->orderBy('transaksi.id', 'desc')->paginate(10);
        $pelanggan = Pelanggan::all();
        $repair = Repair::all();
        
        return view('home.pembayaran', compact('repair', 'pelanggan', 'transaksi'));
    }

    // public function getDailyCost($date)
    // {
    //     $totalCost = Transaksi::whereDate('updated_at', $date)
    //     ->where('status_transaksi', 'Lunas')
    //     ->sum('harga');
        
    //     return $totalCost ?? 0;
    // }

    // public function pendapatan(Request $request)
    // {
    //     $start = (new DateTime($request->input('start')))->format('Y-m-d');
    //     $end = (new DateTime($request->input('end')))->format('Y-m-d');
        
    //     if ($request->has(['start', 'end'])) {
    //         $dates = Transaksi::where('status_transaksi', 'Lunas')
    //             ->whereDate('updated_at', '>=', $start)
    //             ->whereDate('updated_at', '<=', $end)
    //             ->selectRaw('DATE(updated_at) as date')
    //             ->groupBy('date')
    //             ->paginate(10); // Menambahkan paginate dengan 10 item per halaman
    //     } else {
    //         $dates = Transaksi::where('status_transaksi', 'Lunas')
    //             ->selectRaw('DATE(updated_at) as date')
    //             ->groupBy('date')
    //             ->paginate(10); // Menambahkan paginate dengan 10 item per halaman
    //     }

    //     $totalCosts = [];
    //     foreach ($dates as $date) {
    //         $totalCost = $this->getDailyCost($date->date);
    //         $totalCosts[$date->date] = $totalCost;
    //     }

    //     return view('home.report', compact('totalCosts', 'dates'));
    // }

    public function cetaktagihan(Transaksi $transaksi)
    {
        $repair = Repair::all();
        $pelanggan = Pelanggan::where('nama_pelanggan', $transaksi->pelanggan->nama_pelanggan)->get();
        $detailServis = DetailServis::all();

        $tanggalCetak = Carbon::now()->format('Y-m-d H:i:s');

        // Buat objek Dompdf
        $dompdf = new Dompdf();

        // Render view ke dalam HTML
        $html = view('layouts.pdfnota', compact('pelanggan', 'repair', 'transaksi', 'detailServis', 'tanggalCetak'))->render();

        // Load HTML ke dalam Dompdf
        $dompdf->loadHtml($html);
        // Render PDF
        $dompdf->render();

        $pdfContent = $dompdf->output();

        // Buat nama file berdasarkan nama pelanggan
        $fileName = 'nota_' . $transaksi->nama_pelanggan . '.pdf';

        // Tampilkan pratinjau PDF di browser
        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $fileName .'"'
        ]);
    }

    public function cetakpendapatan(Request $request)
    {
        $start = (new DateTime($request->input('start')))->format('Y-m-d');
        $end = (new DateTime($request->input('end')))->format('Y-m-d');
        
        $dates = Transaksi::where('status_transaksi', 'Lunas')
            ->whereDate('updated_at', '>=', $start)
            ->whereDate('updated_at', '<=', $end)
            ->selectRaw('DATE(updated_at) as date')
            ->groupBy('date')
            ->pluck('date');

            $totalCosts = [];
            $total_transaksi = 0;
            foreach ($dates as $date) {
                $totalCost = $this->getDailyCost($date);
                $totalCosts[$date] = $totalCost;
                $total_transaksi += $totalCost;
            }
    
        // Buat objek Dompdf
        $dompdf = new Dompdf();

        // Render view ke dalam HTML
        $html = view('layouts.pdf-pendapatan', compact('date', 'totalCosts', 'total_transaksi'))->render();

        // Load HTML ke dalam Dompdf
        $dompdf->loadHtml($html);
        // Render PDF
        $dompdf->render();

        // Dapatkan konten PDF sebagai string
        $pdfContent = $dompdf->output();

        // Buat nama file berdasarkan data yang dicetak
        $fileName = 'pendapatan_' . $start . '_' . $end . '.pdf';

        // Tampilkan pratinjau PDF di browser
        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $fileName . '"'
        ]);
    }
    
    public function pdfpembayaran(Request $request)
    {
        $start = (new DateTime($request->input('start')))->format('Y-m-d');
        $end = (new DateTime($request->input('end')))->format('Y-m-d');

        $transaksis = Transaksi::where('status_transaksi', 'Lunas')
            ->whereDate('updated_at', '>=', $start)
            ->whereDate('updated_at', '<=', $end)
            ->with('repair', 'repair.pelanggan') // Menambahkan relasi dengan tabel Repair dan Pelanggan
            ->get();

        $total_transaksi = 0;
        foreach ($transaksis as $transaksi) {
            $total_transaksi += $transaksi->harga;
        }

        // Buat objek Dompdf
        $dompdf = new Dompdf();

        // Render view ke dalam HTML
        $html = view('layouts.pdf-pembayaran', compact('transaksis', 'total_transaksi'))->render();

        // Load HTML ke dalam Dompdf
        $dompdf->loadHtml($html);
        // Render PDF
        $dompdf->render();

        // Dapatkan konten PDF sebagai string
        $pdfContent = $dompdf->output();

        // Buat nama file berdasarkan data yang dicetak
        $fileName = 'pendapatan_' . $start . '_' . $end . '.pdf';

        // Tampilkan pratinjau PDF di browser
        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $fileName . '"'
        ]);
    }
}
