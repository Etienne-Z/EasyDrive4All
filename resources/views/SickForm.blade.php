<p>instructeur {{ $data['first_name'] }} meld zichzelf ziek voor:</p>

<b>reden:</b>

{{$data['reason']}}
<br>
<b>tijden: </b>

van {{$data['start_date']}} tot  @isset($data['start_date']){{$data['start_date']}}@endisset 
