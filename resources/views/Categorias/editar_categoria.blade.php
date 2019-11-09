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


<h1>Editar categoria</h1>
<form action="{{ url('categorias/' . $categoria->id) }}" method="POST">
 @csrf
 @method('PUT')
  <div class="form-group">
    <strong><label for="">Categoria</label></strong>
    <input type="text" class="form-control" name="name" placeholder="{{$categoria->name}}">
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection