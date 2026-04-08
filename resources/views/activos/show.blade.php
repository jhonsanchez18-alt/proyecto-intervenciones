<x-app-layout>
    <div class="container py-8"></div>
        <h1 class="text-2xl font-bold mb-4">{{ $activo->nombre }}</h1>
        <p><strong>Descripción:</strong> {{ $activo->descripcion }}</p>
        <p><strong>Valor:</strong> {{ $activo->valor }}</p>
        <p><strong>Categoría:</strong> {{ $activo->categoria->nombre }}</p>
        <table>
            <thead>
                <tr>
                    <th class="px-4 py-2">Numero</th>
                    <th class="px-4 py-2">Fecha de Intervención</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Costo</th>
                     <th class="px-4 py-2">ver</th>
                </tr>
            </thead>
            <tbody>
                @if($activo->intervenciones->isEmpty())
                    <tr>
                        <td class="border px-4 py-2" colspan="5">No hay intervenciones registradas para este activo.</td>
                    </tr>
                @else   
                @foreach($activo->intervenciones as $intervencion)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration}}</td>
                        <td class="border px-4 py-2">{{ $intervencion->fecha_intervencion }}</td>
                        <td class="border px-4 py-2">{{ $intervencion->tipo_intervencion }}</td>
                        <td class="border px-4 py-2">{{ $intervencion->tecnico->nombre }}</td>
                        <td class="border px-4 py-2"><a href="{{ route('intervenciones.show', $intervencion) }}">Ver</a></td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
         
    </div>
</x-app-layout>
