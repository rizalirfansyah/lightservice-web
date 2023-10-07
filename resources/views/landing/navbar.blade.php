<!-- navbar -->
<section>
    <div class="navbar bg-slate-700 text-slate-400 fixed w-full z-20 top-0 left-0">
        <div class="navbar-start">
          <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
              <li><a href="/">Check Status</a></li>
              <li tabindex="0">
                <a href="login" class="justify-between">
                  Login
                </a>
              </li>
              <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
            </ul>
          </div>
          <a href="" class="btn btn-ghost normal-case hover:bg-slate-500 text-xl text-white"><span class="text-[#FCE22A]">Light</span> Service</a>
        </div>
        <div class="navbar-end hidden lg:flex">
          <ul class="menu menu-horizontal px-1">
            <li><a href="/">Check Status</a></li>
            <li tabindex="0">
              {{-- @if (Route::has('login'))
                @auth --}}
                  {{-- <a href="{{ url('/dashboard') }}" class="text-md">Dashboard</a> --}}
                {{-- @else --}}
                  <a href="{{ route('login') }}" class="text-md">Log in</a>
                {{-- @endauth
              @endif --}}
            </li>
            <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </section>