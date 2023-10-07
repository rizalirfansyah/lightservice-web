<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Repair;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function view_contactus()
    {
        return view('landing.contact-us');
    }

    public function index()
    {
        // $this->authorize('is_admin');
        // Menampilkan Chart Penjualan
        $currentDate = Carbon::now()->format('Y-m-d');
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $twoDaysAgo = Carbon::now()->subDays(2)->format('Y-m-d');
        $threeDaysAgo = Carbon::now()->subDays(3)->format('Y-m-d');
        $fourDaysAgo = Carbon::now()->subDays(4)->format('Y-m-d');
        $fiveDaysAgo = Carbon::now()->subDays(5)->format('Y-m-d');
        $sixDaysAgo = Carbon::now()->subDays(6)->format('Y-m-d');

        

        $totalToday = Transaksi::where('status_transaksi', '=', 'Lunas')
            ->whereDate('updated_at', $currentDate)
            ->sum('harga');
        $totalYesterday = Transaksi::where('status_transaksi', '=', 'Lunas')
                ->whereDate('updated_at', $yesterday)
                ->sum('harga');
        $totalTwoDaysAgo = Transaksi::where('status_transaksi', '=', 'Lunas')
                ->whereDate('updated_at', $twoDaysAgo)
                ->sum('harga');
        $totalThreeDaysAgo = Transaksi::where('status_transaksi', '=', 'Lunas')
                ->whereDate('updated_at', $threeDaysAgo)
                ->sum('harga');
        $totalFourDaysAgo = Transaksi::where('status_transaksi', '=', 'Lunas')
                ->whereDate('updated_at', $fourDaysAgo)
                ->sum('harga');
        $totalFiveDaysAgo = Transaksi::where('status_transaksi', '=', 'Lunas')
                ->whereDate('updated_at', $fiveDaysAgo)
                ->sum('harga');
        $totalSixDaysAgo = Transaksi::where('status_transaksi', '=', 'Lunas')
                ->whereDate('updated_at', $sixDaysAgo)
                ->sum('harga');

        $dataChart = [['totalToday', 'totalYesterday'],
                [$totalToday, $totalYesterday]];


        $repair = Repair::latest()
        ->paginate(7);
        $pelanggan = Pelanggan::latest()
        ->paginate(8);
        $totalPelanggan = $pelanggan->total();
        
        // inisiasi menghitung pendapatan hari ini
        $transaksiCurrentDate= Carbon::now()->format('Y-m-d');
        $transaksi = Transaksi::latest()
        ->paginate(5);
        $totalPendapatanHariIni = Transaksi::whereDate('updated_at', $transaksiCurrentDate)
        ->sum('harga');

        // Mendapatkan tanggal awal bulan ini
        $tanggalAwalBulan = Carbon::now()->startOfMonth()->format('Y-m-d');
        // Mendapatkan tanggal akhir bulan ini
        $tanggalAkhirBulan = Carbon::now()->endOfMonth()->format('Y-m-d');
        // Menghitung total pendapatan bulan ini
        $totalPendapatanBulanIni = Transaksi::whereBetween('updated_at', [$tanggalAwalBulan, $tanggalAkhirBulan])
        ->sum('harga');

        $tagihanTable =  Transaksi::whereIn('status_transaksi', ['Belum Lunas', 'Lunas'])
        ->orderBy('transaksi.id', 'desc')
        ->paginate(5);
        
        return view('home.admin-dashboard')
        ->with(['repair' => $repair])
        ->with(['pelanggan' => $pelanggan])
        ->with(['totalPelanggan' => $totalPelanggan])
        ->with(['transaksi' => $transaksi])
        ->with(['totalPendapatanHariIni' => $totalPendapatanHariIni])
        ->with(['totalPendapatanBulanIni' => $totalPendapatanBulanIni])
        ->with(['tagihanTable' => $tagihanTable])
        ->with(['totalToday' => $totalToday])
        ->with(['totalYesterday' => $totalYesterday])
        ->with(['totalTwoDaysAgo' => $totalTwoDaysAgo])
        ->with(['totalThreeDaysAgo' => $totalThreeDaysAgo])
        ->with(['totalFourDaysAgo' => $totalFourDaysAgo])
        ->with(['totalFiveDaysAgo' => $totalFiveDaysAgo])
        ->with(['totalSixDaysAgo' => $totalSixDaysAgo])
        ->with(['dataChart' => $dataChart])
        
        ->with(['currentDate' => $currentDate])
        ->with(['yesterday' => $yesterday])
        ->with(['twoDaysAgo' => $twoDaysAgo])
        ->with(['threeDaysAgo' => $threeDaysAgo])
        ->with(['fourDaysAgo' => $fourDaysAgo])
        ->with(['fiveDaysAgo' => $fiveDaysAgo])
        ->with(['sixDaysAgo' => $sixDaysAgo]);
    }
}