
@extends('layouts.default')

@section('content')

    <h3>{{$user->name}}</h3>
    <h3>{{$user->email}}</h3>


    <h3>Propuestas</h3>
    @foreach($proposals as $proposal)

        <div class="panel panel-primary">
            <div class="panel-heading">
                <a href="sugerencia/{{$proposal->id}}"> <h3 class="panel-title">{{ $proposal->title }}</h3></a><a href="sugerencia/edit/{{$proposal->id}}">Editar</a> <!--esta ruta está bien? -->
            </div>
            <div class="panel-body">
                {{ \Illuminate\Support\Str::limit($proposal->body, 100) }}
                <br>creado: {{ $proposal->author->name}}
            </div>
        </div>

    @endforeach
@stop

