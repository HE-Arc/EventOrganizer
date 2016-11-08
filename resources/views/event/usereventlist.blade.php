{{ Html::style( asset('css/show_event_style.css') ) }}

@extends('layouts.default')

@section('title', '$user->name')

@section('content')

    <div id="main-container">

        <div class="row col s6">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <span class="card-title">{{$user->name}}t</span>
                        <p>My events</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="events" class="collection">

            @forelse ($user->events()->get() as $event)
                <a href="event/{{ $event->id }}" class="collection-item"><span class="badge"> {{ $event->location }} at {{ $event->date }}</span>{{ $event->name }}</a>
            @empty
                <p>Nothing to do, let's organize some event</p>
            @endforelse

        </div>
    </div>


@endsection