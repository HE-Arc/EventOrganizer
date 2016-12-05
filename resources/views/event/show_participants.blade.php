<ul>
@foreach($participants as $participant)
    <li>{{$participant->user->email}}</li>
@endforeach
</ul>