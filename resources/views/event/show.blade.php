
{{ Html::style( asset('css/show_event_style.css') ) }}

@extends('layouts.default')

@section('title', $event->name)

@section('content')

    <div id="main-container">

        <div class="row col s6">
            <div class="card horizontal">
                <div class="card-image">
                    @if ($event->image_url != null)
                        <img src="{{$event->image_url}}">
                    @else
                        <img src="http://www.buzzle.com/img/articleImages/561004-7811-40.jpg">
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

        <div class="row col s6">
            <ul class="tabs">
                <li class="tab col s4"><a class="active blue-text text-darken-2" href="#items">Items</a></li>
                <li class="tab col s4"><a class=" blue-text text-darken-1" href="#users">Participants</a></li>
                <li class="tab col s4"><a class=" blue-text text-darken-1" href="#info">Infos</a></li>
            </ul>
        </div>

        <div id="items" class="row s6">
            @forelse ($event->eventItems()->get() as $item)
                @include('event.show_item', ['item' => $item])
            @empty
                <p>Nothing to bring ! Everything's on the house !</p>
            @endforelse

        </div>

        <div id="info" class="row s6">
            @include('event.show_info', ['event' => $event])
        </div>
    </div>


@endsection