<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
    <title>@yield('titolo')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    
    <!-- Fogli di stile -->
    <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/@yield('stile')">

    <!-- jQuery e plugin JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="{{ url('/') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/js/myScript.js"></script>
    <script src="{{ url('/') }}/js/themoviedb.js"></script>
    <script src="{{ url('/') }}/messages.js"></script>

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" class="init">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @yield('left_navbar')
                    <a href="{{ route('setLang', ['lang' => 'en']) }}" class="nav-link"><img src="{{ url('/') }}/img/flags/en.png" width="16" class="img-rounded"/></a>
                    <a href="{{ route('setLang', ['lang' => 'it']) }}" class="nav-link"><img src="{{ url('/') }}/img/flags/it.png" width="16" class="img-rounded"/></a>
                </ul>

                <div class="container col-md-5">
                    <form class="d-flex justify-content-left" name="search_form" method="GET" action="{{ route('search')}}" id="search_form">
                        <input class="form-control me-2" type="search" placeholder="{{ trans('labels.search') }}" aria-label="Search" id="search_text" name="search_text">
                        <button class="btn btn-outline-success" type="submit" onclick="checkSearch()">{{ trans('labels.search') }}</button>
                    </form>
                </div>

 
                <ul class="navbar-nav navbar-nav ms-auto mb-2 mb-lg-0">
                    @yield('right_navbar')
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <ul class="breadcrumb pull-right">
            @yield('breadcrumb')
        </ul>
    </div>

    <div class="container">
        <header class="header-sezione">
            <h1>
                @yield('titolo')
            </h1>
        </header>
    </div>

    @yield('corpo')

</body>

</html>