@extends('layouts.app')

@section('title', 'Tasques')

@section('content')

    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h2>
                <i class="bi bi-list-task me-2"></i>
                Llista de Tasques
            </h2>
        </div>
    </div>

    <section class="card">

        <div class="card-header py-3">
            <i class="bi bi-table me-2"></i>
            Tasques
        </div>

        <div class="card-body table-responsive">

            @if($tasks->count() > 0)

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>Títol</th>
                            <th>Descripció</th>
                            <th>Data</th>
                            <th class="text-center">Estat</th>
                            <th class="text-center">Accions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tasks as $task)

                            <tr>

                                <td>
                                    <strong>{{ $task->title }}</strong>
                                </td>

                                <td>
                                    {{ $task->description }}
                                </td>

                                <td>
                                    {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->locale('ca')->translatedFormat('d \d\e F \d\e Y') : '' }}
                                </td>

                                <td class="text-center">

                                    @if($task->completed)

                                        <span class="badge bg-success">
                                            <i class="bi bi-check-lg me-1"></i>
                                            Completada
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            <i class="bi bi-clock me-1"></i>
                                            Pendent
                                        </span>

                                    @endif

                                </td>

                                <td class="text-center">

                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-primary me-1" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $task->id }}" data-title="{{ $task->title }}" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else

                <div class="text-center py-5">

                    <i class="bi bi-inbox fs-1 text-muted"></i>

                    <h5 class="mt-3">
                        No hi ha tasques
                    </h5>

                    <p class="text-muted">
                        Encara no has creat cap tasca.
                    </p>

                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg me-1"></i>
                        Crear primera tasca
                    </a>

                </div>
            @endif
        </div>
    </section>

    <div class="text-center mt-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Afegir Tasca
        </a>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">
                        <i class="bi bi-exclamation-triangle text-danger me-2"></i>
                        Eliminar Tasca
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">
                    Estàs segur que vols esborrar la tasca
                    <strong id="taskTitle"></strong>?
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel·la
                    </button>

                    <form id="deleteForm" method="POST" action="/tasks/delete">

                        @csrf

                        <input type="hidden" name="id" id="taskId">

                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash me-1"></i>
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