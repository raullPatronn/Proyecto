<div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Lista de Solicitudes</h1>

           @foreach ($solicitudes as $solicitud)
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">{{$solicitud->titulo}}</h3>
            <p class="card-text">{{$solicitud->descripcion}}</p>
            <p class="card-text">{{$solicitud->ayuda}}</p>
            <button type="button" class="btn btn-primary" wire:click="irAChat({{$solicitud->usuario_id}})"><strong>Brindar Una Mano</strong></button>
        </div>
    </div>
@endforeach


            {{ $solicitudes->links() }}
        </div>
    </div>
</div>


</div>
