@extends('layouts.default')

@section('title', trans('pages.add_a_item'))

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    <h3>Ajouter un item à la liste</h3>

    {!! Form::open(['url'=>'item']) !!}

    <div id="itemsContainer">
    </div>
    {!! Form::hidden('event_id',$event->id) !!}
    {!! Form::submit(trans('pages.Add')) !!}
    {!! Form::close() !!}
    <a class="btn-floating btn-large waves-effect waves-light red" id="addItem" style="float: right"><i class="material-icons">add</i></a>
    @include('eventitems.item_template')
    <script>
        $(document).ready(function() {
            var cpt = 0;

            $("#addItem").click(function(){
                var context = {count: cpt};
                cpt++;
                var source = $("#model").html();
                var template = Handlebars.compile(source);
                var html = template(context);
                $("#itemsContainer").append(html).hide().fadeIn();
                $(".delete-item").on('click',function () {
                    $(this).closest(".item").remove()
                })
            });
        });
    </script>
@endsection
