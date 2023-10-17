<title>Light Service | Input Servis</title>

<x-app-layout>

@include('home.side-bar')

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg border-gray-700 mt-10">
        <div class="relative items-center min-h-48 mb-4 rounded bg-gray-800">
         <div class="p-2 w-2/3 mx-auto">
            <h2 class="text-3xl mt-4 items-center text-start ml-4 mb-5 text-gray-200">Input Servis</h2>
            <div class="justify-between ml-4 mr-4">
                <form class="space-y-6" action="{{ route('repairs.store') }}" method="POST">
                    @csrf

                    @method('POST')
                    <div class="mb-6">
                        <label for="pelanggan_id" class="block mb-2 text-sm font-medium text-white">Pilih nama pelanggan</label>
                        <div class="flex justify-items-center">
                            <select id="pelanggan_id" name="pelanggan_id" class="select2 text-sm rounded-lg block w-96 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                <option selected disabled class="select2 text-white text-sm rounded-lg block w-96 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500">Pilih</option>
                                @foreach ($pelanggan->reverse() as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->nama_pelanggan }} - No.telp {{ $customer->notelp }}</option>
                                @endforeach
                            </select>
                            <a href="{{ route('pelanggan.index') }}" class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 lg:py-2.5 h-10 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 ml-2">Tambah Pelanggan</a>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="jenis_gadget" class="block mb-2 text-sm font-medium text-white">Jenis Gadget</label>
                            <div class="lg:flex sm:grid">
                                <div class="flex items-center mr-4">
                                    <input id="jenis_gadget_iphone" type="radio" value="iPhone" name="jenis_gadget" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                                    <label for="jenis_gadget_iphone" class="ml-1 text-sm font-medium text-gray-300">iPhone</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="jenis_gadget_android" type="radio" value="Android" name="jenis_gadget" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-6000">
                                    <label for="jenis_gadget_android" class="ml-1 text-sm font-medium text-gray-300">Android</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="jenis_gadget_macbook" type="radio" value="MacBook" name="jenis_gadget" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-6000">
                                    <label for="jenis_gadget_macbook" class="ml-1 text-sm font-medium text-gray-300">MacBook</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="jenis_gadget_laptop" type="radio" value="Laptop" name="jenis_gadget" class="w-4 h-4 text-blue-600 focus:ring-blue-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-6000">
                                    <label for="jenis_gadget_laptop" class="ml-1 text-sm font-medium text-gray-300">Laptop</label>
                                </div>
                            </div>
                    </div>
                    <div class="mb-6">
                        <label for="tipe_gadget" class="block mb-2 text-sm font-medium text-white">Tipe Gadget</label>
                        <input type="text" name="tipe_gadget" id="tipe_gadget" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Contoh : iPhone 7" pattern="^[a-zA-Z0-9\s]+$" required>
                    </div>
                    <div class="relative max-w-sm">
                        <label for="tanggal_masuk" class="block mb-2 text-sm font-medium text-gray-300">Tanggal Masuk</label>
                        <input type="datetime-local" value="{{ date('Y-m-d\TH:i') }}" name="tanggal_masuk" id="tanggal_masuk" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" required>
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
                    <div class="mb-6">
                        <label for="kelengkapan" class="block mb-2 text-sm font-medium text-white">Kelengkapan</label>
                        <input type="text" name="kelengkapan" id="kelengkapan" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Contoh : Unit dan charger" pattern="^[a-zA-Z0-9\s]+$" required>
                    </div>
                    <div class="relative max-w-sm">
                        <label for="kerusakan" class="block mb-2 text-sm font-medium text-white">Kerusakan</label>
                        <select id="kerusakan" name="kerusakan" class="select2 text-sm rounded-lg block w-96 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                            <option selected disabled class="select2 text-white text-sm rounded-lg block w-96 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500">Pilih</option>
                            <option value="replacement">Replacement</option>
                            <option value="jasa">Jasa</option>
                            <option value="dll">Dll</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="password_device" class="block mb-2 text-sm font-medium text-white">Password Device</label>
                        <input type="text" name="password_device" id="password_device" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Contoh : lightservice123, atau 12345" pattern="^[a-zA-Z0-9\s]+$" required>
                    </div>
                    <div class="relative max-w-sm">
                        <label for="garansi" class="block mb-2 text-sm font-medium text-white">Garansi</label>
                        <select id="garansi" name="garansi" required class="select2 text-sm rounded-lg block w-96 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                            <option selected disabled class="select2 text-white text-sm rounded-lg block w-96 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500">Pilih</option>
                            <option value="3">3 Hari</option>
                            <option value="7">7 Hari</option>
                            <option value="30">30 Hari</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 w-28 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </div>
                </form>
            </div>
</div>

</x-app-layout>