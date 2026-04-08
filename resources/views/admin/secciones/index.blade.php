@extends('adminlte::page')


@section('title', 'aacosf')

@section('content_header')
    <h1>Listado de Secciones</h1>
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


<!-- Card formulario crear Repuestos -->
        <div class="card">
        <div class="card-body">
        <form action="{{ route('admin.secciones.store',) }}" method="POST">
            @csrf

            <div class="row align-items-end">
                <!-- Campo Nombre -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="nombre">Nombre de la sección</label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="@error('nombre') {{ $message }} @else Ingrese el nombre de la sección @enderror"
                            value="{{ old('nombre') }}"
                        >
                    </div>
                </div>

                <!-- Campo Descripción -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="descripcion">Sección</label>
                        <input
                            type="text"
                            id="descripcion"
                            name="descripcion"
                            class="form-control @error('descripcion') is-invalid @enderror"
                            placeholder="@error('descripcion') {{ $message }} @else Ingrese la descripción de la sección @enderror"
                            value="{{ old('descripcion') }}"
                        >
                    </div>
                </div>

                <!-- Botón -->
                <div class="col-md-2">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block mt-4">
                            Crear Sección
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

   <!-- Card para mostrar todos las secciones -->
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
                    @foreach ($secciones as $seccione)
                        <tr>
                            <td>{{ $seccione->id }}</td>
                            <td>{{ $seccione->nombre }}</td>
                            <td>{{ $seccione->descripcion }}</td>
                            <td width="10px">
                                    <a href="{{ route('admin.secciones.edit', $seccione) }}" class="btn btn-sm btn-warning">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.secciones.destroy', $seccione) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta sección?')">Eliminar</button>
                                </form> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </card-body>
    </div>
@stop

