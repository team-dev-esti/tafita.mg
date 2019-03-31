@if($page == "create")
{!! Form::open(['route' => ['chapter.store',$mooc]]) !!}
<h3 class="title has-text-centered">Nouveau chapitre</h3>
@else
@can('delete',$mooc)
{{ Form::open(['route'=>['chapter.destroy',$mooc,$chapter],'method'=>'delete'])}}
<button class="button is-danger" type="submit">Supprimer le chapitre</button>
{{ Form::close()}}
@endcan
{!! Form::open(['route' => ['chapter.update',$mooc,$chapter],'method'=>'put']) !!}
@endif

<div style="max-width:300px;margin:0 auto">
        <div class="field">  
            <div class="control">
                <label for="">titre</label>
                <input type="text" class="input" name="title" value="{{ $chapter->title }}">
            </div>
        </div>
        <div class="field">  
            <div class="control">
                    <label for="">Url video</label>
                    <input type="text"  class="input" name="video" value="{{ $chapter->video }}">
            </div>
        </div>
</div>
        <div class="field"> 
            <div class="control">
                <label for="">Contenue</label><br>
                <textarea name="content" id="editor" >{{ $chapter->content }}</textarea><br>
            </div>
        </div>
        <div class="flied has-text-centered">
            <button class="button is-info" type="submit">Envoyer</button>
        </div>





{!! Form::close() !!}