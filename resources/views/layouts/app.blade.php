<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Inventory List') }}</title> -->
    <title>Inventory List</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- DROPZONE DRAG N DROP -->
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css"  rel="stylesheet">  
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"/>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>


</head>
<body>
    <div id="app">
    <div class="main-container">
        <div class="callouts-container">
        
        @guest
            @if(Request::is('/'))
                @include('inc.gview')
            @endif
            <div class="index-login" id="content">
             @yield('content-test')
             </div>
        @else
        @include('inc.navbar')
            <div class="sidebar" id="sidebar">
                @include('inc.sidebar')
            </div>

            

            @if(Request::is('employee/*'))
                <div class="right-content-fluid" id="content">
                    @include('inc.error')

                    @if(Request::is('/'))
                        @include('inc.showcase')
                    @endif

                    @yield('content')
                </div>
            @else
                <div class="right-content" id="content">
                    
                    @include('inc.error')
    
                    @if(Request::is('/'))
                        @include('inc.showcase')
                    @endif
    
                    @yield('content')
                </div>
            @endif
        @endguest
            
        </div>
    </div>
    </div>
    
</body>
</html>
