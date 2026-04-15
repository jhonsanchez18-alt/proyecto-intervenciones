@extends('adminlte::page')


@section('title', 'IafCSF')

@section('content_header')
    <h1>Detalle de Activo fijos</h1>
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

    // Detalles del activo
   <div class="card">
    <div class="card-header text-center">
        <h5 class="uppercase">{{ $activo->nombre }}</h5> 
    </div>
     
    <div class="card-body">
        <table class="table table-borderless table-sm">
        <tr>
             <td colspan="3"><p><strong>Descripción:</strong> {{ $activo->descripcion }}</p></td>
        </tr>
        <tr>
            <td class="w-33"><p><strong>Sección:</strong> {{ $activo->seccion->nombre }} </p></td>
            <td class="w-33"><p><strong>Ubicación:</strong> {{ $activo->ubicacion->nombre}}</p></td>
            <td class="w-33"><p><strong>Categoría:</strong> {{ $activo->categoria->nombre }}</p></td>
          
        </tr>
    
    
         <tr>
            <td class="w-33"><p><strong>Modelo:</strong> {{ $activo->modelo }}</p></td>
            <td class="w-33"><p><strong>F. Compra:</strong> {{ \Carbon\Carbon::parse($activo->fechacompra)->format('d/m/Y') }}</p></td>
            <td class="w-33"><p><strong>Marca:</strong> {{ $activo->marca->nombre }}</p></td>
          
        </tr>
          <tr>
            <td class="w-33"><p><strong>Serial:</strong> {{ $activo->numerodeserie }}</p></td>
            <td class="w-33"><p><strong>precio:</strong> ${{ number_format($activo->valor_adquisicion, 2) }}</p></td>
            <td class="w-33"><p><strong>Responsable:</strong> {{ $activo->responsable->name }}</p></td>
          
        </tr>
        <tr>
            <td class="w-33"><p><strong>Estado:</strong> {{ $activo->estado->nombre }}</p></td>
            <td class="w-33"><p><strong>Identificador Unico:</strong> {{ $activo->identificadorunico }}</p></td>
            <td class="w-33"><p><strong>Tipo:</strong> {{ $activo->tipo->nombre }}</p></td>
          
        </tr>
        <tr>
            
            <td colspan="3" class=""><p><strong>Observaciones:</strong> {{ $activo->observaciones }}</p></td>
          
        </tr>

         
   
</table>
</div>

</div>
        
        
        
        <!--Registro de intervenciones -->
        
    <div class="card">

    {{-- HEADER --}}
    
    <div class="card-header d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.activos.intervenciones.create', $activo) }}"
           class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Añadir Intervención
        </a>
        listado de intervenciones
        <h6 class="text-uppercase mb-0">Registro de Intervenciones</h6>

        
    </div>

    {{-- BODY --}}
    <div class="card-body">
        <table class="table table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                     <th style="width: 5%">ID</th>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Técnico</th>
                    <th >Acciones</th>
                </tr>
            </thead>

            <tbody>
                
                @forelse($activo->intervenciones as $intervencione)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $intervencione->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($intervencione->fecha_intervencion)->format('d/m/Y') }}</td>
                        <td>{{ $intervencione->tipo_intervencion }}</td>
                        <td>{{ $intervencione->tecnico->nombre }}</td>
                        <td width="10px pr-10">
                           
                            @can('admin.intervenciones.show')   
                            <a href="{{ route('admin.intervenciones.show', $intervencione) }}"
                               class="btn btn-info btn-sm">
                               &nbsp;&nbsp;&nbsp;&nbspVer&nbsp;&nbsp;&nbsp;&nbsp;
                            </a>
                            @else
                             <button class="btn btn-info btn-sm" disabled>
                               &nbsp;&nbsp;&nbsp;&nbspVer&nbsp;&nbsp;&nbsp;&nbsp;
                            @endcan
                            
                        </td>
                        <td width="10px">
                            @can('admin.intervenciones.edit')
                            <a href="{{ route('admin.activos.intervenciones.edit', [
                                    $intervencione->activo,
                                    $intervencione
                                ]) }}" class="btn btn-sm btn-warning">
                                    Editar
                            </a>
                            @else
                             <button class="btn btn-sm btn-warning" disabled>
                                    Editar
                            @endcan
                        </td>
                        <td width="10px">
                            @can('admin.intervenciones.destroy')
                            <form action="{{ route('admin.activos.intervenciones.destroy', ['activo' => $activo->id, 'intervencione' => $intervencione->id]) }}"
                                method="POST"
                                onsubmit="return confirm('¿Seguro que deseas eliminar esta intervención? Esta acción no se puede deshacer.')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">
                                     Eliminar
                                </button>
                            </form>
                            @else
                             <button class="btn btn-sm btn-danger" disabled>
                                     Eliminar
                                </button>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            No hay intervenciones registradas para este activo.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- FOOTER --}}
    <div class="card-footer text-right">
        <a
            href="{{ route('admin.activos.index') }}"
            class="btn btn-secondary btn-sm">
            Listado de Activos
        </a>

      
    </div>

</div>

   
@stop

