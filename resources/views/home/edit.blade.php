@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Mettre à jour mes donnée</h2>
        @include('partials.message')
        {{ Form::open(['route'=>['file.update'],'method' => 'put','files' => true])}}
            @foreach ($user->files as $file)
                                        
                    @if($file->type === 'image' || $file->type === 'pdf' )
                    <label for="#">{{ $file->label }}</label>
                    {{ Form::file($file->type.'('.$file->id.')') }} <br>
                    @endif
                
            @endforeach
            <button type="submit">Envoyer</button>
        {{ Form::close()}}
    </div>
@endsection