@extends('layouts.dashboard')

@section('content')

<div class="col-xl-8 mb-5 mb-xl-0">
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Actividades</h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('/actividades/crear') }}" class="btn btn-sm btn-info">Agregar Actividad</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        @if (session('msg'))
            <div class="alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
        @endif
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Descripción</th>
              <th scope="col">Horario</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($actividad as $item)
            
            <tr>
              <th scope="row">
                {{ $item->name }}
              </th>
              <td>
                {{ $item->description }}
              </td>
              <td>
                {{ $item->horario }}
              </td>
              <td>
                {{-- Obtenemos el id seleccionado para eliminar y editar --}}
                <form action="{{ url('/actividades/'.$item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ url('/actividades/'.$item->id. '/editar') }}" class="btn btn-sm btn-success">Editar</a>
                    <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                </form>
                
                

              </td>
             
            </tr>
              
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
