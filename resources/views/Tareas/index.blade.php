@extends('layouts.app')
@section('title', 'Tareas')

@section('content')


<div class="row">


        <a class="btn btn-primary" href="{{ url('tareas/create') }}">
            Nuevo
        </a>

<h1>Tareas pendientes</h1>
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
          <label><input type="checkbox" id="myCheck" name="myCheck" onclick="getCheckedCheckboxesFor('myCheck')" value="{{$tar->id}}"></label><br>
        </td>  
        <td>
          <p id="text" style="display:none">Checkbox is CHECKED!</p>
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



    <h1>Tareas realizadas</h1>
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
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
  </div>
  <script> 
  var hecho;
function getCheckedCheckboxesFor(checkboxName) {
    var checkboxes = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes, function(el) {
        values.push(el.value); 
        hecho = values;
    });
}
  console.log(hecho);
  </script>
@endsection
 