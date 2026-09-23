<!DOCTYPE html>
    <html lang="ca">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title', 'Tasks')</title>

        {{-- Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

        <style>

            body{
                background:#f4f6f9;
                font-family: Arial, Helvetica, sans-serif;
            }
            
            .table thead{
                background:#212529;
                color:white;
            }

            .container{
                margin-top:30px;
            }

            h1,h2,h3{
                font-weight:600;
            }

            #icalendar{
                width:300px;
                margin-top:20px;
            }

            .datepicker{
                margin:auto;
            }

            .table-condensed{
                width:300px;
            }

        </style>

    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">

                <a class="navbar-brand" href="{{ route('home') }}">
                    Maneig de Tasques
                </a>

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.index') }}">
                            Tasques
                        </a>
                    </li>

                </ul>

            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>

            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        @yield('postscripts')

    </body>
</html>