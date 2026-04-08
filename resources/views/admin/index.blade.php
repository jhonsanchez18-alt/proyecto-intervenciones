@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel de Control</h1>
@stop

@section('content')

<div class="row">

    {{-- Activos --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $activos }}</h3>
                <p>Total de Activos</p>
            </div>
            <div class="icon">
                <i class="fas fa-cogs"></i>
            </div>
            <a href="{{ route('admin.activos.index') }}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    {{-- Intervenciones --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $intervenciones }}</h3>
                <p>Intervenciones Registradas</p>
            </div>
            <div class="icon">
                <i class="fas fa-tools"></i>
            </div>
            <a href="#" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    {{-- Usuarios --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $usuarios }}</h3>
                <p>Usuarios del Sistema</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    {{-- Activos creados hoy --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $activosHoy }}</h3>
                <p>Activos creados hoy</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-day"></i>
            </div>
            <a href="#" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

</div>

{{-- FILA DE GRÁFICOS --}}
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Activos por mes</div>
            <div class="card-body">
                <canvas id="graficoActivos"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Intervenciones por mes</div>
            <div class="card-body">
                <canvas id="graficoIntervenciones"></canvas>
            </div>
        </div>
    </div>
</div>

{{-- TABLA RECIENTES --}}
<div class="card mt-3">
    <div class="card-header">
        Últimos activos creados
    </div>
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Activo::latest()->take(5)->get() as $a)
                <tr>
                    <td>{{ $a->nombre }}</td>
                    <td>{{ $a->tipo->nombre ?? 'N/A' }}</td>
                    <td>{{ $a->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Ejemplo gráfico de activos
const ctx = document.getElementById('graficoActivos');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Ene','Feb','Mar','Abr','May','Jun','Jul'],
        datasets: [{
            label: 'Activos',
            data: [5,7,3,9,10,4,12],
        }]
    }
});
</script>

@stop
