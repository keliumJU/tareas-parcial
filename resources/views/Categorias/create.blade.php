@extends('layouts.app')
@section('title', 'Tareas')

@section('content')

@if ($errors->any())

  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>

@endif


<h1>Crear nueva categoria</h1>
<form action="/categorias" method="POST">
 @csrf
  <div class="form-group">
    <strong><label for="">Categoria</label></strong>
    <input type="text" class="form-control" name="name" placeholder="categoria">
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection