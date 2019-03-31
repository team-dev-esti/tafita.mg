@extends('layouts.app')

@section('content')
<section class="hero is-danger" style="margin-bottom:50px">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">
              Mooc
            </h1>
            <h2 class="subtitle">
              Liste des moocs
              
            <p class="subtitle">
                <a href="{{route('mooc.create')}}" class="button is-danger is-inverted is-outlined">Créer un mooc</a>  
            </p>
              
            </h2>
          </div>
        </div>
</section>
<div class="container">

    <div class="row columns is-multiline">
        @foreach ($moocs as $mooc)
        <div class="column is-one-third">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            {{$mooc->title}}
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            {{ str_limit($mooc->resume,120) }}
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="{{route('mooc.show',$mooc)}}" class="card-footer-item">Voir</a>
                        @can('update',$mooc)
                        <a  class="card-footer-item" href="{{route('mooc.edit',$mooc)}}">Modifier</a>
                        @endcan
                        {{-- {{ Form::open(['route'=>['mooc.destroy',$mooc],'method'=>'delete'])}}
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                        {{ Form::close()}} --}}

                        
                    </footer>
                </div>
        </div>
        @endforeach
        
    </div>
</div>
@endsection
