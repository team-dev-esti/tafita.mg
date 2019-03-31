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
                                            
                                            <div class="tags has-addons level-item">
                                                <span class="tag is-rounded is-info">@ {{$mooc->user->name}} {{$mooc->user->lastname}}</span>
                                                <span class="tag is-rounded">{{$mooc->created_at}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content article-body">
                                        <p>{{$mooc->resume}}</p>
                                        <h3>Les Chapitres</h3>
                                        @can('update',$mooc)
                                             
                                                <a class="button is-succes" href="{{route('chapter.create',$mooc)}}">Ajouter nouveau chapitre</a>
                                                @endcan
                                        <ol>               
                                        @foreach ($mooc->chapters as $chapter)
                                            <li>
                                                <a href="{{route('chapter.show',[$mooc,$chapter])}}">{{ $chapter->title }}</a>
                                                |
                                                @can('update',$mooc)
                                                <a href="{{route('chapter.edit',[$mooc,$chapter])}}" class="btn btn-success">Modifier ce chapitre</a>
                                                @endcan
                                            </li>
                                        @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
               <!-- END PROMO BLOCK -->
               
                    <div id="disqus_thread"></div>
                    <script>
                    
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://hckiu19.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                
                    </section>
                    
             
            </div>
</div>

@endsection
