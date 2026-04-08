@extends('adminlte::page')


@section('title', 'aacosf')

@section('content_header')
    <h1>Listado de Repuestos</h1>
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
        <form action="{{ route('admin.repuestos.store') }}" method="POST">
            @csrf

            <div class="row align-items-end">
                <!-- Campo Nombre -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="nombre">Nombre del repuestos</label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="@error('nombre') {{ $message }} @else Ingrese el nombre del repuesto @enderror"
                            value="{{ old('nombre') }}"
                        >
                    </div>
                </div>

                <!-- Campo Categoría -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="categoria">Categoría</label>
                            <!--<select
                                 id="categoria"
                                 name="categoria"
                                 class="form-control select2 @error('categoria') is-invalid @enderror"
                             >
                                    <option value="">Seleccione una categoría</option>
                                    <option value="Aire acondicionado" {{ old('categoria') == 'Aire acondicionado' ? 'selected' : '' }}>Aire Acondicionado</option>
                                    <option value="Computador" {{ old('categoria') == 'Computador' ? 'selected' : '' }}>Computador</option>
                                    <option value="Impresora" {{ old('categoria') == 'Impresora' ? 'selected' : '' }}>Impresora</option>
                                    <option value="VideoBeam" {{ old('categoria') == 'VideoBeam' ? 'selected' : '' }}>VideoBeam</option>
                                    <option value="Dvr" {{ old('categoria') == 'Dvr' ? 'selected' : '' }}>Dvr</option>
                                    <option value="Abanico" {{ old('categoria') == 'Abanico' ? 'selected' : '' }}>Abanico</option>
                            </select> -->
                            <select
                                id="categoria"
                                name="categoria"
                                class="form-control select2 @error('categoria') is-invalid @enderror"
                            >
                                <option value="">Seleccione una categoría</option> 
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->nombre }}" {{ old('categoria') == $tipo->nombre ? 'selected' : '' }}>
                                        {{ $tipo->nombre }}
                                </option> 
                                @endforeach
                            </select>   
                            


                    </div>
                </div>

                <!-- Botón -->
                <div class="col-md-2">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block mt-4">
                            Crear Repuesto
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

   <!-- Card para mostrar todos los repuestos -->
    <div class="card">
        <card-body>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($repuestos as $repuesto)
                        <tr>
                            <td>{{ $repuesto->id }}</td>
                            <td>{{ $repuesto->nombre }}</td>
                            <td>{{ $repuesto->categoria }}</td>
                            <td width="10px">
                                    <a href="{{ route('admin.repuestos.edit', $repuesto) }}" class="btn btn-sm btn-warning">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.repuestos.destroy', $repuesto) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este repuesto?')">Eliminar</button>
                                </form> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </card-body>
    </div>
@stop

