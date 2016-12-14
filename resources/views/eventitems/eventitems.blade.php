{{ Html::style( asset('css/event_item_style.css') ) }}
@extends('layouts.default')

@section('title', trans('pages.add_a_item'))

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    <h3>Ajouter un item à la liste</h3>

    {!! Form::open(array('url'=>route("store_item", ['lang' => App::getLocale()]))) !!}

    <div id="itemsContainer" class="row col s12">
        @foreach($event->eventItems as $item)
            @include("eventitems.item_template", $item)
        @endforeach
    </div>

    {!! Form::hidden('event_id',$event->id) !!}
    {!! Form::submit(trans('pages.add')) !!}

    {!! Form::close() !!}
    <div id="addButton">
        <a class="btn-floating btn-large waves-effect waves-light red" id="addItem" ><i class="material-icons">add</i></a>
    </div>

    <!-- Modal Structure -->
    <div id="modal1" class="modal  bottom-sheet">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            //modal
            //$('#modal1').modal('open');
            $('.modal').modal();

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
