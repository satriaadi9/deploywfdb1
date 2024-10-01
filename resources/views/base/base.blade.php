<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/index.js')
    <title>WFD</title>
    
</head>
<body>
  <div class="bg-white dark:bg-black">
    @include('includes.header')
    @include('includes.home.landing')
    
  </div>
  

  

    <div>
        <div class="text-3xl font-bold underline hover:font-normal">
            Hello World
        </div>

        <div class="row">
            <div class="col-md-2 border border-dark">
                {{-- sidenav --}}
                @include('includes.sidenav')
            </div>
            <div class="col-md-10 border border-dark">
                {{-- content --}}
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
