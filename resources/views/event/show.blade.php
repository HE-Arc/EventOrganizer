
{{ Html::style( asset('css/show_event_style.css') ) }}

@extends('layouts.default')

@section('title', $event->name)

@section('content')

    {!! Form::open(array('url'=>'order')) !!}
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
                        <span class="card-title">{{$event->name}}</span>
                        <div style="float:right;" class="chip white-text green accent-4">
                            Accomplit à 70% !
                        </div>
                        <p>{{$event->description}}</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="row col s6">
            <ul class="tabs">
                <li class="tab col s4"><a class="active green-text accent-4" href="#items">Items</a></li>
                <li class="tab col s4"><a class=" green-text accent-4" href="#participants">Participants</a></li>
                <li class="tab col s4"><a class=" green-text accent-4" href="#info">Infos</a></li>
            </ul>
        </div>

        <div id="items" class="row col s12">
            @forelse ($event->eventItems as $item)
                @include('event.show_item', ['item' => $item,'user' => $user])
            @empty
                <p>Nothing to bring ! Everything's on the house !</p>
            @endforelse
        </div>

        <div id="participants">
            @include('event.show_participants',['participants' => $event->participants])
        </div>

        <div id="info" class="row s6">
            @include('event.show_info', ['event' => $event])
        </div>
    </div>
    {!!  Form::close()!!}
    <script>

        $(function () {

            $(".item-qty-taken").on('change',(event) => {
                var elem = event.target
                var id = elem.getAttribute('item')
                url = $(elem).closest('form').attr('action')
                $.post(url, {
                        "qty_taken" : elem.value,
                        "event_item_id": id
                    }
                ).done(() => {
                    $('#my-contrib-'+id+" > .item-order-value").html(elem.value)

                    let perc = parseFloat(elem.value / elem.max * 100)

                    $("#complete-bar-"+id).css("width",perc+"%");

                    Materialize.toast(trans('pages.contribution_saved'), 500)

                    $(elem).fadeOut("slow",()=>{
                        $(elem).parents('.card-action').find('.alter-take-btn').fadeIn("slow")
                    })

                }).fail((error) => {
                    console.log(error)
                    Materialize.toast(trans('pages.contribution_error'), 10000)
                })
            })


            $(".take-btn,.alter-take-btn").on('click',(event) => {
                $(event.target).fadeOut("fast",()=>{
                    $(event.target).parent().find('.item-qty-taken').fadeIn()
                })
            })

        })



    </script>


@endsection