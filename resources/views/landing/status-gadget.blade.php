<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="img/logoweb.png">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Light Service | Check Status</title>
    <script>
      tailwind.config = {
        darkMode:'class',
        theme: {
          extend: {
            spacing: {
              13: '3.25rem',
            },
            fontFamily: {
              inter: ['Inter']
            },
            colors: {
              ralzy: '#bada55',
              kopi: '#c0ffee',
            },
            animation: {
              'spin-slow': "spin 3s linear infinite",
              'goyang': "goyang 1s ease-in-out infinite",
            },
            keyframes: {
              goyang: {
                '0%, 100%' : { transform: 'rotate (-3deg)'},
                '50%': {transform: 'rotate(3deg)'},
              }
            }
          }
        }
      };
    </script>
</head>
<body>

  @include('landing.navbar')

    <!-- Content -->
    <div class="relative flex items-center justify-center min-h-screen">
      <div class="absolute block top-28">
        <h2 class="font-semibold text-2xl">Timeline</h2>
      </div>
      
      @foreach($repair as $item)
      <ol class="relative border-l border-gray-700 text-gray-400 mt-36 space-y-14 w-96"> 
  
          <li class="{{ $item->status==='daftar' || $item->status==='pengecekan' || $item->status==='perbaikan' || $item->status==='selesai' ? 'mb-14 ml-6' : 'hidden' }}">
              <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
            </span>
              <h3 class="ml-2 font-medium text-xl leading-tight">Proses Daftar Gadget</h3>
              <p class="ml-2 text-lg">Gadget anda proses registrasi oleh admin dan telah masuk antrian</p>
          </li>
       
          <li class="{{ $item->status==='selesai' || $item->status==='pengecekan' || $item->status==='perbaikan' ? 'mb-14 ml-6' : 'hidden' }}">
              <span class="absolute flex items-center justify-center w-8 h-8 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-400 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
              </span>
              <h3 class="ml-2 font-medium text-xl leading-tight">Proses Pengecekan Gadget</h3>
              <p class="ml-2 text-lg">Gadget anda dalam proses pengecekan oleh teknisi</p>
          </li>
      
          <li class="{{ $item->status==='selesai' || $item->status==='perbaikan' ? 'mb-14 ml-6' : 'hidden' }}">
              <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
              </span>
              <h3 class="ml-2 font-medium text-xl leading-tight">Proses Perbaikan Gadget</h3>
              <p class="ml-2 text-lg">Gadget anda dalam proses perbaikan</p>
          </li>

          <li class="{{ $item->status==='selesai' ? 'mb-14 ml-6' : 'hidden' }}">
              <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
              </span>
              <h3 class="ml-2 font-medium text-xl leading-tight">Selesai</h3>
              <p class="ml-2 text-lg">Gadget anda telah selesai diperbaiki oleh pihak LightService</p>
          </li>

          <div class="{{ $item->status==='batal' ? 'mb-14 ml-6' : 'hidden' }}">
            <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
            </span>
            <h3 class="ml-2 font-medium text-xl leading-tight">batal</h3>
            <p class="ml-2 text-lg">Gadget anda batal diperbaiki pihak LightService</p>
          </div>

      </ol>

      @endforeach
    </div>

    <section class="bg-white dark:bg-gray-900 py-8 lg:py-16">
      <div class="max-w-2xl mx-auto px-4">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Kritik dan saran untuk Light Service</h2>
        </div>
        @foreach($repair as $item)
        <form class="mb-6" action="{{ route('comment-status') }}" method="POST">

            @csrf
            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <label for="comments" class="sr-only">Your comment</label>
                <input type="text" id="id" name="id" hidden value="{{ $item->id }}">
                <textarea id="comments" name="comments" rows="6" maxlength="255"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                    placeholder="tulis komentar... (maksimal 255 huruf)" required></textarea>
            </div>
            <button class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-500 bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Kirim
            </button>
        </form>
          @if (session('success'))
          <div id="success-alert" class="fixed bottom-0 right-0 mb-4 mr-4 p-4 bg-green-500 text-white rounded-md shadow-md">
              <p>{{ session('success') }}</p>
          </div>
      
          <script>
              setTimeout(function() {
                  var alert = document.getElementById('success-alert');
                  alert.remove();
              }, 5000); // Hapus pesan setelah 5 detik (5000 ms)
          </script>
          @endif
        @endforeach
        
      </div>
    </section>

    <script src="https://cdn.tailwindcss.com"></script>

</body>
</html>