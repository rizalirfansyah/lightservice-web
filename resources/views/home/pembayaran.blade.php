<title>Light Service | Pembayaran</title>

<x-app-layout>

   @include('home.side-bar')

   <div class="p-4 sm:ml-64">
       <div class="p-4 rounded-lg border-gray-700 mt-10">
          <div class="relative items-center justify-center min-h-48 mb-4 rounded bg-gray-800">
           <div class="p-2">
           <h2 class="text-3xl mt-4 items-center text-start text-gray-200 ml-8">Pembayaran</h2>
           <div class="flex justify-between">
           {{-- Search bar --}}
               <form class="flex items-center pt-4 space-x-1 ml-3">
                   <label for="simple-search" class="sr-only">Search</label>
                   <div class="relative w-32 lg:w-96 md:w-80 sm:w-40">
                       <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                           <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                       </div>
                       <input type="search" name="search" id="simple-search" class="text-sm rounded-lg block w-full pl-10 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Cari data..." required>
                   </div>
                   <button class="p-1.5 lg:p-2.5 -ml-2 text-sm font-medium text-white rounded-lg border border-blue-700  focus:ring-4 focus:outline-none bg-blue-600 hover:bg-blue-700 focus:ring-blue-600">
                       <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                       <span class="sr-only">Search</span>
                   </button>
               </form>

               <div class="flex items-center space-x-1 mr-5">
                 {{-- modal print --}}
                 <button data-modal-target="modal-pdf-pembayaran" data-modal-toggle="modal-pdf-pembayaran" class="focus:outline-none text-white focus:ring-4 font-medium rounded-lg text-sm px-4 p-3.5 mr-2 mb-2 mt-2 bg-green-600 hover:bg-green-700 focus:ring-green-800" title="print">
                    <i class="fa fa-print" aria-hidden="true"></i>
                </button>
                <!-- Main modal print -->
                <div id="modal-pdf-pembayaran" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                    <div class="relative w-full h-full max-w-md md:h-1/2">
                        <!-- Modal content -->
                        <div class="relative rounded-lg shadow bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white" data-modal-hide="modal-pdf-pembayaran">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>

                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-white">Pilih rentang waktu</h3>

                                <form class="space-y-6" action="{{ route('pdfpembayaran') }}" method="GET" target="_blank">
                                    @csrf
    
                                    @method('GET')
                                    <div class="flex items-center">
                                        <div class="relative grid grid-cols-1">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                        </div>
                                        <input name="start" type="date" class="border text-sm rounded-lg block w-full pl-10 p-2.5  bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Select date start">
                                        </div>
                                        <span class="mx-4 text-gray-500">to</span>
                                        <div class="relative grid grid-cols-1">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <input name="end" type="date" class="border text-sm rounded-lg block w-full pl-10 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Select date end">
                                        </div>
                                    </div>

                                    {{-- button print --}}
                                    <button class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Print</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sorting dan tambah pembayaran --}}
                <div class="flex items-center ml-2.5">
                        <!-- Modal tambah toggle -->
                        {{-- <button data-modal-target="modal-pembayaran" data-modal-toggle="modal-pembayaran" class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                            Tambah
                        </button> --}}
                        <!-- Main modal tambah pembayaran -->
                        <div id="modal-pembayaran" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                {{-- <div class="relative rounded-lg shadow bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white" data-modal-hide="modal-pembayaran">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-white">Tambah</h3>

                                        <form class="space-y-6" action="{{ route('transaksi.store') }}" method="POST">
                                            @csrf    
            
                                            @method('POST')
                                            <div>
                                                <label for="perbaikan_id" class="block mb-2 text-sm font-medium text-white">Perbaikan</label>
                                                <select id="perbaikan_id" name="perbaikan_id" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                                    <option selected>Pilih</option>
                                                        @foreach ($repair as $perbaikan)
                                                        <option value="{{ $perbaikan->id }}" data-pelanggan-id="{{ $perbaikan->pelanggan->id }}">{{ $perbaikan->pelanggan->nama_pelanggan }} - {{ $perbaikan->nomor_servis }}- {{ $perbaikan->pelanggan->notelp }} - {{ $perbaikan->tipe_gadget }}</option>
                                                        @endforeach
                                                </select>

                                            </div>
                                            <div>
                                                <label for="tgl_transaksi" class="block mb-2 text-sm font-medium text-white">Tanggal</label>
                                                <input type="date" value="{{ date('Y-m-d') }}" name="tgl_transaksi" id="tgl_transaksi" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required>
                                            </div>
                                            <div>
                                                <label for="harga" class="block mb-2 text-sm font-medium text-white">Biaya</label>
                                                <input type="text" name="harga" id="harga" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required>
                                            </div>
                                            <div>
                                                <label for="status_transaksi" class="block mb-2 text-sm font-medium text-white">Status</label>
                                                <div class="flex">
                                                    <div class="flex items-center mr-4">
                                                        <input id="status_transaksi" type="radio" value="Belum Lunas" name="status_transaksi" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                                        <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-300">belum lunas</label>
                                                    </div>
                                                    <div class="flex items-center mr-4">
                                                        <input id="status_transaksi" type="radio" value="Lunas" name="status_transaksi" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white">
                                                        <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-300">lunas</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <button class="w-full text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Tambah</button>
                                        </form>
                                    </div>
                                </div> --}}
                            </div>
                        </div> 
                    </div>
                </div>
           </div>
           
           <!-- Pembayaran Table -->
           <div class="mt-0.5 mx-4">
               <div class="w-full overflow-hidden rounded-lg shadow-xs">
               <div class="w-full overflow-x-auto">
                   <table class="w-full">
                   <thead>
                       <tr class="text-xs font-semibold tracking-wide text-left uppercase border-b border-gray-700 text-gray-400 bg-gray-800">
                       <th class="px-4 py-3">#</th>
                       <th class="px-4 py-3">Nama Pelanggan</th>
                       <th class="px-4 py-3">Nomor Servis</th>
                       {{-- <th class="px-4 py-3">Tanggal Masuk</th> --}}
                       <th class="px-4 py-3">Tanggal Ambil</th>
                       <th class="px-4 py-3">Jenis Gadget</th>
                       <th class="px-4 py-3">Tipe Gadget</th>
                       <th class="px-4 py-3">Biaya</th>
                       <th class="px-4 py-3">Status</th>
                       </tr>
                   </thead>
                   
                    <tbody class="divide-y divide-gray-700 bg-gray-700">
                        @foreach ($transaksi as $transaction)
                        <tr class="bg-gray-800 hover:bg-gray-900 text-gray-400">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $transaction->pelanggan->nama_pelanggan }}</td>
                        <td class="px-4 py-3">{{ $transaction->repair->nomor_servis }}</td>
                        {{-- <td class="px-4 py-3">{{ $transaction->repair->tanggal_masuk }}</td> --}}
                        <td class="px-4 py-3">{{ $transaction->updated_at }}</td>
                        {{-- <td class="px-4 py-3">{{ date('Y-m-d', strtotime($transaction->updated_at)) }}</td> --}}
                        <td class="px-4 py-3">{{ $transaction->repair->jenis_gadget }}</td>
                        <td class="px-4 py-3">{{ $transaction->repair->tipe_gadget }}</td>
                        <td class="px-4 py-3">Rp. {{ number_format($transaction->harga, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-xs">
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
                       </tr>
                       @endforeach
                   </tbody>
                   </table>
               </div>
               <div class="grid px-4 py-3 text-xs font-semibold tracking-wide uppercase border-t border-gray-700 sm:grid-cols-9 text-gray-400 bg-gray-800">
                   <span class="flex items-center col-span-3"></span>
                   <span class="col-span-2"></span>
                   <!-- Pagination -->
                   <div class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                        {{ $transaksi->links('vendor.pagination.default') }}
                </nav>
               </div>
           </div>
          </div>
       </div>
          
       
       </div>
    </div>

</x-app-layout>