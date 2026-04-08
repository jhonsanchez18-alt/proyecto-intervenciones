@extends('adminlte::page')


@section('title', 'IafCSF')

@section('content_header')
    <h1>lista de Activos Fijos</h1>
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


    <!-- Card para mostrar todas los activos fijos-->
    <div class="col-md-2 mr-auto">
          
        <!-- Boton para crear activo fijo -->
                    <div class="form-group">
                        <a href="{{ route('admin.activos.create') }}">
                        <button class="btn btn-primary btn-block mt-4">
                                 Crear activo fijo
                        </button>
                        </a>
                    </div>
        </div> 
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @if ($activos->isEmpty())
                        <tr>
                         
                            <td colspan="5" class="text-center">No hay activos fijos registrados.</td>
                        </tr>
                        @else
                    @foreach ($activos as $activo)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Str::limit($activo->nombre, 25) }}</td>
                            <td>{{ $activo->descripcion }}</td>
                            <td>{{ $activo->categoria->nombre }}</td>
                            <td>
                                <a href="{{ route('admin.activos.show', $activo) }}" class="btn btn-info btn-sm">Detalles</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.activos.edit', $activo) }}" class="btn btn-sm btn-warning">Editar</a>
                            </td>
                             <td width="10px">
                                    <form action="{{ route('admin.activos.destroy', $activo) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoria?')">Eliminar</button>
                                    </form> 
                                </td>
                        </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>    
     </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop