<!DOCTYPE html class="h-100">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styless-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="h-100">

    <div id="app" class="h-100">
      <b-navbar toggleable="md" type="dark" variant="dark">
           <b-navbar-toggle target="nav_text_collapse"></b-navbar-toggle>
           <b-navbar-brand href="{{ url('/home') }}">Messenger</b-navbar-brand>
           <b-collapse is-nav id="nav_text_collapse">
             <b-navbar-nav class="ml-auto">
                  <b-nav-item href="{{ url('/home') }}">Inicio</b-nav-item>
               @guest
                  <b-nav-item href="{{ route('login') }}">Login</b-nav-item>
                   @if (Route::has('register'))
                      <b-nav-item href="{{ route('register') }}">Registro</b-nav-item>
                   @endif
               @else
                   <!-- Navbar dropdowns -->
                   <?php $ruta= "/users/".auth()->user()->image  ?>
                   <b-nav-item href="{{ route('login') }}" class="mx-0">
                     <b-img src='{{ asset($ruta) }}' rounded="circle" width="35" height="35" class="m-0" />
                   </b-nav-item>
                   <b-nav-item-dropdown text="{{ Auth::user()->name }}" right>
                     <b-dropdown-item href="{{ url('/profile') }}">
                        <span class="fa fa-user"></span> Perfil
                     </b-dropdown-item>
                      <b-dropdown-item href="#"
                        @click="logout">
                         <span class="fa fa-sign-out-alt"></span> Salir
                      </b-dropdown-item>
                   </b-nav-item-dropdown>

                  <b-form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </b-form>
               @endguest
              </b-navbar-nav>
           </b-collapse>
      </b-navbar>
      <audio ref="audioM" id="newMessageSound">
        <source src="{{ asset('sounds/newMessage.mp3') }}">
      </audio>
        <main class="py-2">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</body>
</html>
