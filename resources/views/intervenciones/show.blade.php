
<x-app-layout>
    <div class="container py-8">
       <table>
        <thead>
            <tr>
                
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Fecha de Intervención</th>
                <th class="px-4 py-2">Tipo de Intervención</th>
                <th class="px-4 py-2">Técnico</th>
                <th class="px-4 py-2">repuestos</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border px-4 py-2">{{ $intervencion->id }}</td>
                <td class="border px-4 py-2">{{ $intervencion->fecha_intervencion }}</td>
                <td class="border px-4 py-2">{{ $intervencion->tipo_intervencion }}</td>
                <td class="border px-4 py-2">{{ $intervencion->tecnico->nombre }}</td>
                <!-- <td class="border px-4 py-2">{{ $intervencion->activo->marca }}</td> -->

                <td class="border px-4 py-2">
                    <ul>
                        @if($intervencion->repuestos->isEmpty())
                        <li>No hay repuestos asociados.</li>
                        @else
                    @foreach($intervencion->repuestos as $repuesto)
                        <li>{{ $repuesto->nombre}}</li>
                        <li>{{ $repuesto->pivot->estado}}</li>
                    @endforeach
                    @endif
                    </ul>
                    @foreach($intervencion->repuestos as $repuesto)
                        <div class="form-check">
                            <input class="form-check-input"
                                type="checkbox"
                                disabled
                                {{ $repuesto->pivot->estado ? 'checked' : '' }}>

                            <label class="form-check-label">
                                {{ $repuesto->nombre }}
                            </label>
                        </div>
                    @endforeach
                </td>
            </tr>
        </tbody>
       </table>
    </div>
</x-app-layout>