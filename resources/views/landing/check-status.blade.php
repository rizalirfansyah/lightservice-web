<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="img/logoweb.png">

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
      <section>
        <div class="container max-w-screen-lg max-h-screen bg-contain bg-no-repeat overflow-hidden bg-center flex">
          <img src="{{URL::asset('img/coba.jpg')}}" alt="" class="h-screen w-full object-cover
           object-center absolute brightness-50">
        </div>

        <div class="lg:w-96 md:w-80 sm:w-80 max-h-screen w-72 mx-auto left-0 top-60 md:top-72 bg-transparent rounded-md shadow-lg relative">
          <h2 class="text-center text-white font-semibold mb-6 font-inter pt-6 text-2xl mx-auto">Check Your Gadget Here</h2>
          
          @if(isset($errorMessage))
          <div id="error-alert" class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 w-72 rounded relative ml-10 mb-4" role="alert">
              <strong class="font-bold">Kode Salah!</strong>
              <span class="block sm:inline">{{ $errorMessage }}</span>
          </div>
          
          <script>
            setTimeout(function() {
                var alert = document.getElementById('error-alert');
                alert.remove();
            }, 5000); // Hapus pesan setelah 5 detik (5000 ms)
          </script>
          @endif

          <form action="{{ route('check.status') }}">
          
            <div class="bg-white rounded-full flex items-center w-full max-w-xl mr-4 p-2.5 shadow-sm border border-gray-200 mb-6">
              <button class="outline-none focus:outline-none">
                <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
              </button>
              <input type="text" name="search" id="search" placeholder="masukkan nomor servis.." class="w-full pl-3 text-sm text-black outline-none focus:outline-none bg-transparent" required/>
            </div>

            <div class="flex items-center">
            <button class="text-white mx-auto focus:ring-4 focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 text-center bg-blue-500 hover:bg-blue-600 focus:ring-blue-700">Check Status</button>
            </div>
          </form>
          
        </div>
      </section>

      <script src="https://cdn.tailwindcss.com"></script>
      
</body>
</html>