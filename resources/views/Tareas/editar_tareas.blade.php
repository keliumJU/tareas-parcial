@extends('layouts.app')

@section('content')

<form action="{{ url('tareas/' . $tarea->id) }}" method="post">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$tarea->name}}" >
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection