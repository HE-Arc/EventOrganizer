
{{ Html::style( asset('css/show_event_style.css') ) }}

@extends('layouts.default')

@section('title', $event->name)

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div id="main-container">

        <div class="row col s6">
            <div class="card horizontal">
                <div class="card-image">
                    @if ($event->image_url != null)
                        <img alt="{{$event->name}} profile picture" src="{{$event->image_url}}">
                    @else
                        <img alt="" src="{{asset("/imgs/event_picture_not_found.png")}}">
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

        <div id="items" class="row col s12">
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

    <script>

        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".item-qty-taken").on('change',() => {
                let elem = event.target
                $.post("{{url('/')}}/order", {
                        "qty_taken" : elem.value,
                        "event_item_id": elem.getAttribute('item')
                    }
                ).done(() => {
                    Materialize.toast("You're contribution has been saved !", 4000)
                }).fail((error) => {
                    console.log(error)
                    Materialize.toast("Something went wrong, check console", 10000)
                })
            })

        })



    </script>


@endsection