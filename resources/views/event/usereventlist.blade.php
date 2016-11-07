{{ Html::style( asset('css/show_event_style.css') ) }}

@extends('layouts.default')

@section('title', '$user->name')

@section('content')

    <div id="main-container">
    Quelque chose;

        <div id="items" class="row col s12">

            C'est cela
            @forelse ($user->events() as $event)
                @include('event.show', ['event' => $event])
            @empty
                <p>Nothing to do, let's organize some event</p>
            @endforelse

        </div>
    </div>


@endsection