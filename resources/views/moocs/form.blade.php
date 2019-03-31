@if($page == "create")
{!! Form::open(['route' => 'mooc.store','files' => true]) !!}
<h2 class="title has-text-centered">Crée un MOOC</h2>
@else
{!! Form::open(['route' => ['mooc.update',$mooc],'method'=>'put','files' => true]) !!}
@endif
<div style="max-width:300px;margin:0 auto">
        <div class="field">  
            <div class="control">
                <label for="">Titre</label>
                <input class="input" type="text" name="title" value="{{ $mooc->title }}" required>
            </div>
        </div>
        <div class="field">  
            <div class="control">
                <label for="">Resume</label>
                <textarea class="textarea" name="resume" id="" cols="30" rows="10" required>{{ $mooc->resume }}</textarea><br>
            </div>
        </div>
        <div class="field">  
            <div class="control">
                <label for="">Url Video youtube</label>
                <input class="input" type="text" name="youtube_video" value="{{ $mooc->youtube_video }}"><br>
            </div>
        </div>
        <div class="field"> 
                <div class="columns">
                        <div class="column">
                                <div class="file is-boxed">
                                    <label class="file-label">
                                        <input class="file-input" type="file" name="thumbnail">
                                        <span class="file-cta">
                                            <span class="file-icon">
                                                <i class="fa fa-upload"></i>
                                            </span>
                                            <span class="file-label">
                                                vignette
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="column">
                                    <div class="file is-boxed">
                                            <label class="file-label">
                                                <input class="file-input" type="file" name="pdf">
                                                <span class="file-cta">
                                                    <span class="file-icon">
                                                        <i class="fa fa-upload"></i>
                                                    </span>
                                                    <span class="file-label">
                                                        Pdf
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                            </div>
                </div>
            
        </div>
        <div class="flied has-text-centered">
            <button class="button is-info" type="submit">Envoyer</button>
        </div>
</div>

{!! Form::close() !!}