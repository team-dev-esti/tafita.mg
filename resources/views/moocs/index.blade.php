@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('partials.message')
                @auth
                <a class="btn btn-success" href="{{ route('mooc.create') }}">Creer</a>   
                @endauth
                <ul>
                    @foreach ($moocs as $mooc)
                    <li>{{ $mooc->title }} 
                        <a href="{{route('mooc.show',$mooc)}}">Voir</a> 
                        @can('update',$mooc)
                        <a href="{{route('mooc.edit',$mooc)}}">Modifier</a>
                        @endcan
                        @can('delete',$mooc)
                        {{ Form::open(['route'=>['mooc.destroy',$mooc],'method'=>'delete'])}}
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                        {{ Form::close()}}
                        @endcan
                    @endforeach 
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
