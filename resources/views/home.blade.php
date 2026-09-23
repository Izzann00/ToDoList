@extends('layouts.app')

@section('title', 'Tasks Manager')


@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <style>
        .dia-con-tarea {
            background: red ;
            color: white ;
        }

    </style>

    <div class="row">

        <div class="col-md-12">

            <h2>Hol@</h2>

            <h3>
                Organitza les teves tasques i recordatoris fàcilment.
            </h3>

            <div class="row mt-4">

                <div class="col-md-4">

                    <div class="card-body d-flex justify-content-center">

                        <div id="icalendar"></div>

                    </div>
                </div>
                <div class="col-md-4">

                    <div class="card shadow">

                        <div class="card-header">
                            Recordatoris
                        </div>

                        <div class="card-body" id="recordatorios">

                            @if($reminders->count() > 0)
                                @foreach($reminders as $task)
                                    <div class="mb-3">

                                        <strong>
                                            {{ $task->title }}
                                        </strong>

                                        <p class="mb-0">
                                            {{ $task->description }}
                                        </p>
                                    </div>
                                @endforeach
                            @else
                                <p>
                                    No tens recordatoris.
                                </p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('postscripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('js/datepicker.ca.js') }}"></script>

<script>

    $(function(){

        let fechasConTareas = [];


        $.ajax({

            url: '/tasks/dates',

            type: 'GET',

            success:function(fechas){


                fechasConTareas = fechas;


                $('#icalendar').datepicker({

                    language: 'ca',
                    weekStart: 1,
                    todayHighlight: true,
                    autoclose: true,
                    format: 'yyyy-mm-dd',

                    beforeShowDay: function(date){

                        let fecha = date.getFullYear() + '-' +
                                    String(date.getMonth() + 1).padStart(2, '0') + '-' +
                                    String(date.getDate()).padStart(2, '0');

                        if(fechasConTareas.includes(fecha)){

                            return {
                                classes: 'dia-con-tarea',
                                tooltip: 'Tens una tasca aquest dia'
                            };
                        }
                        return;
                    }

                }).on('changeDate', function(e){

                    let fecha = e.format();

                    $.ajax({

                        url: '/tasks/date/' + fecha,

                        type: 'GET',

                        success:function(tareas){

                            let contenido = "";

                            if(tareas.length == 0){

                                contenido = ` <p> No hi han recordatoris per aquest dia. </p> `;

                            } else {

                                contenido = ` <h5> ${fecha} </h5> `;

                                tareas.forEach(function(tarea){

                                    contenido += ` <div class="mb-3"> <strong> ${tarea.title} </strong> <p> ${tarea.description} </p> </div> `;

                                });
                            }

                            $('#recordatorios').html(contenido);

                        }
                    });
                });
            }
        });
    });

</script>

@endsection