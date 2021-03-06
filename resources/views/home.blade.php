@extends('layouts.default')

@section('content')
    <h3>Ultimas propuestas</h3>

    @foreach($proposals as $proposal)

        <div class="panel panel-primary">
            <div class="panel-heading">
               <a href="sugerencia/{{$proposal->id}}"> <h3 class="panel-title">{{ $proposal->title }}</h3></a>
            </div>
            <div class="panel-body">
                {{ \Illuminate\Support\Str::limit($proposal->body, 100) }}
                <br>creado: {{ $proposal->author->name}}
            </div>
        </div>

    @endforeach



    @stop