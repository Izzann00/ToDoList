@extends('layouts.app')

@section('title', 'Tasks Manager')

@section('content')

    <style>

        .home-title {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .home-subtitle {
            color: #6c757d;
            margin-bottom: 30px;
        }

        .home-card {
            border: 0;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            height: 100%;
        }

        .home-card .card-header {
            background: white;
            border-bottom: 1px solid #eee;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 15px 20px;
        }

        .home-card .card-body {
            padding: 20px;
        }

        .calendar-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .dia-con-tarea {
            background: #0d6efd !important;
            color: white !important;
            border-radius: 50%;
        }

        .reminder {
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 8px;
            background: #f8f9fa;
            border-left: 4px solid #0d6efd;
        }

        .reminder strong {
            display: block;
            margin-bottom: 5px;
        }

        .reminder p {
            color: #6c757d;
            margin-bottom: 0;
        }

    </style>

    <div class="container py-4">
        <div class="text-center mb-4">

            <h2 class="home-title">
                Hol@
            </h2>

            <p class="home-subtitle">
                Organitza les teves tasques i recordatoris fàcilment.
            </p>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card home-card">

                    <div class="card-header">
                        <i class="bi bi-bell me-2"></i>
                        Recordatoris
                    </div>

                    <div class="card-body" id="recordatorios">
                        @if($reminders->count() > 0)

                            @foreach($reminders as $task)

                                <div class="reminder">

                                    <strong>
                                        {{ $task->title }}
                                    </strong>

                                    <p>
                                        {{ $task->description }}
                                    </p>
                                </div>

                            @endforeach
                        @else
                            <p class="text-muted mb-0">
                                No tens recordatoris.
                            </p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
