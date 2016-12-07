{{ Html::style( asset('css/event_item_style.css') ) }}
@extends('layouts.default')

@section('title', trans('pages.add_a_item'))

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    <h3>Ajouter un item à la liste</h3>

    {!! Form::open(['url'=>'item']) !!}

    <div id="itemsContainer" class="row col s12">
        @foreach($event->eventItems as $item)
            @include("eventitems.item_template", $item)
        @endforeach
    </div>

    {!! Form::hidden('event_id',$event->id) !!}
    {!! Form::submit(trans('pages.Add')) !!}

    {!! Form::close() !!}
    <div id="addButton">
        <a class="btn-floating btn-large waves-effect waves-light red" id="addItem" ><i class="material-icons">add</i></a>
    </div>

    <script>
        $(document).ready(function() {
            var cpt = 0;
            $("#addItem").click(function(){
                var context = {count: cpt++}
                var source = $("#model").html();
                //var template = Handlebars.compile(source);
                var html = template(context);
                $("#itemsContainer").append(html).hide().fadeIn();
                $(".delete-item").on('click',function () {
                    $(this).closest(".item").remove()
                })
            });
        });
    </script>
@endsection
