@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('partials.message')
                @can('update',$mooc)
                <a href="{{route('chapter.create',$mooc)}}" class="btn btn-success">Ajouter un chapitre</a>
                @endcan
                <h1>{{ $mooc->title }}</h1>
                <p>{{ $mooc->resume }}</p>
                <h3>Les Chapitres</h3>
                <ul>               
                @foreach ($mooc->chapters as $chapter)
                    <li>
                        <a href="{{route('chapter.show',[$mooc,$chapter])}}">{{ $chapter->title }}</a>
                        @can('update',$mooc)
                        <a href="{{route('chapter.edit',[$mooc,$chapter])}}" class="btn btn-success">Modifier ce chapitre</a>
                        @endcan
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
