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


<h1>Crear nueva tarea</h1>
<form action="/tareas" method="POST">
 @csrf
  <div class="form-group">
    <strong><label for="">Tarea</label></strong>
    <input type="text" class="form-control" name="name" placeholder="tarea">
  </div>
  <div class="form-group">
      <strong><label for="">Categoria</label></strong><br>
      <select name="categori"> 
        @foreach($items as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
      </select>
    </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection