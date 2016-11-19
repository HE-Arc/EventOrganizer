{{ Html::style( asset('css/show_event_style.css') ) }}

@extends('layouts.default')

@section('title', '$user->name')

@section('content')

    <div id="main-container">


        <div id="main-container">

            <div class="row col s6">
                <div class="card horizontal">
                    <div class="card-image">
                        @if ($user->image_url != null)
                            <img alt="{{$event->name}} profile picture" src="{{$event->image_url}}">
                        @else
                            <img alt="" src="{{url('/')}}/imgs/event_picture_not_found.png">
                        @endif
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <span class="card-title">{{$event->name}}t</span>
                            <p>{{$event->description}}</p>
                        </div>
                    </div>
                </div>
            </div>

        <div id="events" class="collection">



            @forelse ($user->events()->get() as $event)
                <a href="event/{{$event->id}}" class="collection-item"><span class="badge">1</span>{{$event->description}}</a>
            @empty
                <p>Nothing to do, let's organize some event</p>
            @endforelse

        </div>
    </div>


@endsection