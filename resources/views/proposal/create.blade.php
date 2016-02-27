
@extends('layouts.default')

@section('content')

<br>
    <form class="form-horizontal"  method="post">
        {{ csrf_field() }}
        <fieldset>
            <legend>Nueva sugerencia</legend>
            <div class="form-group">
                <label for="title" class="col-lg-2 control-label">Título</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Escribe un nuevo titulo">
                </div>
            </div>
            <div class="form-group">
                <label for="body" class="col-lg-2 control-label">Expón el problema</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="body" id="body" placeholder="">

                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">

                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </fieldset>
    </form>

@stop