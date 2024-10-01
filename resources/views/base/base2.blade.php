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
  </div>
  <br>
  <br>
  <div class="container m-auto">
        <h1 class="text-center font-bold mt-10 text-4xl">
          @yield('title')
        </h1>
        
        @yield('content')

    </div>
    
  </div>
  
</body>
</html>
