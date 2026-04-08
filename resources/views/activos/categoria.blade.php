<x-app-layout>
    @foreach($activos as $activo)
        
            <p>{{ $activo->nombre }}</p>
           
        
    @endforeach
    {{$activos->links()}}
</x-app-layout>