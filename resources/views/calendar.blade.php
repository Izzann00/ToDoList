@extends('layouts.app')

@section('title', 'Tasks Manager')

@section('content')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

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

    </style>

    <div class="container mt-5">

        <h2 class="text-center mb-4">
            Tasks Manager
        </h2>

        <div class="d-flex justify-content-center">

            <div id="icalendar" class="calendar"></div>

        </div>

    </div>

    <script>

        $(function(){

            $('#icalendar').datepicker({

                autoclose: true,
                weekStart: 1,
                todayHighlight: true,
                format: 'yyyy-mm-dd'

            });

        });

    </script>

@endsection