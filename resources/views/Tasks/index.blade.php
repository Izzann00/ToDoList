@extends('layouts.app')


@section('content')


    <header class="page-header">

        <style>

            .breadcrumbs {
                margin-right:20px ;
            }

            @media(max-width:600px){

                .breadcrumbs {
                    margin-right:-50px ;
                    margin-left:20px ;
                }
            }

        </style>
            
        <h2 class="card-title">Llista de Tasques</h2>

    </header>

    <section class="card">
        <div class="card-body">

            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                Afegir Tasca
            </a>

        </div>
    </section>

    <section class="card">
        <div class="card-body table-responsive">
            @if($tasks->count() > 0)
            <table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
                <thead>
                    <tr>
                        <th>Títol</th>
                        <th>Descripció</th>
                        <th>Data</th>
                        <th>Estat</th>
                        <th>Accions</th>
                    </tr>
                </thead>

                <tbody class="align-middle">

                    @foreach($tasks as $task)
                        <tr>
                            <td>
                                {{ $task->title }}
                            </td>
                            <td>
                                {{ $task->description }}
                            </td>
                             <td>
                                {{ $task->due_date }}
                            </td>
                                <td>
                                    @if($task->completed)
                                        <i class="bi bi-check text-success fs-5"></i>
                                    @else
                                        <i class="bi bi-x text-danger fs-5"></i>
                                    @endif
                                </td>                            <td>
                                <a href="{{ route('tasks.edit',$task->id) }}" class="btn btn-link text-dark p-0" title="Editar">
                                    <i class="bi bi-pencil fs-6"></i>
                                </a>
                                <button class="btn btn-link text-dark p-0" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $task->id }}" data-title="{{ $task->title }}" title="Eliminar">
                                    <i class="bi bi-trash fs-6"></i>
                                </button>                            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else

                No hi han Tasques per mostrar.

            @endif
        </div>
    </section>
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Eliminar Tasca</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Estás segur que vols esborrar la Tasca 
                    <strong id="taskTitle"></strong> ? 
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel·la
                    </button>

                    <form id="deleteForm" method="POST" action="/tasks/delete">
                        @csrf

                        <input type="hidden" name="id" id="taskId">

                        <button type="submit" class="btn btn-danger">
                            Eliminar
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('postscripts')

    <script>

    const deleteModal = document.getElementById('deleteModal');

    deleteModal.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;

        const id = button.getAttribute('data-id');
        const title = button.getAttribute('data-title');

        document.getElementById('taskId').value = id;
        document.getElementById('taskTitle').textContent = title;

    });

    </script>

@endsection