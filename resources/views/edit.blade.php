@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-gradient-primary text-black">
                    <h2 class="text-center">Editar Tarea</h2>
                </div>
                <div class="card-body">
                    <a href="{{route('tasks.index')}}" class="btn btn-outline-primary btn-back">Volver</a>
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>¡Oops!</strong> Algo salió mal..<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('tasks.update',$task)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title" class="text-primary">Tarea:</label>
                            <input type="text" name="title" id="title" class="form-control bg-light rounded-pill" placeholder="Escribe aquí tu tarea" value="{{$task->title}}">
                        </div>
                        <div class="form-group">
                            <label for="description" class="text-primary">Descripción:</label>
                            <textarea class="form-control bg-light rounded" name="description" id="description" rows="4" placeholder="Escribe aquí la descripción de la tarea">{{$task->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="due_date" class="text-primary">Fecha límite:</label>
                            <input type="date" name="due_date" id="due_date" class="form-control bg-light rounded-pill" value="{{$task->due_date}}">
                        </div>
                        <div class="form-group">
                            <label for="status" class="text-primary">Estado (inicial):</label>
                            <select name="status" id="status" class="form-control bg-light rounded-pill">
                                <option value="">-- Elige el estado --</option>
                                <option value="Pendiente" {{$task->status == 'Pendiente' ? 'selected' : ''}}>Pendiente</option>
                                <option value="En progreso" {{$task->status == 'En progreso' ? 'selected' : ''}}>En progreso</option>
                                <option value="Completo" {{$task->status == 'Completo' ? 'selected' : ''}}>Completada</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary rounded-pill">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

