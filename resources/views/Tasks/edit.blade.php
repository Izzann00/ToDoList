@extends('layouts.app')

@section('prescripts')

    <style>
        
        .required {
            color: #dc3545;
        }

        .form-label {
            font-weight: 600;
        }

        .form-card {
            border: 0;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
        }

        .form-card .card-header {
            background: white;
            border-bottom: 1px solid #eee;
            font-weight: 600;
            padding: 18px 20px;
        }

        .form-card .card-body {
            padding: 25px;
        }

        .form-control {
            border-radius: 7px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
        }

        .btn {
            border-radius: 7px;
        }

    </style>

@endsection

@section('content')

    <header class="page-header">
        
        <h2>Editar Tasca</h2>

    </header>

    <div class="row">
        <section class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error) 
                            <li>
                                {{ $error }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <div class="card-body">

                <form id="form" method="POST" action="{{ url('/tasks/update') }}" class="form-horizontal">

                    @csrf

                    <input type="hidden" name="id" value="{{ $task->id }}">

                    <div class="form-group row pb-3">

                    <label class="col-sm-2 control-label text-sm-end pt-2">
                        Títol:
                        <span class="required">*</span>
                    </label>

                        <div class="col-sm-5">

                            <input type="text" name="title" id="ititle" class="form-control" maxlength="100" value="{{ old('title',$task->title) }}">

                        </div>
                    </div>
                    <div class="form-group row pb-3">

                        <label class="col-sm-2 control-label text-sm-end pt-2">
                            Descripció:
                            <span class="required">*</span>

                        </label>

                        <div class="col-sm-5">

                            <textarea name="description" id="idescription" class="form-control" rows="6">{{ old('description',$task->description) }}</textarea>

                        </div>
                    </div>
                    <div class="form-group row pb-3">

                        <label class="col-sm-2 control-label text-sm-end pt-2">
                            Data:
                            <span class="required">*</span>
                        </label>

                        <div class="col-sm-2">

                            <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $task->due_date) }}">

                        </div>
                    </div>
                    <div class="form-group row pb-3">

                        <label class="col-sm-2 control-label text-sm-end pt-2">
                            Estat:
                            <span class="required">*</span>
                        </label>

                        <div class="col-sm-5">
                            <div class="form-check mt-2">

                                <input class="form-check-input" type="checkbox" name="completed" value="1" {{ $task->completed ? 'checked' : '' }}>

                                <label class="form-check-label">
                                    Tasca completa
                                </label>

                            </div>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <div class="row justify-content-end">

                            <div class="col-sm-9">
                                <a href="{{ route('tasks.index') }}" class="btn btn-default">
                                    Cancel·lar
                                </a>                            
                                <button type="submit" class="btn btn-primary">
                                    Desar
                                </button>

                            </div>

                        </div>
                    </footer>
                </form>
            </div>
        </section>
    </div>

@endsection