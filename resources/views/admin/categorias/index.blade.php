    @extends('adminlte::page')


    @section('title', 'aacosf')

    @section('content_header')
        <h1>Categorias</h1>
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

 <!-- Card formulario crear categorias -->
        <div class="card">
        <div class="card-body">
        <form action="{{ route('admin.categorias.store') }}" method="POST">

            @csrf

            <div class="row align-items-end">
                <!-- Campo Nombre -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="nombre">Nombre de la categoría</label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="@error('nombre') {{ $message }} @else Ingrese el nombre de la categoría @enderror"
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
                            placeholder="@error('descripcion') {{ $message }} @else Ingrese la descripción de la categoría @enderror"
                            value="{{ old('descripcion') }}"
                        >
                    </div>
                </div>

                <!-- Botón -->
                <div class="col-md-2">
                    <div class="form-group">
                        <!-- Protegemos en el frontend desabilitando el boton de crear -->
                        @can('admin.categorias.create')
                        <button class="btn btn-primary btn-block mt-4">
                            Crear categoría
                        </button>
                        @else
                         <button class="btn btn-primary btn-block mt-4" disabled>
                            Crear categoría
                        </button>
                        @endcan

                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

 <!-- Card para mostrar todas las categorias-->
    <div class="card">
            <div class="card-body">
            <!--<a href="{{ route('admin.categorias.create') }}" class="btn btn-primary mb-2">Agregar Categoria</a>-->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nombre }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td width="10px">
                                    @can('admin.categorias.edit')
                                    <a href="{{ route('admin.categorias.edit', $categoria) }}" class="btn btn-sm btn-warning">Editar</a>
                                    @else
                                    <button class="btn btn-sm btn-warning" disabled>Editar</button>
                                    @endcan
                                </td>
                            <!-- <td width="10px">
                                    <a href="{{ route('admin.categorias.show', $categoria) }}" class="btn btn-sm btn-info">Ver</a>
                                </td>-->
                                <td width="10px">
                                    @can('admin.categorias.destroy')
                                    <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoria?')">Eliminar</button>
                                    </form> 
                                    @else
                                    <button class="btn btn-sm btn-danger" disabled>Eliminar</button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                
            </div>
        </div>   
           
    @stop

