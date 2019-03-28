@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1>Les Evennements</h1>
    <div class="row">
            @foreach ($events as $event)
            <div class="card col-12 col-md-3">
                <div class="card-body">
                    <h5 class="card-title">{{$event->title }}</h5>
                    <small>de {{$event->user->name   }}</small>
                    <h6 class="card-subtitle mb-2 text-muted"> de {{$event->start_on }} à {{$event->finish_on }}</h6>
                    <p class="card-text">{{str_limit($event->description, $limit = 75, $end = '...')}}</p>
                    <a href="{{ route('events.show',$event) }}" class="card-link">plus de detail</a>
                </div>
            </div>
            @endforeach   
    </div>
</div>
@endsection