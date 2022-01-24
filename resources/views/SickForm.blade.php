<p>instructeur {{ $data['first_name'] }} meld zichzelf ziek voor:</p>

<b>reden:</b>

{{$data['reason']}}
<br>
<b>tijden: </b>
van {{$data['start_date']}} tot  {{$date['end_date']}}
{{-- {{if(!isset($date['end_date'])){$data['end_date']}else{"geen eind datum aangegeven"}. --}}
