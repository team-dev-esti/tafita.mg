@extends('layouts.app')

@section('content')
<div class="container">
        @if (session('status'))
            <div class="notification is-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h3 class="title has-text-centered">Votre interface de gestion de fichier</h3>
                   
        <h3 class="title">Mes dossiers</h3>
        <div class="box">
            <ul>
                @foreach ($user->files as $file)
                <li><a href="{{ route('file.show',[$user,$file])}}" target="_blank">{{ $file->label }}</a></li>
                @endforeach
            </ul>
        </div>
        @include('partials.message')
        <h3 class="title">Ajouter Mes dossiers</h3>
        <a href="{{ route('file.edit')}}">Mettre à jour mes fichier</a>
        <div class="box">
                {{ Form::open(['route'=>['file.store'],'files' => true])}}
                @foreach ($files as $file)
                                          
                    @if($file->type === 'image' || $file->type === 'pdf' )
                    <div class="flield">
                        <div class="control">
                            <label for="#">{{ $file->label }}</label>
                            {{ Form::file($file->type.'('.$file->id.')') }}<br><br>
                        </div>
                    </div>
                    @endif
                    
                @endforeach
                <button class="button is-info" type="submit">Envoyer</button>
                {{ Form::close()}}
        </div>
        <h3 class="title">Mon compte</h3>
        <div class="box">
                {{ Form::open(['route'=>['user.update',$user],'method'=>'put'])}}
                <div class="field">
                    <div class="control">
                            <label for="">Nom</label>
                            <input type="text" class="input" name="name" id="" value="{{ $user->name }}"><br>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                            <label for="">Prenom</label>
                            <input type="text" class="input" name="lastname" id="" value="{{ $user->lastname }}"><br>
                    </div>
                </div>
              
                
                <div class="field">
                    <label for="">Changer de mot de passe</label>
                    <input type="password" class="input" name="password" id="">
                    <label for="">Confirmation</label>
                    <input type="password" class="input" name="password_confirmation" id="">
                </div>
                <button class="button is-success" type="submit">Modifier</button>
                {{ Form::close()}}
        </div>
        <br>
        You are logged in!
          
</div>
@endsection
