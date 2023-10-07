<title>Light Service | Tagihan</title>

<x-app-layout>

   @include('home.side-bar')

   <div class="p-4 sm:ml-64">
       <div class="p-4 rounded-lg border-gray-700 mt-10">
          <div class="relative items-center justify-center min-h-48 mb-4 rounded bg-gray-800">
           <div class="p-2">
           <h2 class="text-3xl mt-4 items-center text-start text-gray-200 ml-8">Tagihan</h2>
           <div class="flex justify-between">
           {{-- Search bar --}}
               <form class="flex items-center pt-4 space-x-1 ml-3">
                   <label for="simple-search" class="sr-only">Search</label>
                   <div class="relative w-32 lg:w-96 md:w-80 sm:w-40">
                       <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                           <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                       </div>
                       <input type="search" name="search" id="simple-search" class="text-sm rounded-lg block w-full pl-10 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Cari data tagihan..." required>
                   </div>
                   <button class="p-1.5 lg:p-2.5 -ml-2 text-sm font-medium text-white rounded-lg border border-blue-700  focus:ring-4 focus:outline-none bg-blue-600 hover:bg-blue-700 focus:ring-blue-600">
                       <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                       <span class="sr-only">Search</span>
                   </button>
               </form>
   
               {{-- Sorting dan tambah invoice --}}
               <div class="flex items-center mr-5 ml-2.5">
                   
               <!-- Modal tambah toggle -->
               <button data-modal-target="invoice-modal" data-modal-toggle="invoice-modal" class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                   Tambah
               </button>
               <!-- Main modal tambah invoice -->
               <div id="invoice-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                   <div class="relative w-full h-full max-w-md md:h-auto">
                       <!-- Modal content -->
                       <div class="relative rounded-lg shadow bg-gray-700">
                           <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white" data-modal-hide="invoice-modal">
                               <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                               <span class="sr-only">Close modal</span>
                           </button>

                           <div class="px-6 py-6 lg:px-8">
                               <h3 class="mb-4 text-xl font-medium text-white">Input Tagihan</h3>

                               <form class="space-y-6" action="{{ route('transaksi.store') }}" method="POST">
                                   @csrf
   
                                   @method('POST')
                                   <div>
                                    <label for="perbaikan_id" class="block mb-2 text-sm font-medium text-white">Perbaikan</label>
                                    <select id="perbaikan_id" name="perbaikan_id" class="select2 w-80 border text-sm rounded-lg block p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                        <option selected disabled>Pilih</option>
                                        @foreach ($repair->reverse() as $perbaikan)
                                        <option value="{{ $perbaikan->id }}" data-pelanggan-id="{{ $perbaikan->pelanggan->id }}">{{ $perbaikan->pelanggan->nama_pelanggan }} - {{ $perbaikan->nomor_servis }} - {{ $perbaikan->tanggal_masuk }} - {{ $perbaikan->tipe_gadget }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" id="pelanggan_id" name="pelanggan_id" value="">
                                   </div>
                                   <div>
                                        <label for="harga" class="block mb-2 text-sm font-medium text-white">Biaya</label>
                                        <div class="flex">
                                        <h2 class="mt-2 mr-2">Rp.</h2>
                                        <input type="text" name="harga" id="harga" placeholder="Contoh = 250000" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white"  required>
                                        {{-- oninput="formatCurrency(this)"  --}}
                                        </div>
                                   </div>
                                   <div hidden>
                                    <label for="status_transaksi" class="block mb-2 text-sm font-medium text-white">Status</label>
                                    <div class="flex">
                                        <div class="flex items-center mr-4">
                                            <input id="status_transaksi" type="radio" value="Belum Lunas" name="status_transaksi" class="w-4 h-4 text-blue-600  focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" checked>
                                            <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-300">Belum lunas</label>
                                        </div>
                                    </div>
                                    </div>
                                   
                                   <button class="w-full text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Simpan</button>
                               </form>
                           </div>
                       </div>
                   </div>
               </div> 
               </div>
           </div>
           
           
           <!-- Tagihan Table -->
           <div class="mt-0.5 mx-4">
               <div class="w-full overflow-hidden rounded-lg shadow-xs">
               <div class="w-full overflow-x-auto">
                   <table class="w-full">
                   <thead>
                       <tr class="text-xs font-semibold tracking-wide text-left uppercase border-b border-gray-700 text-gray-400 bg-gray-800">
                       <th class="px-8 py-3">#</th>
                       <th class="px-8 py-3">Nama Pelanggan</th>
                       <th class="px-8 py-3">Nomor Servis</th>
                       <th class="px-8 py-3">Tanggal Terima</th>
                       <th class="px-8 py-3">Tanggal Selesai</th>
                       <th class="px-8 py-3">Jenis Gadget</th>
                       <th class="px-8 py-3">Tipe Gadget</th>
                       <th class="px-8 py-3">Kerusakan</th>
                       <th class="px-12 py-3 text-center">Biaya</th>
                       <th class="px-8 py-3 text-center">Status</th>
                       <th class="px-8 py-3 text-center">Aksi</th>
                       </tr>
                   </thead>
                   
                    <tbody class="divide-y divide-gray-700 bg-gray-700">
                        @foreach ($transaksi as $transaction)
                        <tr class="bg-gray-800 hover:bg-gray-900 text-gray-400">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $transaction->pelanggan->nama_pelanggan }}</td>
                        <td class="px-4 py-3">{{ $transaction->repair->nomor_servis }}</td>
                        <td class="px-4 py-3">{{ $transaction->repair->tanggal_masuk }}</td>
                        <td class="px-4 py-3">{{ $transaction->created_at }}</td>
                        <td class="px-4 py-3">{{ $transaction->repair->jenis_gadget }}</td>
                        <td class="px-4 py-3">{{ $transaction->repair->tipe_gadget }}</td>
                        <td class="px-4 py-3">{{ $transaction->repair->kerusakan }}</td>
                        <td class="px-4 py-3">Rp. {{ number_format($transaction->harga, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-xs">
                            <span class="px-1 py-1 flex font-semibold leading-tight text-center rounded-xl" 
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

                        
                        <td class="px-24 py-3 mr-12 text-xs flex w-10 justify-center">

                            <!-- Modal edit toggle -->
                            <button data-modal-target="edit-data-servis{{ $transaction->id }}" data-modal-toggle="edit-data-servis{{ $transaction->id }}" class="flex items-center justify-center my-7 text-gray-100 bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-800 font-sm rounded-lg px-3.5 py-2 text-center mr-2"><svg class="h-4 w-4 text-white"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg>Ubah</button>
                                <!-- Main modal edit data tagihan -->
                                <div id="edit-data-servis{{ $transaction->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                    <div class="relative w-full h-full max-w-md min-h-[20rem]">
                                        <!-- Modal content -->
                                        <div class="relative rounded-lg shadow bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white" data-modal-hide="edit-data-servis{{ $transaction->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class="mb-4 text-xl font-medium text-white">Edit data tagihan</h3>
                                                <form class="space-y-6" action="{{ route('transaksi.update', $transaction->id) }}" method="POST">
                                                    @csrf
                    
                                                    @method('PUT')
                                                    <div>
                                                        <label for="nama_pelanggan" class="block mb-2 text-sm font-medium text-white">Nama Pelanggan</label>
                                                        <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" disabled value="{{ $transaction->pelanggan->nama_pelanggan }}">
                                                    </div>
                                                    <div>
                                                        <label for="nomor_servis" class="block mb-2 text-sm font-medium text-white">Nomor Servis</label>
                                                        <input type="text" name="nomor_servis" id="nomor_servis" placeholder="0812-3456-7890" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" disabled value="{{ $transaction->repair->nomor_servis }}">
                                                    </div>
                                                    {{-- <div hidden>
                                                        <label for="tgl_transaksi" class="block mb-2 text-sm font-medium text-white">Tanggal Masuk</label>
                                                        <input type="date" name="tgl_transaksi" id="tgl_transaksi" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" disabled value="{{ $transaction->tgl_transaksi }}">
                                                    </div>
                                                    <div hidden>
                                                        <label for="tgl_ambil" class="block mb-2 text-sm font-medium text-white">Tanggal Ambil</label>
                                                        <input type="date" name="tgl_ambil" id="tgl_ambil" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" disabled value="{{ $transaction->tgl_ambil }}">
                                                    </div> --}}
                                                    <div>
                                                        <label for="jenis_gadget" class="block mb-2 text-sm font-medium text-white">Jenis Gadget</label>
                                                        <input type="text" name="jenis_gadget" id="jenis_gadget" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" disabled value="{{ $transaction->repair->jenis_gadget }}">
                                                    </div>
                                                    <div>
                                                        <label for="tipe_gadget" class="block mb-2 text-sm font-medium text-white">Tipe Gadget</label>
                                                        <input type="text" name="tipe_gadget" id="tipe_gadget" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" disabled value="{{ $transaction->repair->tipe_gadget }}">
                                                    </div>
                                                    <div>
                                                        <label for="harga" class="block mb-2 text-sm font-medium text-white">Biaya</label>
                                                        <input type="text" name="harga" id="harga" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ $transaction->harga }}">
                                                    </div>
                                                    <div>
                                                        <label for="status_transaksi" class="block mb-2 text-sm font-medium text-white">Status Transaksi</label>
                                                        <div class="flex">
                                                            <div class="flex items-center mr-4">
                                                            <input type="radio" name="status_transaksi" value="Belum Lunas" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" @if(old('status_transaksi', $transaction->id === $transaction->id && $transaction->status_transaksi === 'Belum Lunas')) checked @endif>
                                                            <label for="status_transaksi" id="status_transaksi" class="ml-2 text-sm font-medium text-gray-300">Belum Lunas</label>
                                                            </div>
                
                                                            <div class="flex items-center mr-4">
                                                            <input type="radio" name="status_transaksi" value="Lunas" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" @if(old('status_transaksi', $transaction->id === $transaction->id && $transaction->status_transaksi === 'Lunas')) checked @endif>
                                                            <label for="status_transaksi" id="status_transaksi" class="ml-2 text-sm font-medium text-gray-300">Lunas</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <button class="w-full text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                {{-- button print --}}
                                <a href="{{ route('cetaknota.pdf', $transaction->id) }}" target="_blank" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-800 font-medium rounded-lg text-sm px-2 py-2 h-8 text-center mt-7" title="print nota">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                </a>

                                <div class="w-1 items-center flex">
                                {{-- buton modal hapus data --}}
                                <button data-modal-target="#hapus-cust-modal{{ $transaction->id }}" data-modal-toggle="hapus-cust-modal{{ $transaction->id }}" class="flex items-center justify-center text-gray-100 bg-gradient-to-br from-gray-300 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-800 font-sm rounded-lg px-3 py-2 text-center ml-2"><svg class="h-4 w-4 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="15" y1="9" x2="9" y2="15" />  <line x1="9" y1="9" x2="15" y2="15" /></svg>Hapus</button>
                                <!-- Main modal hapus data pelanggan -->
                                    <div id="hapus-cust-modal{{ $transaction->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                        <div class="relative w-full h-full max-w-md md:h-auto">
                                            <!-- Modal content -->
                                            <div class="relative rounded-lg shadow bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white" data-modal-hide="hapus-cust-modal{{ $transaction->id }}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                
                                                <div class="px-6 py-6 lg:px-8">
                                                    <h3 class="mb-4 text-xl font-medium text-white text-center">Anda yakin ingin menghapus?</h3>
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    <div class="flex items-center justify-center space-x-2">
                                                        <form action="{{ route('transaksi.destroy', $transaction->id ) }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="mt-3 ml-1 px-2 py-2 text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm text-center bg-red-600 hover:bg-red-700 focus:ring-red-800">Hapus</button>
                                                        </form>
                                                        <button class="ml-1 px-2 py-2 text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800" data-modal-hide="hapus-cust-modal{{ $transaction->id }}">Kembali</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                            <nav aria-label="Table navigation">
                                    {{ $transaksi->links('vendor.pagination.default') }}
                            </nav>
                    </span>
                </div>
               </div>
           </div>
          </div>
       </div>
          
       
       </div>
    </div>
</x-app-layout>