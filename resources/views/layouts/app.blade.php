<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
</head>
<body>


    <div id="app">

      <b-navbar toggleable="md" type="dark" variant="dark">
           <b-navbar-toggle target="nav_text_collapse"></b-navbar-toggle>
           <b-navbar-brand href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</b-navbar-brand>
           <b-collapse is-nav id="nav_text_collapse">
             <b-navbar-nav class="ml-auto">
                  <b-nav-item href="{{ url('/') }}">Inicio</b-nav-item>
               @guest
                  <b-nav-item href="{{ route('login') }}">Login</b-nav-item>
                   @if (Route::has('register'))
                      <b-nav-item href="{{ route('register') }}">Registro</b-nav-item>
                   @endif
               @else
               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

               </a>
                   <!-- Navbar dropdowns -->
                   <b-nav-item-dropdown text="{{ Auth::user()->name }} <span class='caret'></span>" right>
                      <b-dropdown-item href="#"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          Salir
                      </b-dropdown-item>
                   </b-nav-item-dropdown>


                <b-form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </b-form>
               @endguest


              </b-navbar-nav>
           </b-collapse>
      </b-navbar>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
