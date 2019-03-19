@if($page == "create")
{!! Form::open(['route' => ['chapter.store',$mooc]]) !!}
@else
@can('delete',$mooc)
{{ Form::open(['route'=>['chapter.destroy',$mooc,$chapter],'method'=>'delete'])}}
<button class="btn btn-danger" type="submit">Supprimer</button>
{{ Form::close()}}
@endcan
{!! Form::open(['route' => ['chapter.update',$mooc,$chapter],'method'=>'put']) !!}
@endif

<label for="">titre</label>
<input type="text" name="title" value="{{ $chapter->title }}">
<label for="">Url video</label>
<input type="text" name="video" value="{{ $chapter->video }}">
<label for="">Contenue</label>
<textarea name="content" id="" cols="30" rows="10" >{{ $chapter->content }}</textarea><br>
<button type="submit">Envoyer</button>
{!! Form::close() !!}