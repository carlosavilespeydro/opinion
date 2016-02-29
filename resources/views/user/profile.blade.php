
@extends('layouts.default')

@section('content')

    <label>Nombre:</label><h5>{{$user->name}}</h5>
    <label>Email:</label><h5>{{$user->email}}</h5>


    <h3>Propuestas</h3>
    @if(count($proposals) > 0)

    @foreach($proposals as $proposal)

        <div class="panel panel-primary">
            <div class="panel-heading">
                <a href="sugerencia/{{$proposal->id}}"> <h3 class="panel-title">{{ $proposal->title }}</h3></a> <!--esta ruta está bien? -->
            </div>
            <div class="panel-body">
                {{ \Illuminate\Support\Str::limit($proposal->body, 100) }}
                <br>creado: {{ $proposal->author->name}}
                <br><a href="sugerencia/edit/{{$proposal->id}}">Editar</a>
                <br><button onClick="viewDeleteContext({{$proposal->id}},true)" type="button" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
            </div>
        </div>

    @endforeach

    <div class="modal" id="confirmDeleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="idProposal" value="">

                    <h4 class="modal-title">Eliminar propuesta</h4>
                </div>
                <div class="modal-body">
                    <p>¿Deseas eliminar la propuesta?</p>
                </div>
                <div class="modal-footer">
                    <button id="deleteButton" onclick="" type="button" class="btn btn-default" data-dismiss="modal">Eliminar</button>
                    <button onClick="viewDeleteContext(false)" type="button" class="btn btn-primary">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    @else

        <div class="alert alert-dismissible alert-info">

            Todavía no has creado ninguna propuesta <a href="{{route('proposal_new_path')}}" class="alert-link"> <strong>¡Crea una nueva propuesta!</strong></a>
        </div>


    @endif
@stop


