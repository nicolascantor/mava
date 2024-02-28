<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/177a9c04fa.js" crossorigin="anonymous"></script>
    <title>Document</title>

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

     <!-- Scripts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     @livewireStyles
</head>
<body>
    <!--Navegacion panel superior-->
    @include('layouts.navigation-mava')
    <!--sidebar lateral izquierdo-->
    @include('layouts.sidebar')
    <!--Contenido-->
    <div class="sm:p-4 sm:ml-64 bg-gray-200 h-screen ">
        <div class="sm:p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="flex flex-col w-full rounded-lg content-center">
            <div class="felx rounded-lg bg-white shadow-xl w-full content-center h-14 mb-2 sm:mb-6">

                <div class="p-2 content-center text-gray-400 w-full text-center">
                    <span class="ms:pb-2 content-center uppercase lg:text-5xl sm:text-2xl font-bold">{{ $tittle_section }}</span>
                </div>
            </div>

            <div class="flex P-2 rounded-lg bg-white shadow-xl w-full content-center h-screen">
                <div class="p-4 w-full">
                    {{ $slot }}
                </div>
            </div>

        </div>
        </div>
    </div>
    @livewireScripts
</body>
<script>

   function desplegarMenuConfig(){

      const config = document.querySelector('#config-menu');
      const flechaAbajo = document.querySelector('.flecha_abajo');
      const flechaArriba = document.querySelector('.flecha_arriba');

      config.classList.toggle("hidden");

      if(flechaAbajo.classList.contains('hidden')){
         flechaAbajo.classList.toggle("hidden");
       }else{
         flechaAbajo.classList.add('hidden');
       }

      flechaArriba.classList.toggle('hidden');
   }

   function menuGeneral(){

      const menu = document.querySelector('#logo-sidebar');
      menu.classList.toggle('-translate-x-full');
   }
</script>
</html>
