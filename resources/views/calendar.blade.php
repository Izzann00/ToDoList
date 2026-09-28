@extends('layouts.app')

@section('title', 'Tasks Manager')

@section('content')

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <style>

        .calendar{
            width:100%;
            max-width:300px;
            margin:auto;
        }

        .datepicker,
        .table-condensed{
            width:300px;
        }

        .dia-con-tarea {
            background-color: red !important;
            color: white !important;
            font-weight: bold !important;
        }

    </style>

    <div class="container mt-5">

        <h2 class="text-center mb-4">
            Tasks Manager
        </h2>

        <div class="d-flex justify-content-center">

            <div id="icalendar" class="calendar"></div>

        </div>

    </div>

@endsection

@section('postscripts')

    <script src="{{ asset('js/datepicker.ca.js') }}"></script>

    <script>
        $(function () {

            $.get('/tasks/dates', function (fechas) {

                console.log('FECHAS:', fechas);

                $('#icalendar').datepicker({
                    language: 'ca',
                    weekStart: 1,
                    todayHighlight: true,
                    autoclose: true,
                    format: 'dd/mm/yyyy'
                });

                function pintarFechas() {

                    $('.datepicker td.day').each(function () {

                        let dia = parseInt($(this).text());

                        if (!dia) {
                            return;
                        }

                        let fechaCalendario = $(this).data('date');

                        if (!fechaCalendario) {
                            return;
                        }

                        let fecha = new Date(fechaCalendario);

                        let fechaFormateada =
                            fecha.getFullYear() + '-' +
                            String(fecha.getMonth() + 1).padStart(2, '0') + '-' +
                            String(fecha.getDate()).padStart(2, '0');

                        if (fechas.includes(fechaFormateada)) {
                            $(this).addClass('dia-con-tarea');
                        }
                    });
                }

                pintarFechas();

                $('#icalendar').on('changeMonth changeYear changeDate', function () {
                    setTimeout(function () {
                    pintarFechas();
                    }, 10);
                    
                });
            });

        });    
    </script>

@endsection