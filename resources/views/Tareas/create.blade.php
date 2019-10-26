@extends('layouts.app')
@section('title', 'Tareas')

@section('content')

<form action="/tareas" method="POST">
 @csrf
  <div class="form-group">
    <label for="">Nombre</label>
    <input type="text" class="form-control" name="name" placeholder="tarea">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection