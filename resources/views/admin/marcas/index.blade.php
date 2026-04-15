@extends('adminlte::page')


@section('title', 'aacosf')

@section('content_header')
    <h1>Listado de Estados</h1>
@stop

@section('content')
    <!-- Mnensaje de éxito -->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('alert-success');
            if (alert) {
                alert.classList.remove('show');   // hace fading out
                alert.classList.add('fade');      // transición
                setTimeout(() => alert.remove(), 500); // luego lo remueve del DOM
            }
        }, 5000); // 3000 ms = 3 segundos
    </script>
@endif


<!-- Card formulario crear Marcas -->
 
<div class="card">
  
  

      <div class="card-body">
        <form action="{{ route('admin.marcas.store') }}" method="POST">
            @csrf

            <div class="row align-items-end">
                <!-- Campo Nombre -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="nombre">Nombre de la marca</label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="@error('nombre') {{ $message }} @else Ingrese el nombre de la marca @enderror"
                            value="{{ old('nombre') }}"
                        >
                    </div>
                </div>

                <!-- Campo Descripción -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input
                            type="text"
                            id="descripcion"
                            name="descripcion"
                            class="form-control @error('descripcion') is-invalid @enderror"
                            placeholder="@error('descripcion') {{ $message }} @else Ingrese la descripción de la marca @enderror"
                            value="{{ old('descripcion') }}"
                        >
                    </div>
                </div>

                <!-- Botón -->
                <div class="col-md-2">
                    <div class="form-group">
                        @can('admin.marcas.create')
                        <button class="btn btn-primary btn-block mt-4">
                            Crear Marca
                        </button>
                        @else
                        <button class="btn btn-primary btn-block mt-4" disabled>Crear Marca</button>
                        @endcan
                    </div>
                </div>
            </div>

        </form>
     </div>
    
</div>

   <!-- Card para mostrar todas las marcas-->
    <div class="card">
        <card-body>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcas as $marca)
                        <tr>
                            <td>{{ $marca->id }}</td>
                            <td>{{ $marca->nombre }}</td>
                            <td>{{ $marca->descripcion }}</td>
                            <td width="10px">
                            @can('admin.marcas.edit')
                             <a href="{{ route('admin.marcas.edit', $marca) }}" class="btn btn-sm btn-warning">Editar</a>
                            @else
                             <button class="btn btn-sm btn-warning" disabled>Editar</button>
                            @endcan
                        </td>
                            <td width="10px">
                                @can('admin.marcas.destroy')
                                 <form action="{{ route('admin.marcas.destroy', $marca) }}" method="POST" style="display:inline-block;">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta marca?')">Eliminar</button>
                                 </form>
                                @else
                                 <button class="btn btn-sm btn-danger" disabled>Eliminar</button>
                                @endcan
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </card-body>
    </div>
@stop

