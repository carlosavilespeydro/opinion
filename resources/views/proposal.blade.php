@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-sm-8">
            <h3>{{$proposal->title}}</h3>

            <blockquote>
                <p>{{$proposal->body}}</p>
                <small>{{$proposal->author->name}}</small>
            </blockquote>
        </div>
        <div class="col-sm-4">
            <h4>Firmas recogidas</h4>
        </div>
    </div>

    <H3>Comentarios</H3>
@stop