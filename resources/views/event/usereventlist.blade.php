{{ Html::style( asset('css/show_event_style.css') ) }}

@extends('layouts.default')

@section('title', '$user->name')

@section('content')

    <div id="main-container">

        <div id="items" class="row col s12">

            @forelse ($user->events()->get() as $event)
                {{$event->description}}
            @empty
                <p>Nothing to do, let's organize some event</p>
            @endforelse

        </div>
    </div>


@endsection