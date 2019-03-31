@extends('layouts.app')


@section('content')
    <div class="container">
        @include('partials.message')
        <h2 style="margin-top:25px" class="title has-text-centered">{{ $event->title }}</h2>
        <p class="has-text-centered">organiser par: {{ $event->user->name }}</p>
        <div style="max-width:300px;margin:0 auto">
                <p>{{ $event->description }}</p>
                <div style="margin-top:20px">

                        <b>Les dossier à fournir</b>
                    
                        <ul>
                            @foreach ($event->files as $file)               
                                <li>- {{ $file->label }}</li>
                            @endforeach
                        </ul>
                </div>
        
                @auth
                <div style="margin-top:20px">
                    <b>Les dossier à completer</b>
                    <ul>
                        @foreach ($notFoundFiles as $file)               
                            <li><span class="has-text-danger"><i class="fa fa-circle"></i></span> {{ $file->label }}</li>
                        @endforeach
                    </ul>  
                </div>  
                @endauth
                <div style="margin-top:20px">
                        @auth
                        @can('participate', $event)
                        {{Form::open(['route'=>'event.participate'])}}
                        {{ Form::hidden('event',$event->id)}}
                        <button class="button is-success" type="submit">Envoyer ma candidature</button>
                        {{Form::close()}}
                        @else
                            <a class="button is-danger is-outlined" href="{{route('home')}}">Completer mes dossier</a><br>
                            <small>vos dossier ne sont pas compet pour participer à cette evenement</small>
                        @endcan
                    @else
                        <a href="{{route('home')}}" class="button is-success is-outlined" href="#">Envoyer ma candidature</a>
                    @endauth
                </div>

        </div>
        
        
    </div>
    
@endsection