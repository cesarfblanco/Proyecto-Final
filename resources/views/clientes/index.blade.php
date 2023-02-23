@extends('layouts.dashboard')

@section('content')

<div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Cliente</h3>
          </div>
          <div class="col text-right">
            <a href="{{ url('/clientes/crear') }}" class="btn btn-sm btn-info">Agregar Cliente</a>
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
              <th scope="col">Apellido</th>
              <th scope="col">Correo</th>
              <th scope="col">Fecha Nacimiento</th>
              <th scope="col">Telefono</th>
              <th scope="col">Acciones</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($clientes as $item)
            
            <tr>
              <th scope="row">
                {{ $item->name }}
              </th>
              <td>
                {{ $item->apellido }}
              </td>
              <td>
                {{ $item->email }}
              </td>
              <td>
                {{ $item->FechaNac }}
              </td>
              <td>
                {{ $item->tlf }}
              </td>
              <td>
                {{-- Obtenemos el id seleccionado para eliminar y editar --}}
                <form action="{{ url('/clientes/'.$item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ url('/clientes/'.$item->id. '/edit') }}" class="btn btn-sm btn-success">Editar</a>
                    <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                </form>
              </td>
            </tr>
              
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-body">
      {{ $clientes->links() }}
    </div>
  </div>
@endsection
