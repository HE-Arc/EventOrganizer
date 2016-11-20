{{ Html::style( asset('css/show_event_style.css') ) }}

@extends('layouts.default')

@section('title', '$user->name')

@section('content')

    <div id="main-container">


        <div class="row col s6">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <span class="card-title">{{$user->name}}</span>
                        <p>My events</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="events" class="collection">
        <ul class="collapsible popout" data-collapsible="accordion">
            @forelse ($user->events()->get() as $event)
                <li>
                    <div class="collapsible-header"><span class="badge">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</span><span class="blue-text text-darken-1">{{ $event->name }}</span></div>
                    <div class="collapsible-body">

                        @if ($event->image_url != null)
                            <img alt="{{$event->name}} profile picture" src="{{$event->image_url}}">
                        @else
                            <img alt="" src="{{asset("/imgs/event_picture_not_found.png")}}">
                        @endif

                        <a href="event/{{ $event->id }}" class="collection-item">Go to event</a>
                        <p><i class="material-icons">place</i> {{$event->location}}</p>

                        <p>{{$event->description}}</p>
                    </div>
                </li>

            @empty
                <p>Nothing to do, let's organize some event</p>
            @endforelse
        </ul>


        </div>
    </div>


@endsection