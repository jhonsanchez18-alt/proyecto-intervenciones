@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel de Control</h1>
@stop

@section('content')

   

    <p>Lista de Usuarios</p>

    @livewire('admin.user-index')

    

@stop
@livewireScripts
 @livewireStyles