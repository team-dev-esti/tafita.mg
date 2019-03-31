@extends('layouts.app')

@section('content')
<div class="container">

    <div id="app" class="home">
        <boot></boot>
    </div>
    <div class="box">
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
    </div>       
</div>
@endsection
