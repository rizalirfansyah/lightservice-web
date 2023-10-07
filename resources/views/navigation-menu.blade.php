<nav class="fixed top-0 z-50 w-full border-b bg-gray-800 border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm rounded-lg sm:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
           </button>
          <a href="#" class="flex ml-2 md:mr-24">
            {{-- <img src="img/logoweb.png" class="h-8 mr-3" /> --}}
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white"><span class="text-[#FCE22A]">Light</span>Service</span>
          </a>
        </div>
        <div class="flex items-center">
            <div class="flex items-center ml-3">
              <div class="avatar placeholder">
                <button type="button" class="bg-neutral-focus text-neutral-content rounded-full w-16" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <span class="sr-only text-xl">Open user menu</span>
                  {{ Auth::user()->name }}
                </button>
              </div>
              <div class="z-50 hidden my-4 text-base list-none divide-y rounded shadow bg-gray-700 divide-gray-600" id="dropdown-user">
                <div class="px-4 py-3" role="none">
                  <p class="text-sm text-white" role="none">
                    {{ Auth::user()->name }}
                  </p>
                  <p class="text-sm font-medium truncate text-gray-300" role="none">
                    {{ Auth::user()->email }}
                  </p>
                </div>
                <ul class="py-1" role="none">
                  <li>
                    <x-responsive-nav-link href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-white hover:bg-gray-600 hover:text-white" role="menuitem">Settings</x-responsive-nav-link>
                  </li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                    
                        <x-responsive-nav-link href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-white hover:bg-gray-600 hover:text-white"
                                       @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>
      </div>
    </div>
  </nav>

  {{-- sidebar --}}
  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full border-r sm:translate-x-0 bg-gray-800 border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-autobg-gray-800">
       <ul class="space-y-2 font-medium">
          @if(Auth::user()->is_admin == 1)
          <li>
             <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? 'flex items-center p-2 rounded-lg text-white bg-gray-700' : 'flex items-center p-2 rounded-lg text-white hover:bg-gray-700' }}">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                <span class="ml-3">Dashboard</span>
             </a>
          </li>
          @endif
          <li>
             <a href="{{ route('repairs.create') }}" class="{{ Route::is('repairs.create') ? 'flex items-center p-2 rounded-lg text-white bg-gray-700' : 'flex items-center p-2 rounded-lg text-white hover:bg-gray-700' }}">
               <i class="fa fa-wrench" aria-hidden="true" style="filter:brightness(60%)"></i>
                <span class="flex-1 ml-3 whitespace-nowrap">Input Servis</span>
             </a>
          </li>
          <li>
             <a href="{{ route('pelanggan.index') }}" class="{{ Route::is('pelanggan.index') ? 'flex items-center p-2 rounded-lg text-white bg-gray-700' : 'flex items-center p-2 rounded-lg text-white hover:bg-gray-700' }}">
               <i class="fa fa-users" aria-hidden="true" style="filter:brightness(60%)"></i>
                <span class="flex-1 ml-3 whitespace-nowrap">Pelanggan</span>
             </a>
          </li>
          <li>
             <a href="{{ route('repairs.index') }}" class="{{ Route::is('repairs.index') ? 'flex items-center p-2 rounded-lg text-white bg-gray-700' : 'flex items-center p-2 rounded-lg text-white hover:bg-gray-700' }}">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Data servis</span>
             </a>
          </li>
          <li>
            <a href="{{ route('transaksi.index') }}" class="{{ Route::is('transaksi.index') ? 'flex items-center p-2 rounded-lg text-white bg-gray-700' : 'flex items-center p-2 rounded-lg text-white hover:bg-gray-700' }}">
              <i class="fa fa-credit-card" style="font-size:18px; filter:brightness(60%)"></i>
               <span class="flex-1 ml-3 whitespace-nowrap">Tagihan</span>
            </a>
         </li>
         @if(Auth::user()->is_admin == 1)
          <li>
            <a href="{{ route('home.pembayaran') }}" class="{{ Route::is('home.pembayaran') ? 'flex items-center p-2 rounded-lg text-white bg-gray-700' : 'flex items-center p-2 rounded-lg text-white hover:bg-gray-700' }}">
              <i class="fa fa-money" style="font-size:18px; filter:brightness(60%)"></i>
               <span class="flex-1 ml-3 whitespace-nowrap">Pembayaran</span>
            </a>
         </li>
         @endif
         {{-- @can('is_admin')
         <li>
          <a href="{{ route('home.report') }}" class="{{ Route::is('home.report') ? 'flex items-center p-2 rounded-lg text-white bg-gray-700' : 'flex items-center p-2 rounded-lg text-white hover:bg-gray-700' }}">
             <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
             <span class="flex-1 ml-3 whitespace-nowrap">Pendapatan</span>
          </a>
          </li>
          @endcan --}}
          @if(Auth::user()->is_admin == 1)
          <li>
             <a href="{{ route('users.index') }}" class="{{ Route::is('users.index') ? 'flex items-center p-2 rounded-lg text-white bg-gray-700' : 'flex items-center p-2 rounded-lg text-white hover:bg-gray-700' }}">
               <i class="fa fa-user" aria-hidden="true" style="filter:brightness(60%)"></i>
                <span class="flex-1 ml-3 whitespace-nowrap">Data pegawai</span>
             </a>
          </li>
          @endif
          @if(Auth::user()->is_admin == 1)
          <li>
             <a href="{{ route('home.komentar') }}" class="{{ Route::is('home.komentar') ? 'flex items-center p-2 rounded-lg text-white bg-gray-700' : 'flex items-center p-2 rounded-lg text-white hover:bg-gray-700' }}">
              <i class="fa fa-comment" style="filter:brightness(60%)"></i>
                <span class="flex-1 ml-3 whitespace-nowrap">Komentar</span>
             </a>
          </li>
          @endif
       </ul>
    </div>
   </aside>