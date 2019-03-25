@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard {{ $user->name }}</div>
                <div id="app">
                    <boot></boot>
                </div>
                <div class="card-body">
                    <h3>Mon compte</h3>
                    {{ Form::open(['route'=>['user.update',$user],'method'=>'put'])}}
                    <label for="">Nom</label>
                    <input type="text" name="name" id="" value="{{ $user->name }}"><br>
                    <label for="">Prenom</label>
                    <input type="text" name="lastname" id="" value="{{ $user->lastname }}"><br>
                    <label for="">Changer de mot de passe</label>
                    <input type="password" name="password" id="">
                    <label for="">Confirmation</label>
                    <input type="password" name="password_confirmation" id="">
                    <button type="submit">Modifier</button>
                    {{ Form::close()}}
                    <br>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
