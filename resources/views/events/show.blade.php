@extends('layouts.app')


@section('content')
    <div class="container">
        @include('partials.message')
        <h2>{{ $event->title }}</h2>
        <p>{{ $event->description }}</p>
        <h4>Les dossier à fournir</h4>
        <ul>
            @foreach ($event->files as $file)               
                <li>{{ $file->label }}</li>
            @endforeach
        </ul>

        @auth
        <h4>Les dossier à completer</h4>
        <ul>
            @foreach ($notFoundFiles as $file)               
                <li>{{ $file->label }}</li>
            @endforeach
        </ul>    
        @endauth
        @auth
            @can('participate', $event)
            {{Form::open(['route'=>'event.participate'])}}
            {{ Form::hidden('event',$event->id)}}
            <button type="submit">Envoyer ma candidature</button>
            {{Form::close()}}
            @else
                <a href="{{route('home')}}">Completer mes dossier</a><br>
                <small>vos dossier ne sont pas compet veillez completer</small>
            @endcan
        @else
            <a href="#">Envoyer ma candidature</a>
        @endauth
        
        
    </div>
    
@endsection