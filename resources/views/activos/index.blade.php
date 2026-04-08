<x-app-layout>
    <h1>Activos Fijos</h1>
    @if($activos->isEmpty())
        <p>No hay activos fijos registrados.</p>
    @else

        <table class="table-auto w-full border-collapse border border-gray-200 mt-4 bg-red-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Valor</th>
                    <th>Editar</th>
                    <th>Ver</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activos as $activo)
                    <tr>
                        <td>{{ $activo->id }}</td>
                        <td>{{ $activo->nombre }}</td>
                        <td>{{ $activo->descripcion }}</td>
                        <td> {{$activo->categoria->nombre }}
                        <td></td>
                        <td><a href="{{route('activos.show', $activo)}}">Ver</a></td>
                      
                   </td>

                    
                    </tr>
                    
              
                @endforeach
                <!-- Links de paginación -->
               

            </tbody>
        </table>
        {{ $activos->links() }}
        
    @endif
    
</x-app-layout>