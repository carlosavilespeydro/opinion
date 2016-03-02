@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-sm-8">
            <h3>{{$proposal->title}}</h3>

            <blockquote>
                <p>{{$proposal->body}}</p>
                <small>{{$proposal->author->name}}</small>
            </blockquote>

            <H3>Comentarios    <span class="badge">{{$proposal->comments->count()}}</span></H3>
            <div><a onClick="viewNewComment({{$proposal->id}})" class="btn btn-info">Comentar</a>
            </div><br>

            <form  id="newCommentForm" class="form-horizontal"  method="post" action="{{route('proposal_comment_path', $proposal->id)}}">
                {{ csrf_field() }}


                    <div class="form-group">
                        <label for="newComment" class="col-lg-2 control-label">Escribe el comentario</label>
                        <div class="col-lg-10">
                            <input type="textarea" class="form-control" name="newComment" id="newComment" value="">

                        </div>
                    </div>
                <button type="submit" class="btn btn-primary">Guardar</button>

            </form>


            @if($proposal->comments->count()==0)
                <div class="alert alert-dismissible alert-success">

                    <p>Todavía no hay comentarios. <strong>¡Se el primero en comentar!</strong></p>
                </div>

            @else
            @foreach($proposal->comments as $comment)
            <div class="well well-sm">
                <p>{{$comment->Comment}}</p>
                <p class="text-success">{{$comment->author->name}}</p>
                <p class="text-alert">{{date('l jS \of F Y h:i:s A',strtotime($comment->created_at))}}</p>
            </div>
                @endforeach
            @endif



        </div>
        <div class="col-sm-4">
            <h4>Firmas recogidas</h4>
        </div>
    </div>


@stop