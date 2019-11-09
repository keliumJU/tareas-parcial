@extends('layouts.app')
@section('title', 'Tareas')

@section('content')


<div class="row">
  <div class="col">
      <h1 class="text-center">Categorias</h1>
  </div>
</div>

<div class="row">


<div class="col"><h1>Lista de categorias</h1></div>

<div class="col-2"><a class="btn btn-primary float-rigth" href="{{ url('categorias/create') }}">
    Nueva
  
</a>
</div>
      <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>    
        <th scope="col">Nombre</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>

    @foreach ($categorias  as $categoria)   
      <tr>
        <td>{{$categoria->id}}</td>
        <td>{{$categoria->name}}</td>
        <td>                        
          <form action="{{ route('categorias.destroy', [$categoria->id]) }}" method="post">
              @csrf
              @method('DELETE')
              <a class="btn btn-success" 
                  href="{{ route('categorias.edit', [$categoria->id]) }}">
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

@endsection
 