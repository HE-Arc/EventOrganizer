@extends('layouts.default')

@section('title', $user->name)

@section('bar_title',$user->name." ".trans('pages.my_events'))

@section('content')

    <div id="main-container">

        <div id="events" class="collection">
        <ul class="collapsible" data-collapsible="accordion">
            @forelse ($user->events()->get() as $event)
                <li>
                    <div class="collapsible-header"><span class="badge">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</span><span class="green-text accent-4">{{ $event->name }}</span></div>
                    <div class="collapsible-body">
                        <!--
                        @if ($event->image_url != null)
                            <img alt="{{$event->name}} profile picture" src="{{$event->image_url}}">
                        @else
                            <img alt="" src="{{asset("/imgs/event_picture_not_found.png")}}">
                        @endif

                            -->

                        <a href="{{ route("show_event", ['id' => $event->id, 'lang' => App::getLocale()]) }}" class="collection-item">{{ trans('pages.go_to_event') }}</a>
                        <p><i class="material-icons">place</i> {{$event->location}}</p>

                        <p>{{$event->description}}</p>
                    </div>
                </li>

            @empty
                <p>{{ trans('pages.nothing_to_do') }}</p>
            @endforelse
        </ul>


        </div>
    </div>


@endsection