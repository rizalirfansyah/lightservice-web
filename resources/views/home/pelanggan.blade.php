 <title>Light Service | Data Pelanggan</title>

 <x-app-layout>

    @include('home.side-bar')

    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg border-gray-700 mt-10">
           <div class="relative items-center justify-center min-h-48 mb-4 rounded bg-gray-800">
            <div class="p-2">
            <h2 class="text-3xl mt-4 items-center text-start text-gray-200 ml-8">Data Pelanggan</h2>
            <div class="flex justify-between">
            {{-- Search bar --}}
                <form action="{{ route('pelanggan.index') }}" method="GET" class="flex items-center pt-4 space-x-1 ml-3">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-32 lg:w-96 md:w-80 sm:w-40">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input type="search" id="simple-search" name="search" class="text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" placeholder="Cari pelanggan..." required>
                    </div>

                    <button class="p-1.5 lg:p-2.5 -ml-2 text-sm font-medium text-white rounded-lg border border-blue-700  focus:ring-4 focus:outline-none bg-blue-600 hover:bg-blue-700 focus:ring-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <span class="sr-only">Search</span>
                    </button>

                </form>
    
                {{-- Sorting dan tambah pelanggan --}}
                <div class="flex items-center mr-5 ml-2.5">
                    
                <!-- Modal tambah toggle -->
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                    Tambah
                </button>
                <!-- Main modal tambah pelanggan -->
                <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                    <div class="relative w-full h-full max-w-md md:h-auto">
                        <!-- Modal content -->
                        <div class="relative rounded-lg shadow bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white" data-modal-hide="authentication-modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-white">Input Tambah Pelanggan</h3>
                                <form class="space-y-6" action="{{ route('pelanggan.store') }}" method="POST">
                                    @csrf
    
                                    @method('POST')
                                    <div>
                                        <label for="nama_pelanggan" class="block mb-2 text-sm font-medium text-white">Nama Pelanggan</label>
                                        <input type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="Contoh: fulan" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required>
                                    </div>
                                    <div>
                                        <label for="email" class="block mb-2 text-sm font-medium text-white">Email Pelanggan</label>
                                        <input type="email" name="email" id="email" placeholder="Contoh: fulan@gmail.com" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required>
                                    </div>
                                    <div>
                                        <label for="notelp" class="block mb-2 text-sm font-medium  text-white">No Telepon</label>
                                        <input type="number" name="notelp" id="notelp" placeholder="0812-3456-7890" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required>
                                        @error('notelp')
                                            <span class="text-red-100">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="alamat" class="block mb-2 text-sm font-medium text-white">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required>
                                    </div>
                                    
                                    <button class="w-full text-white focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
                </div>
            </div>
            
            
            
            <!-- Pelanggan Table -->
            <div class="mt-0.5 mx-4">
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left uppercase border-b border-gray-700 text-gray-400 bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nama Pelanggan</th>
                        <th class="px-4 py-3">Telepon</th>
                        <th class="px-4 py-3">Chat</th>
                        <th class="px-4 py-3">Alamat</th>
                        <th class="px-4 py-3">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody class=" divide-y divide-gray-700 bg-gray-800">
                        @foreach ($pelanggan as $index => $customer)
                        
                        <tr class="bg-gray-800 hover:bg-gray-900 text-gray-400">
                        <td class="px-4 py-3 text-sm">{{ $loop->index + $pelanggan->firstItem() }}</td>
                        <td class="px-4 py-3 text-sm">{{ $customer->nama_pelanggan }}</td>
                        <td class="px-4 py-3 text-sm">{{ $customer->notelp }}</td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('redirect.whatsapp', ['phoneNumber' => $customer->notelp]) }}" target="_blank" class="relative inline-flex transititext-primary text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 text-primary-400 hover:text-primary-500 focus:text-primary-500 active:text-primary-600" data-te-toggle="tooltip" title="whatsapp">
                                <img src="img/homeicon/whatsapp.svg" alt="" class="w-5 h-5">
                            </a>
                        </td>
                        <td class="px-4 py-3 text-sm">{{ $customer->alamat }}</td>
                        <td class="px-4 py-4">
                            <div class="w-1 items-center flex justify-center">
    
                                {{-- button modal ubah data --}}
                                <button data-modal-target="#edit-cust-modal{{ $customer->id }}" data-modal-toggle="edit-cust-modal{{ $customer->id }}" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm rounded-lg text-sm px-2 py-2 text-center">
                                <svg class="h-4 w-4 text-white"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg>Ubah</button>
                                <!-- Main modal ubah data pelanggan -->
                                <div id="edit-cust-modal{{ $customer->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                <div class="relative w-full h-full max-w-md md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative rounded-lg shadow bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white" data-modal-hide="edit-cust-modal{{ $customer->id }}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        
                                        <div class="px-6 py-6 lg:px-8">
                                            <h3 class="mb-4 text-xl font-medium text-white">Edit Data Pelanggan</h3>
                                            <form class="space-y-6" action="{{ route('pelanggan.update', $customer->id) }}" method="POST">
                                                @csrf
    
                                                @method('PUT')
                                                <div>
                                                    <label for="nama_pelanggan" class="block mb-2 text-sm font-medium text-white">Nama Pelanggan</label>
                                                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ old('nama_pelanggan', $customer->nama_pelanggan) }}">
                                                </div>
                                                <div>
                                                    <label for="notelp" class="block mb-2 text-sm font-medium text-white">No Telepon</label>
                                                    <input type="number" name="notelp" id="notelp" placeholder="08xx-xxxx-xxxx" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ old('notelp', $customer->notelp) }}">
                                                    @error('notelp')
                                                    <span class="text-red-100">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div>
                                                    <label for="alamat" class="block mb-2 text-sm font-medium text-white">Alamat</label>
                                                    <input type="text" name="alamat" id="alamat" placeholder="Jalan Ketintang, Surabaya" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required value="{{ old('alamat', $customer->alamat) }}">
                                                </div>
                                                
                                                <button class="w-full text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="w-1 items-center 2xl:flex">
    
                                {{-- buton modal hapus data --}}
                                <button data-modal-target="#hapus-cust-modal{{ $customer->id }}" data-modal-toggle="hapus-cust-modal{{ $customer->id }}" class="flex items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm rounded-lg text-sm px-2 py-2 ml-2 text-center">
                                <svg class="h-4 w-4 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                Hapus</button>
                                <!-- Main modal hapus data pelanggan -->
                                <div id="hapus-cust-modal{{ $customer->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative rounded-lg shadow bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white" data-modal-hide="hapus-cust-modal{{ $customer->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class="mb-4 text-xl font-medium text-center text-white">Anda yakin ingin menghapus?</h3>
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <div class="flex items-center justify-center space-x-2">
                                                    <form action="{{ route('pelanggan.destroy', $customer->id ) }}" method="POST">
                                                        @csrf
                                                        
                                                        @method('delete')
                                                        <button class="mt-4 ml-1 px-2 py-2 text-white focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm text-center bg-red-600 hover:bg-red-700 focus:ring-red-800">Hapus</button>
                                                    </form>
                                                    <button class="ml-1 px-2 py-2 text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800" data-modal-hide="hapus-cust-modal{{ $customer->id }}">Kembali</button>
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
                {{-- pagination --}}
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide uppercase border-t border-gray-700 sm:grid-cols-9 text-gray-400 divide-gray-700 bg-gray-800">
                    <span class="flex items-center col-span-3"></span>
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <div class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                        {{ $pelanggan->links('vendor.pagination.default') }}
                        </nav>
                    </div>
                </div>
                </div>
            </div>
           </div>
        </div>
           
        
        </div>
     </div>

</x-app-layout>