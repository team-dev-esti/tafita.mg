@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @can('update',$mooc)
                <a href="{{route('chapter.edit',[$mooc,$chapter])}}" class="btn btn-success">Modifier ce chapitre</a>
                @endcan
                @include('partials.message')
                <h3>{{ $chapter->title}}</h3>
                <p>Video: {{ $chapter->video}}</p>
                <div class="contenue">
                    {!! $chapter->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection