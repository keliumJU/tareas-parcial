@extends('layouts.app')
@section('title', 'Tareas')

@section('content')


<div class="row">
  <div class="col">
      <h1 class="text-center">Agenda</h1>
  </div>
</div>

<div class="row">


<div class="col"><h1>Tareas pendientes</h1></div>

<div class="col-2"><a class="btn btn-primary float-rigth" href="{{ url('tareas/create') }}">
  Nuevo
</a></div>
      <table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Fecha</th>
        <th scope="col">Hecho</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>

    @foreach ($list_tar  as $tar)   
      <tr>
        <td>{{$tar->name}}</td>
        <td>{{$tar->created_at}}</td>
        <td>
        <form action="{{ url('tareas/' . $tar->id) }}" method="post">
            @csrf
            @method('PUT')            
            <button style="background-color: transparent; border:none" type="submit" >
              <input type="checkbox" id="c" name="check" value="1">
            </button>
        </form>

        </td>  
        <td>                        
          <form action="{{ route('tareas.destroy', [$tar->id]) }}" method="post">
              @csrf
              @method('DELETE')
              <a class="btn btn-success" 
                  href="{{ route('tareas.edit', [$tar->id]) }}">
                  <i class="fa fa-pencil"></i>
              </a>

              <button class="btn btn-danger" >
                  <i class="fa fa-trash"></i>
              </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


<div class="row">
    <h1>Tareas realizadas</h1>
      <table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Fecha</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($list_eco  as $eco)   
        <tr>
          <td>{{$eco->name}}</td>
          <td>{{$eco->created_at}}</td>
        </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection
 