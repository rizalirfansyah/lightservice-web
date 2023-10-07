<title>Light Service | Komentar</title>

<x-app-layout>

@include('home.side-bar')

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg border-gray-700 mt-10">
        <div class="relative items-center justify-center min-h-48 mb-4 rounded bg-gray-800">
         <div class="p-2">
    <h2 class="text-3xl mt-4 items-center text-start ml-8 text-gray-200">Kritik dan saran pelanggan</h2>
    <div class="flex justify-between">

       {{-- Search bar --}}
       <form class="flex items-center pt-4 space-x-1 ml-3">
        <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-32 lg:w-96 md:w-80 sm:w-72">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="search" name="search" id="simple-search" class="border text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  bg-gray-700 border-gray-600 placeholder-gray-400" placeholder="Cari komentar..." required>
            </div>
            <button class="p-1.5 lg:p-2.5 -ml-2 text-sm font-medium rounded-lg border border-blue-700 focus:ring-4 focus:outline-none bg-blue-600 hover:bg-blue-700 focus:ring-blue-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
    </div>

    {{-- Tabel data servis masuk --}}
       <div class="mt-0.5 mx-4">
           <div class="w-full overflow-hidden rounded-lg shadow-xs">
           <div class="w-full overflow-x-auto">
               <table class="w-full">
               <thead>
                   <tr class="text-xs font-semibold tracking-wide text-left uppercase border-b border-gray-700 text-gray-400 bg-gray-800">
                   <th class="px-4 py-3">#</th>
                   <th class="px-4 py-3">Nomor Servis</th>
                   <th class="px-4 py-3">Komentar</th>
                   </tr>
               </thead>
               <tbody class="divide-y divide-gray-700 bg-gray-700">
                @foreach ($repair as $dataservis)
                    
                   <tr class="bg-gray-800 hover:bg-gray-900 text-gray-400">
                   <td class="px-4 py-3 text-sm">{{ $loop->iteration }}</td>
                   <td class="px-4 py-3 text-sm">{{ $dataservis->nomor_servis }}</td>
                   <td class="px-4 py-3 text-sm">{{ $dataservis->comments }}</td>
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