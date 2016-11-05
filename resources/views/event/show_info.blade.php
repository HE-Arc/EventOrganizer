<div class="col s16">
    <div class="card">
        <div class="card-image">
            <img
                    alt="location of {{$event->location}} in google maps"
                    src="https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=600x300&maptype=roadmap%20&markers=color:red%7Clabel:S%7C{{$event->location}}&key=AIzaSyAd8qghy79K94WYsFVSV6ahJKNrYNGFUiI">
        </div>
        <div class="card-content">
            <p>{{$event->location}}</p>
        </div>
    </div>
</div>



