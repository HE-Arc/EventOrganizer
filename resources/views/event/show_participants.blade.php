<ul>
@foreach($participants as $participant)
        <div class="row">
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-content">
                        {{$participant->user->getIdentity()}}
                    </div>
                </div>
            </div>
        </div>
@endforeach
</ul>