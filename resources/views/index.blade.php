@extends('layouts.base')

@section('content')
    <div class="row">
        <section style="display: grid ; grid-template-columns: 1fr 1fr; align-items: center; align-content: center; margin-top: 100px">
            <div style="text-align: left;">
                <h2 style="text-transform: uppercase">
                    CRUD de Tareas</h2>
            </div>

            <div style="text-align: right; padding-top: 80px;">
                <a style="color:black; font-weight: bold" href="{{ route('tasks.create') }}" class="btn btn-primary">Crear
                    tarea</a>
            </div>
        </section>




        @if (Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ Session::get('success') }}</strong> <br>
            </div>
        @endif

        <div class="col-12 mt-4">
            <table class="table table-bordered text-white">
                <tr class="text-secondary" style="text-align: center">
                    <th>Tarea</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>

                @foreach ($tasks as $task)
                    <tr>
                        <td style="text-align: center" class="fw-bold">{{ $task->title }}</td>
                        <td style="text-align: center">{{ $task->description }}</td>
                        <td style="text-align: center">
                            {{ date('d/m/Y', strtotime($task->due_date)) }}
                        </td>
                        <td>
                            @if ($task->status == 'Pendiente')
                                <span
                                    style="background-color: red; font-weight: bold; border-radius: 10px; padding:10px; display: flex; justify-content: center; align-items: center">
                                    {{ $task->status }}
                                </span>
                            @elseif($task->status == 'En progreso')
                                <span
                                    style="background-color: #e65f11; font-weight: bold; border-radius: 10px; padding:10px; display: flex; justify-content: center; align-items: center">
                                    {{ $task->status }}
                                </span>
                            @elseif($task->status == 'Completo')
                                <span
                                    style="background-color: rgb(77, 221, 20); font-weight: bold; border-radius: 10px; padding:10px; display: flex; justify-content: center; align-items: center">
                                    {{ $task->status }}
                                </span>
                            @endif
                        </td>
                        <td style="display: grid; grid-template-columns: 1fr 1fr; justify-content: center; gap: 10px">
                            <a style="background-color: gray; border-color: gray; border-radius: 10px; padding:10px;"
                                href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Editar</a>

                            <form style="display: flex; width: 100%;" action="{{ route('tasks.destroy', $task) }}"
                                method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    style="width: 100%; background-color: rgb(247, 64, 64); border-radius: 10px; padding:10px;"
                                    type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </table>
            {{ $tasks->links() }}
        </div>
    </div>
@endsection
