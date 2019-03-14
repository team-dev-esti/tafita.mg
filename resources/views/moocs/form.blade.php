@if($page == "create")
{!! Form::open(['route' => 'mooc.store']) !!}
@else
{!! Form::open(['route' => ['mooc.update',$mooc],'method'=>'put']) !!}
@endif
<label for="">titre</label>
<input type="text" name="title" value="{{ $mooc->title }}">
<label for="">Resume</label>
<textarea name="resume" id="" cols="30" rows="10" >{{ $mooc->resume }}</textarea>
<label for="">Pdf</label>
<input type="file" name="pdf" id="">
<button type="submit">Envoyer</button>
{!! Form::close() !!}