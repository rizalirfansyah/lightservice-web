<!-- Sidebar -->
{{-- <div class="fixed flex flex-col top-0 left-0 w-14 hover:w-64 md:w-64 rounded-xl bg-gray-900 h-screen text-white transition-all duration-300 border-none z-10 sidebar">
    <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
      <ul class="flex flex-col py-4 space-y-1">
        <li class="px-5 hidden md:block">
          <div class="flex flex-row items-center h-8">
            <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
          </div>
        </li>
        <li>
          <a href="{{ route('home.dashboard') }}" class="{{ Route::is('home.dashboard') ? 'relative px-2 py-3 flex items-center space-x-4 rounded-md text-gray-700 bg-gray-50 font-semibold' : 'relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent  hover:border-gray-800 pr-6 active:border-x-gray-800' }}">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
          </a>
        </li>
       
        <li>
          <a href="{{ route('pelanggan.index') }}" class="{{ Route::is('pelanggan.index') ? 'relative px-2 py-3 flex items-center space-x-4 rounded-md text-gray-700 bg-gray-50 font-semibold' : 'relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent  hover:border-gray-800 pr-6 active:border-x-gray-800' }}">
            <span class="inline-flex justify-center items-center ml-4">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
              </svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Pelanggan</span>
          </a>
        </li>

        <li>
          <a href="{{ route('repairs.index') }}" class="{{ Route::is('repairs.index') ? 'relative px-2 py-3 flex items-center space-x-4 rounded-md text-gray-700 bg-gray-50 font-semibold' : 'relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent  hover:border-gray-800 pr-6 active:border-x-gray-800' }}">
            <span class="inline-flex justify-center items-center ml-4">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
              </svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Data servis</span>
          </a>
        </li>

        <li>
          <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-gray-800 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
              </svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Status Pembayaran</span>
          </a>
        </li>

        <li class="px-5 hidden md:block">
          <div class="flex flex-row items-center mt-5 h-8">
            <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Data</div>
          </div>
        </li>

        <li>
          <a href={{ route('home.report') }} class="{{ Route::is('home.report') ? 'relative px-2 py-3 flex items-center space-x-4 rounded-md text-gray-700 bg-gray-50 font-semibold' : 'relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent  hover:border-gray-800 pr-6 active:border-x-gray-800' }}">
            <span class="inline-flex justify-center items-center ml-4">
              <i class="fa fa-money" style="font-size:18px"></i>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Laporan</span>
          </a>
        </li>
        <li>
          <a href="{{ route('home.data-pegawai') }}" class="{{ Route::is('home.data-pegawai') ? 'relative px-2 py-3 flex items-center space-x-4 rounded-md text-gray-700 bg-gray-50 font-semibold' : 'relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent  hover:border-gray-800 pr-6 active:border-x-gray-800' }}">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Data Pegawai</span>
          </a>
        </li>
      </ul>
    </div>
  </div> --}}
  <!-- ./Sidebar -->
