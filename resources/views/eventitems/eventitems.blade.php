@extends('layouts.default')

@section('title', trans('pages.add_a_item'))

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    @section('bar_title',"Ajoutez des items à $event->name")

    {!! Form::open(array('url'=>route("store_item", ['lang' => App::getLocale()]))) !!}

    <div id="itemsContainer" class="row col s12">
        @forelse($event->eventItems as $item)
            @include("eventitems.item_template", ['id'=>$item->id, 'name'=>$item->name, 'qty_asked'=>$item->qty_asked])
        @empty
            No items
        @endforelse
    </div>

    {!! Form::hidden('event_id',$event->id) !!}
    {!! Form::submit(trans('pages.add'),["class" => "btn"]) !!}

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
                    <img src="{{url("/imgs", $image->url)}}" data-imageId="{{$image->id}}" alt="Image" class="item-image"/>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var currentSelectedItem = undefined;

            $('.modal').modal();

            $('body').on("click",'.modal-trigger', function (eventM) {
                currentSelectedItem = $(eventM.target).closest('.item');
            });

            $(".item-image").on("click", function(eventJ){

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
            $("#addItem").click(function(){
                var html = template();
                $("#itemsContainer").append(html).hide().fadeIn();
                $(".delete-item").on('click',function () {
                    $(this).closest(".item").remove()
                })
            });

            $('.delete-item').on("click",function(event){
                var item = $(event.target).closest(".item");
                item.find('.to-delete').val("1");
                item.hide("slow");
            });
        });
    </script>
@endsection
