<h2>Nueva intervención registrada</h2>

<p>Se ha creado una nueva intervención:</p>

<ul>
    <li>ID Activo: {{ $intervencion->activo->id}}</li>
    <li>Nombre: {{ $intervencion->activo->nombre}}</li>
    <li>ID Intervención: {{ $intervencion->id }}</li>
    <li>Descripción: {{ $intervencion->observaciones}}</li>
    <li>Estado: {{ $intervencion->estado }}</li>
    <li>Fecha: {{ $intervencion->created_at }}</li>
    
</ul>