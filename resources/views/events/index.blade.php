@extends('layouts.app')

@section('content')
<section class="hero is-primary" style="margin-bottom:50px">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">
              Les Evènements en cours
            </h1>
            <h2 class="subtitle">
                Les universités poste des informations ici 
            </h2>
          </div>
        </div>
</section>
<div class="container">

    <div class="row columns is-multiline">
        @foreach ($events as $event)
        <div class="column is-one-third">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            {{$event->title}}
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            {{ str_limit($event->description,120) }}
                            <small>du {{$event->start_on }} au {{$event->finish_on }}</small>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="{{route('events.show',$event)}}" class="card-footer-item">Plus de detail</a>
                    </footer>
                </div>
        </div>
        @endforeach
        
    </div>
</div>
@endsection





