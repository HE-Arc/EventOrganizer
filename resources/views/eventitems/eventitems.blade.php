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
        @forelse($event->eventItems as $item)
            @include("eventitems.item_template", ['id'=>$item->id, 'name'=>$item->name, 'qty_asked'=>$item->qty_asked])
        @empty
            No items
        @endforelse

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
            <h4>Choose a picture</h4>
            <div id="image-container">
                @foreach($images as $image)
                    <img src="{{url($image->url)}}" data-imageId="{{$image->id}}" alt="Image" class="item-image"/>
                @endforeach
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Choose</a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            //modal
            //$('#modal1').modal('open');

            var currentSelectedItem = undefined;

            $('.modal').modal();

            $('.modal-trigger').click(function (eventM) {
                currentSelectedItem = $(eventM.target).closest('.item');
            });

            $(".item-image").click(function(eventJ){

                var url = $(eventJ.target).attr('src');
                //console.log($(eventJ.target).attr('src'));
                var id = $(eventJ.target).attr('data-imageId');
                console.log("url : "+url+" id "+id);
                console.log(currentSelectedItem);

                currentSelectedItem.find('.image-id').attr('value',id);

                currentSelectedItem.find('.modal-trigger').addClass('hidden-image');
                currentSelectedItem.find('.selected-image').removeClass('hidden-image');
                currentSelectedItem.find('.selected-image').attr('src',url);

                $('#modal1').modal('close');

            });

            var cpt = {{$event->eventItems->last()->id}}
            {{dd("Salut")}}
            $("#addItem").click(function(){
                var context = {count_id: cpt++}
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
