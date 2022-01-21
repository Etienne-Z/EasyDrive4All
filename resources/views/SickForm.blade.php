<p>instructeur {{ $data['first_name'] }} meld zichzelf ziek voor:</p>

<b>reden:</b>

{{$data['reason']}}
<br>
<b>tijden: </b>
van {{$data['start_date']}} tot  !isset($date['end_date']) ? {{$data['end_date']}} : "geen eind datum aangegeven".
