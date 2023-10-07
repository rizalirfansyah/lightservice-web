<title>Light Service | Terima Servis</title>

<x-app-layout>

@include('home.side-bar')

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg border-gray-700 mt-10">
        <div class="relative items-center justify-center min-h-48 mb-4 rounded bg-gray-800">
         <div class="p-2">
    <h2 class="text-3xl mt-4 items-center text-start ml-8 text-gray-200">Data Servis</h2>
    <div class="flex justify-between">
        {{-- Search bar --}}
        <form class="flex items-center pt-4 space-x-1 ml-3">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-32 lg:w-96 md:w-80 sm:w-40">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="search" name="search" id="simple-search" class="border text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  bg-gray-700 border-gray-600 placeholder-gray-400" placeholder="Cari data servis..." required>
            </div>
            <button class="p-1.5 lg:p-2.5 -ml-2 text-sm font-medium rounded-lg border border-blue-700  focus:ring-4 focus:outline-none bg-blue-600 hover:bg-blue-700 focus:ring-blue-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
    
        {{-- tambah data servis --}}
        <div class="flex items-center mr-5 ml-2.5">
            
            <!-- toggle Modal tambah data servis  -->
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 ml-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                Tambah
            </button>
            <!-- Main modal tambah data servis -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true" data-modal-placement="top-center" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full items-center justify-center">
                <div class="relative w-full 2xl:h-full max-w-md md:h-auto min-h-[40rem] mt-28">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-gray-700 max-h-[calc(100vh-20rem)">
                        <button type="button" class="absolute top-3 right-2.5 z-10 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white" data-modal-hide="authentication-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-white">Input tambah data servis</h3>
                            
                            <form class="space-y-6" action="{{ route('repairs.store') }}" method="POST">
                                @csrf

                                @method('POST')
                                <div>
                                    <label for="pelanggan_id" class="block mb-2 text-sm font-medium text-white">Pilih nama pelanggan</label>
                                    <select id="pelanggan_id" name="pelanggan_id" class="select2 w-80 border text-sm rounded-lg block p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                    <option selected disabled>Pilih pemilik</option>
                                        @foreach ($pelanggan->reverse() as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->nama_pelanggan }} - No.telp {{ $customer->notelp }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                   <label for="jenis_gadget" class="block mb-2 text-sm font-medium text-white">Jenis Gadget</label>
                                    <div class="lg:flex sm:grid-cols-2">
                                        <div class="flex items-center mr-4">
                                            <input id="jenis_gadget_iphone" type="radio" value="iPhone" name="jenis_gadget" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                            <label for="jenis_gadget_iphone" class="ml-2 text-sm font-medium text-gray-300">iPhone</label>
                                        </div>
                                        <div class="flex items-center mr-4">
                                            <input id="jenis_gadget_android" type="radio" value="Android" name="jenis_gadget" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                            <label for="jenis_gadget_android" class="ml-2 text-sm font-medium text-gray-300">Android</label>
                                        </div>
                                        <div class="flex items-center mr-4">
                                            <input id="jenis_gadget_macbook" type="radio" value="MacBook" name="jenis_gadget" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                            <label for="jenis_gadget_macbook" class="ml-2 text-sm font-medium text-gray-300">MacBook</label>
                                        </div>
                                        <div class="flex items-center mr-4">
                                            <input id="jenis_gadget_laptop" type="radio" value="Laptop" name="jenis_gadget" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                            <label for="jenis_gadget_laptop" class="ml-2 text-sm font-medium text-gray-300">Laptop</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="tipe_gadget" class="block mb-2 text-sm font-medium text-white">Tipe Gadget</label>
                                    <input type="text" name="tipe_gadget" id="tipe_gadget" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" placeholder="Contoh: iP 7 / Samsung A32 / Asus FX505DT" required>
                                </div>
                                <div>
                                    <label for="tanggal_masuk" class="block mb-2 text-sm font-medium text-white">Tanggal masuk</label>
                                    <input type="datetime-local" value="{{ date('Y-m-d\TH:i') }}" name="tanggal_masuk" id="tanggal_masuk" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required>
                                </div>
                                <div class="relative max-w-sm">
                                    <label for="user_id" class="block mb-2 text-sm font-medium text-white">Pilih nama teknisi</label>
                                    <select id="user_id" name="user_id" class="select2 text-sm rounded-lg block w-96 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                        <option selected disabled class="select2 text-white text-sm rounded-lg block w-96 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500">Pilih</option>
                                        @foreach ($users as $teknisi)
                                            <option value="{{ $teknisi->id }}">{{ $teknisi->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="kelengkapan" class="block mb-2 text-sm font-medium text-white">Kelengkapan</label>
                                    <input type="text" name="kelengkapan" id="kelengkapan" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" placeholder="Contoh: unit" required>
                                </div>
                                <div>
                                    <label for="kerusakan" class="block mb-2 text-sm font-medium text-white">Kerusakan</label>
                                    <input type="text" name="kerusakan" id="kerusakan" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" placeholder="Contoh: Ganti IC" required>
                                </div>
                                <div>
                                    <label for="password_device" class="block mb-2 text-sm font-medium text-white">Password Device</label>
                                    <input type="text" name="password_device" id="password_device" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" placeholder="Contoh: lightservice123 / 4679" required>
                                </div>
                                
                                <button class="w-full text-white focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>


    {{-- Tabel data servis masuk --}}
       <div class="mt-0.5 mx-4">
           <div class="w-full overflow-hidden rounded-lg">
           <div class="w-full overflow-x-auto">
               <table class="w-full">
               <thead>
                   <tr class="text-xs font-semibold tracking-wide text-left uppercase border-b border-gray-700 text-gray-400 bg-gray-800">
                   <th class="px-4 py-3">#</th>
                   <th class="px-4 py-3">Nomor Servis</th>
                   <th class="px-4 py-3">Tgl.Terima</th>
                   <th class="px-4 py-3">Pemilik</th>
                   <th class="px-4 py-3">Teknisi</th>
                   <th class="px-4 py-3">Chat</th>
                   <th class="px-4 py-3">Jenis Gadget</th>
                   <th class="px-4 py-3">Tipe gadget</th>
                   <th class="px-4 py-3">Kelengkapan</th>
                   <th class="px-4 py-3">Kerusakan</th>
                   <th class="px-4 py-3">Password Unit</th>
                   <th class="px-4 py-3 text-center">Status</th>
                   <th class="px-4 py-3 text-center">Garansi</th>
                   <th class="px-4 py-3 text-center">Aksi</th>
                   </tr>
               </thead>
               <tbody class="divide-y divide-gray-700 bg-gray-700">
                @foreach ($repair as $index => $dataservis)
                    
                   <tr class="bg-gray-800 hover:bg-gray-900 text-gray-400">
                   <td class="px-4 py-3 text-sm">{{ $loop->index + $repair->firstItem() }}</td>
                   <td class="px-4 py-3 text-sm">{{ $dataservis->nomor_servis }}</td>
                   <td class="px-4 py-3 text-sm">{{ $dataservis->tanggal_masuk }}</td>
                   <td class="px-4 py-3 text-sm">@foreach($dataservis->pelanggan()->get() as $pemilik)
                    {{ $pemilik->nama_pelanggan }}@endforeach</td>
                   <td class="px-4 py-3 text-sm">{{ $dataservis->users->name }}</td>
                   <td class="px-4 py-3 text-sm items-center">
                    @foreach($dataservis->pelanggan()->get() as $pemilik)
                    <div class="px-2 py-2 items-center">
                        <a href="{{ route('redirect.whatsapp', ['phoneNumber' => $pemilik->notelp]) }}" target="_blank" class="relative inline-flex transititext-primary text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 text-primary-400 hover:text-primary-500 focus:text-primary-500 active:text-primary-600" data-te-toggle="tooltip" title="whatsapp">
                            <img src="img/homeicon/whatsapp.svg" alt="" class="w-5 h-5" >
                        </a>
                    </div>
                    @endforeach
                   </td>
                   <td class="px-4 py-3 text-sm">{{ $dataservis->jenis_gadget }}</td>
                   <td class="px-4 py-3 text-sm">{{ $dataservis->tipe_gadget }}</td>
                   <td class="px-4 py-3 text-sm">{{ $dataservis->kelengkapan }}</td>
                   <td class="px-4 py-3 text-sm">{{ $dataservis->kerusakan }}</td>
                   <td class="px-4 py-3 text-sm">{{ $dataservis->password_device }}</td>
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
                   <td class="px-4 py-3 text-sm">30 Hari</td>
                   <td class="px-4 py-3 text-xs flex justify-center">

                    <!-- Modal edit toggle -->
                    <button data-modal-target="edit-data-servis{{ $dataservis->id }}" data-modal-toggle="edit-data-servis{{ $dataservis->id }}" class="flex items-center justify-center my-7 text-gray-100 bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-800 font-sm rounded-lg px-3.5 py-2 text-center mr-2"> <svg class="h-4 w-4 text-white"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg>Ubah</button>
                        <!-- Main modal edit data servis -->
                        <div id="edit-data-servis{{ $dataservis->id }}" data-modal-placement="top" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full 2xl:h-full max-w-md md:h-auto min-h-[40rem]">
                                <!-- Modal content -->
                                <div class="relative rounded-lg shadow bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white" data-modal-hide="edit-data-servis{{ $dataservis->id }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-white">Edit data servis</h3>
                                        <form class="space-y-6" action="{{ route('repairs.update', $dataservis->id) }}" method="POST">
                                            @csrf
            
                                            @method('PUT')
                                            <div>
                                                <label for="nama_pelanggan" class="block mb-2 text-sm font-medium text-white">Pemilik</label>
                                                <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" disabled value="{{ old('nama_pelanggan', $dataservis->pelanggan->nama_pelanggan)}}">
                                            </div>
                                            <div>
                                                <label for="jenis_gadget" class="block mb-2 text-sm font-medium text-white">Jenis Device</label>
                                                 <div class="flex">
                                                     <div class="flex items-center mr-4">
                                                         <input id="jenis_gadget" type="radio" value="iPhone" name="jenis_gadget" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" @if(old('jenis_gadget', $dataservis->id === $dataservis->id && $dataservis->jenis_gadget === 'iPhone')) checked @endif>
                                                         <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-300">iPhone</label>
                                                     </div>
                                                     <div class="flex items-center mr-4">
                                                         <input id="jenis_gadget" type="radio" value="Android" name="jenis_gadget" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" @if(old('jenis_gadget', $dataservis->id === $dataservis->id && $dataservis->jenis_gadget === 'Android')) checked @endif>
                                                         <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-300">Android</label>
                                                     </div>
                                                     <div class="flex items-center mr-4">
                                                         <input id="jenis_gadget" type="radio" value="MacBook" name="jenis_gadget" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" @if(old('jenis_gadget', $dataservis->id === $dataservis->id && $dataservis->jenis_gadget === 'MacBook')) checked @endif>
                                                         <label for="inline-3-radio" class="ml-2 text-sm font-medium text-gray-300">MacBook</label>
                                                     </div>
                                                     <div class="flex items-center mr-4">
                                                         <input id="jenis_gadget" type="radio" value="Laptop" name="jenis_gadget" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" @if(old('jenis_gadget', $dataservis->id === $dataservis->id && $dataservis->jenis_gadget === 'Laptop')) checked @endif>
                                                         <label for="inline-4-radio" class="ml-2 text-sm font-medium text-gray-300">Laptop</label>
                                                     </div>
                                                 </div>
                                             </div>
                                            <div>
                                                <label for="tipe_gadget" class="block mb-2 text-sm font-medium text-white">Tipe Gadget</label>
                                                <input type="text" name="tipe_gadget" id="tipe_gadget" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ old('tipe_gadget', $dataservis->tipe_gadget) }}">
                                            </div>
                                            <div>
                                                <label for="kelengkapan" class="block mb-2 text-sm font-medium text-white">Kelengkapan</label>
                                                <input type="text" name="kelengkapan" id="kelengkapan" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ old('kelengkapan', $dataservis->kelengkapan) }}">
                                            </div>
                                            <div>
                                                <label for="kerusakan" class="block mb-2 text-sm font-medium text-white">Kerusakan</label>
                                                <input type="text" name="kerusakan" id="kerusakan" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ old('kerusakan', $dataservis->kerusakan) }}">
                                            </div>
                                            <div>
                                                <label for="password_device" class="block mb-2 text-sm font-medium text-white">Password device</label>
                                                <input type="text" name="password_device" id="password_device" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ old('password_device', $dataservis->password_device) }}">
                                            </div>
                                            <div>
                                                <label for="status" class="block mb-2 text-sm font-medium text-white">Status</label>
                                                <div class="flex">
                                                    <div class="flex items-center mr-4">
                                                    <input type="radio" name="status" value="daftar" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" @if(old('status', $dataservis->id === $dataservis->id && $dataservis->status === 'daftar')) checked @endif>
                                                    <label for="status" id="status" class="ml-2 text-sm font-medium text-gray-300"> Daftar</label>
                                                    </div>

                                                    <div class="flex items-center mr-4">
                                                    <input type="radio" name="status" value="pengecekan" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" @if(old('status', $dataservis->id === $dataservis->id && $dataservis->status === 'pengecekan')) checked @endif>
                                                    <label for="status" id="status" class="ml-2 text-sm font-medium text-gray-300"> Pengecekan</label>
                                                    </div>

                                                    <div class="flex items-center mr-4">
                                                    <input type="radio" name="status" value="perbaikan" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" @if(old('status', $dataservis->id === $dataservis->id && $dataservis->status === 'perbaikan')) checked @endif>
                                                    <label for="status" id="status" class="ml-2 text-sm font-medium text-gray-300"> Perbaikan</label>
                                                    </div>

                                                    <div class="flex items-center mr-4">
                                                    <input type="radio" name="status" value="selesai" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" @if(old('status', $dataservis->id === $dataservis->id && $dataservis->status === 'selesai')) checked disabled @endif>
                                                    <label for="status" id="status" class="ml-2 text-sm font-medium text-gray-300"> Selesai</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <button class="w-full text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    {{-- modal detail servis --}}
                    <button data-modal-target="detial-data-servis{{ $dataservis->id }}" data-modal-toggle="detial-data-servis{{ $dataservis->id }}" class="flex items-center justify-center my-7 text-white bg-gradient-to-br from-red-400 to-cyan-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-800 font-sm rounded-lg px-3.5 py-2 text-center mr-2">
                        <svg class="h-4 w-4 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="12" y1="8" x2="12.01" y2="8" />  <polyline points="11 12 12 12 12 16 13 16" /></svg>Detail</button>
                    <!-- Main modal edit data servis -->
                    <div id="detial-data-servis{{ $dataservis->id }}" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                        <div class="relative w-full 2xl:h-full max-w-md md:h-auto min-h-[40rem]">
                            <!-- Modal content -->
                            <div class="relative rounded-lg shadow bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white" data-modal-hide="detial-data-servis{{ $dataservis->id }}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-white">Input Detail servis</h3>
                                    <form class="space-y-6" action="{{ route('detail-servis.store',  $dataservis->id) }}" method="POST">
                                        @csrf
        
                                        @method('POST')
                                        <div>
                                            <label for="tanggal_input" class="block mb-2 text-sm font-medium text-white">Tanggal input</label>
                                            <input type="datetime-local" value="{{ date('Y-m-d\TH:i') }}" name="tanggal_input" id="tanggal_input" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required>
                                        </div>
                                        <label for="tanggal_input" class="block mb-2 text-sm font-medium text-white">Input Perbaikan</label>
                                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                            <input type="text" id="perbaikan_servis_id" name="perbaikan_servis_id" hidden value="{{ $dataservis->id }}">
                                            <label for="kerusakan_servis" class="sr-only">Your comment</label>
                                            <textarea id="kerusakan_servis" name="kerusakan_servis" rows="6" maxlength="255"
                                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                                placeholder="" required></textarea>
                                        </div>
                                        
                                        <button class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-500 bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                            Simpan
                                        </button>
                                    </form>

                                    <h3 class="mb-4 text-lg font-medium text-white">Daftar perbaikan</h3>
                                    <div class="overflow-x-auto py-2 px-4 mb-4">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Tanggal
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Perbaikan
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detailServis as $detail)
                                                @if($dataservis->id == $detail->perbaikan_servis_id)
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            {{ $detail->tanggal_input }}
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            {{ $detail->kerusakan_servis }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <form action="{{ route('detail-servis.destroy', $detail->id ) }}" method="POST">
                                                                @csrf
        
                                                                @method('delete')
                                                                <button class="mt-4 ml-1 px-2 py-2 text-white focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm text-center bg-red-600 hover:bg-red-700 focus:ring-red-800">hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                        <form class="space-y-6 mt-1" action="{{ route('repairs.update', $dataservis->id) }}" method="POST">
                            @csrf

                            @method('PUT')
                            <div hidden>
                                <div>
                                    <input hidden type="text" name="nama_pelanggan" id="nama_pelanggan" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ old('nama_pelanggan', $dataservis->pelanggan->nama_pelanggan)}}">
                                </div>
                                <div>
                                    <input hidden type="text" name="jenis_gadget" id="jenis_gadget" placeholder="0812-3456-7890" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ old('jenis_gadget', $dataservis->jenis_gadget) }}">
                                </div>
                                <div>
                                    <input hidden type="text" name="tipe_gadget" id="tipe_gadget" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ old('tipe_gadget', $dataservis->tipe_gadget) }}">
                                </div>
                                <div>
                                    <input hidden type="text" name="kelengkapan" id="kelengkapan" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ old('kelengkapan', $dataservis->kelengkapan) }}">
                                </div>
                                <div>
                                    <input hidden type="text" name="kerusakan" id="kerusakan" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ old('kerusakan', $dataservis->kerusakan) }}">
                                </div>
                                <div>
                                    <input hidden type="text" name="password_device" id="password_device" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ old('password_device', $dataservis->password_device) }}">
                                </div>
                                <div>
                                    <input hidden type="text" name="status" id="status" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="batal">
                                </div>
                                
                            </div>
                            <button class="flex items-center justify-center text-gray-100 bg-gradient-to-br from-gray-300 to-red-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-800 font-sm rounded-lg px-2 py-2 text-center">
                            <svg class="h-4 w-4 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="15" y1="9" x2="9" y2="15" />  <line x1="9" y1="9" x2="15" y2="15" /></svg>Cancel</button>

                        </form>

                        {{-- button print --}}
                        <a href="{{ route('cetakbukti', $dataservis->id) }}" target="_blank" class="ml-2 text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-800 font-medium rounded-lg text-sm px-2 py-2 h-8 text-center mt-7" title="print bukti">
                            <i class="fa fa-print" aria-hidden="true"></i>
                        </a>

                   </td>
                   </tr>
                @endforeach
               </tbody>
               </table>
           </div>
           <div class="grid px-4 py-3 text-xs font-semibold tracking-wide uppercase border-t border-gray-700 sm:grid-cols-9 text-gray-400 divide-gray-700 bg-gray-800">
               <span class="flex items-center col-span-3"></span>
               <span class="col-span-2"></span>
               <!-- Pagination -->
               <div class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                        {{ $repair->links('vendor.pagination.default') }}
                </nav>
               </div>
           </div>
        </div>
       </div>
       <!-- ./Pelanggan Table -->

        </div>
    </div>
</div>


</x-app-layout>