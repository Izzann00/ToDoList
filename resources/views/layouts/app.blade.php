<!DOCTYPE html>
    <html lang="ca">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title', 'Tasks')</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

        <style>
            body {
                background: #f4f6f9;
                font-family: Arial, Helvetica, sans-serif;
            }

            .navbar {
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            }

            .navbar-brand {
                font-weight: 600;
            }

            .container {
                margin-top: 30px;
            }

            .card {
                border: 0;
                border-radius: 12px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
                margin-bottom: 25px;
            }

            .card-header {
                background: white;
                border-bottom: 1px solid #eee;
                font-weight: 600;
            }

            .btn {
                border-radius: 7px;
            }

            .table {
                margin-bottom: 0;
            }

            .table thead {
                background: #212529;
                color: white;
            }

            .table th {
                font-weight: 600;
            }

            .page-header {
                margin-bottom: 20px;
            }

            .page-header h2 {
                font-weight: 600;
                margin-bottom: 0;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <div class="d-flex align-items-center">

                    <a class="navbar-brand me-3" href="{{ route('home') }}">
                        Maneig de Tasques
                    </a>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tasks.index') }}">
                                Tasques
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tasks.calendar') }}">
                                Calendari
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        @yield('postscripts')

    </body>
</html>