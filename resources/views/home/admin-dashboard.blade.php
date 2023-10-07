<title>Light Service | Dashboard Admin</title>

<x-app-layout>
    
    @include('home.side-bar')

      <div class="p-4 sm:ml-64">
          <div class="p-4 rounded-lg border-gray-700 mt-10">
            <div class="relative items-center justify-center min-h-48 mb-4 rounded bg-gray-800">
              <div class="p-2">
                <h2 class="text-3xl mt-4 items-center text-start ml-8 text-gray-200 mb-4">Dashboard</h2>
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 p-4 gap-4">
                  <div class="bg-gray-600 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-500 text-white font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                      <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div class="text-right">
                      <p class="text-2xl">{{ $totalPelanggan }}</p>
                      <p>Total Pelanggan</p>
                    </div>
                  </div>
                  
                  <div class="bg-gray-600 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-500 text-white font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                      <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <div class="text-right">
                      <p class="text-2xl">Rp {{ number_format($totalPendapatanHariIni, 0, ',', '.') }}</p>
                      <p>Pendapatan hari ini</p>
                    </div>
                  </div>

                  <div class="bg-gray-600 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-500 text-white font-medium group">
                    <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                      <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="text-right">
                      <p class="text-2xl">Rp {{ number_format($totalPendapatanBulanIni, 0, ',', '.') }}</p>
                      <p>Pendapatan bulan ini</p>
                    </div>
                  </div>

                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">
                  {{-- chart bar --}}
                  <div class="mx-auto w-full overflow-hidden mt-10">
                    <canvas
                      data-te-chart="bar"
                      data-te-dataset-label="Data pendapatan"
                      data-te-labels= "['{{ $sixDaysAgo }}', '{{ $fiveDaysAgo }}' , '{{ $fourDaysAgo }}' , '{{ $threeDaysAgo }}' , '{{ $twoDaysAgo }}' , '{{ $yesterday }}' , '{{ $currentDate }}']"
                      data-te-dataset-data= "[{{ $totalSixDaysAgo }}, {{ $totalFiveDaysAgo }} , {{ $totalFourDaysAgo }} , {{ $totalThreeDaysAgo }} , {{ $totalTwoDaysAgo }} , {{ $totalYesterday }} , {{ $totalToday }}]">
                    </canvas>
                  </div>

                  {{-- tabel pelanggan --}}
                  <div class="w-full overflow-x-auto">
                    <h2 class="text-center text-lg text-white mb-2">Tabel Pelanggan</h2>
                    <table class="w-full">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left uppercase border-b border-gray-700 text-gray-400 bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nama Pelanggan</th>
                        <th class="px-4 py-3">Telepon</th>
                        <th class="px-4 py-3">Alamat</th>
                        </tr>
                    </thead>
                    <tbody class=" divide-y divide-gray-700 bg-gray-800">
                        @foreach ($pelanggan as $index => $customer)
                        
                        <tr class="bg-gray-800 hover:bg-gray-900 text-gray-400 text-xs">
                        <td class="px-4 py-3">{{ $loop->index + $pelanggan->firstItem() }}</td>
                        <td class="px-4 py-3">{{ $customer->nama_pelanggan }}</td>
                        <td class="px-4 py-3">{{ $customer->notelp }}</td>
                        <td class="px-4 py-3">{{ $customer->alamat }}</td>
                        </tr>
    
                        @endforeach
                    </tbody>
                    </table>
                  </div>

                  {{-- tabel servis --}}
                  <div class="w-full overflow-x-auto">
                    <h2 class="text-center text-lg text-white mb-2">Tabel Data Servis</h2>
                    <table class="w-full">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left uppercase border-b border-gray-700 text-gray-400 bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nomor Servis</th>
                        <th class="px-4 py-3">Pemilik</th>
                        <th class="px-4 py-3">Tipe gadget</th>
                        <th class="px-4 py-3">Kerusakan</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700 bg-gray-700">
                     @foreach ($repair as $index => $dataservis)
                         
                        <tr class="bg-gray-800 hover:bg-gray-900 text-gray-400">
                        <td class="px-4 py-3 text-sm">{{ $loop->index + $repair->firstItem() }}</td>
                        <td class="px-4 py-3 text-sm">{{ $dataservis->nomor_servis }}</td>
                        <td class="px-4 py-3 text-sm">@foreach($dataservis->pelanggan()->get() as $pemilik)
                         {{ $pemilik->nama_pelanggan }}@endforeach</td>                        
                        <td class="px-4 py-3 text-sm">{{ $dataservis->tipe_gadget }}</td>
                        <td class="px-4 py-3 text-sm">{{ $dataservis->kerusakan }}</td>
                        <td class="px-4 py-3 text-xs">
                         <span class="px-3 py-1 font-semibold leading-tight rounded-xl" 
                         style="background-color: 
                         @if ($dataservis->status == 'daftar')
                             green;
                         @elseif ($dataservis->status == 'pengecekan')
                             teal;
                         @elseif ($dataservis->status == 'perbaikan')
                             indigo;
                         @elseif ($dataservis->status == 'selesai')
                             blue;
                         @else
                             red;
                         @endif
                         color: white;">
                         {{ $dataservis->status }}
                         </span>
                        </td>
                        <td class="px-4 py-3 text-xs flex justify-center">

                        </td>
                        </tr>
                     @endforeach
                    </tbody>
                    </table>
                  </div>

                  {{-- tabel pendapatan --}}
                  <div class="w-full overflow-x-auto">
                    <table class="w-full">
                      <h2 class="text-center text-lg text-white mb-2">Tabel Tagihan</h2>
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left uppercase border-b border-gray-700 text-gray-400 bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nama Pelanggan</th>
                        <th class="px-4 py-3">Nomor Servis</th>
                        <th class="px-4 py-3">Tipe Gadget</th>
                        <th class="px-4 py-3">Biaya</th>
                        <th class="px-4 py-3">Status</th>
                        </tr>
                    </thead>
                    
                     <tbody class="divide-y divide-gray-700 bg-gray-700">
                         @foreach ($tagihanTable as $transaction)
                         <tr class="bg-gray-800 hover:bg-gray-900 text-gray-400">
                         <td class="px-4 py-3">{{ $loop->iteration }}</td>
                         <td class="px-4 py-3">{{ $transaction->pelanggan->nama_pelanggan }}</td>
                         <td class="px-4 py-3">{{ $transaction->repair->nomor_servis }}</td>
                         <td class="px-4 py-3">{{ $transaction->repair->tipe_gadget }}</td>
                         <td class="px-4 py-3">Rp. {{ number_format($transaction->harga, 0, ',', '.') }}</td>
                         <td class="px-4 py-3 text-xs flex text-center align-items-center">
                             <span class="px-3 py-1 font-semibold leading-tight rounded-xl" 
                             style="background-color: 
                             @if ($transaction->status_transaksi == 'Belum Lunas')
                                 red;
                             @elseif ($transaction->status_transaksi == 'Lunas')
                                 blue;
                             @else
                                 teal;
                             @endif
                             color: white;">
                             {{ $transaction->status_transaksi }}
                             </span>
                         </td>
                         <td class="px-4 py-3 text-xs flex justify-center">       
                              
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- ./Statistics Cards -->
</x-app-layout>