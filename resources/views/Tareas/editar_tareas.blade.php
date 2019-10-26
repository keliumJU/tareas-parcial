@extends('layouts.app')

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

<form action="{{ url('tareas/' . $tarea->id) }}" method="post">
    @csrf
    @method('PUT')
  <div class="form-group">
    <strong><label for="name">Tarea</label></strong>
    <input type="text" class="form-control" id="name" name="name" value="{{$tarea->name}}" >
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection