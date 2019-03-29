@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('partials.message')
                    <h3>Mes dossiers</h3>
                    
                    {{ Form::open(['route'=>['file.store'],'files' => true])}}
                    @foreach ($files as $file)
                        @for ($i = 0; $i < count($user->files); $i++)
                        
                            @if($file->type === 'image' || $file->type === 'pdf' )
                            <label for="#">{{ $file->label }}</label>
                            {{ Form::file($file->type.'('.$file->id.')') }} <br>
                            @endif
                        @endfor  
                    @endforeach
                    <button type="submit">Envoyer</button>
                    {{ Form::close()}}
                    <h3>Mes mooc</h3>

                    <h3>Favoris</h3>
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
