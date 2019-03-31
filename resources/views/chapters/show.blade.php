@extends('layouts.app')

@section('content')
<div class="mooc">
        <section class="hero is-info is-medium is-bold">
                <div class="hero-body">
                        <?xml version="1.0" encoding="utf-8"?>
        
                    <div class="container has-text-centered">
                        <h1 class="title">{{$mooc->title}}</h1>
                    </div>
                </div>
            </section>
        <div class="container">
                <section class="articles">
                        <div class="column is-8 is-offset-2">
                            <!-- START ARTICLE -->
                            <div class="card article">
                                <div class="card-content">
                                    <div class="media">
                                            <div class="media-center">
                                                    <img src="https://api.adorable.io/avatars/100/{{$mooc->user->name}}@adorable.png" class="author-image" alt="Placeholder image">
                                                </div>
                                        <div class="media-content has-text-centered">
                                            
                                                @can('update',$mooc)
                                                <a href="{{route('chapter.edit',[$mooc,$chapter])}}" class="btn btn-success">Modifier ce chapitre</a>
                                                @endcan
                                        </div>
                                    </div>
                                    <div class="content article-body">
                                            @include('partials.message')
                                            <h3>{{ $chapter->title}}</h3>
                                            <p>Video: {{ $chapter->video}}</p>
                                            <div class="contenue">
                                                {!! $chapter->content !!}
                                            </div>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
               <!-- END PROMO BLOCK -->
                            
                    </section>
             
            </div>
</div>

@endsection