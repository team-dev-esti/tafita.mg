@extends('layouts.app')


@section('content')
    <div class="container">
        <h2>{{ $event->title }}</h2>
        <p>{{ $event->description }}</p>
        <h4>Les dossier à fournir</h4>
        <ul>
            @foreach ($event->files as $file)
                @foreach ($notFoundFiles as $notFoundFile)
                    @if($file->id === $notFoundFile->id )
                    <li>{{ $file->label }} (Not OK)</li>                 
                    @else
                    <li>{{ $file->label }} (OK)</li>
                    @endif
                @endforeach
            @endforeach
        </ul>

        @auth
            @can('participate', $event)
                <a href="#">Envoyer ma candidature</a>
            @else
                <a href="#">Completer mes dossier</a><br>
                <small>vos dossier ne sont pas compet veillez completer</small>
            @endcan
        @else
            <a href="#">Envoyer ma candidature</a>
        @endauth
        
        
    </div>
    
@endsection