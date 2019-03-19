@if($page == "create")
{!! Form::open(['route' => 'mooc.store','files' => true]) !!}
@else
{!! Form::open(['route' => ['mooc.update',$mooc],'method'=>'put','files' => true]) !!}
@endif
<label for="">titre</label>
<input type="text" name="title" value="{{ $mooc->title }}">
<label for="">Resume</label>
<textarea name="resume" id="" cols="30" rows="10" >{{ $mooc->resume }}</textarea><br>
<label for="">Url Video youtube</label>
<input type="text" name="youtube_video" value="{{ $mooc->youtube_video }}"><br>
<label for="">Pdf</label>
<input type="file" name="pdf" id=""><br>
<label for="thumbnail">Vignette</label>
<input type="file" name="thumbnail" id="thumbnail"><br>
<button type="submit">Envoyer</button>
{!! Form::close() !!}