
@extends('layouts.default')

@section('content')


<form class="form-horizontal" action="{{ route('user_create_path') }}" method="post">
    {{ csrf_field() }}
    <fieldset>
        <legend>nuevo usuario</legend>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-lg-2 control-label">Contraseña</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" name="password" id="password" placeholder="Introduce una contraseña">

            </div>
        </div>
        <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Nombre de usuario</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="userName" id="userName" placeholder="Introduce un nombre de usuario">
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">

                <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
        </div>
    </fieldset>
</form>

    @stop