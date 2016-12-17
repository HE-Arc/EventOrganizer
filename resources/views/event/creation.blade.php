@extends('layouts.default')

@section('title', trans('pages.create_new_event'))

@section('bar_title',trans('pages.new_event'))

@section('content')

    {!! Form::open(array('url'=>route("store_event", ['id' => $event->id, 'lang' => App::getLocale()]),'class'=>'col s6')) !!}
    <div class="row">
        <div class="col s12 m6">
            <div class="card" id="creation-form">
                <div class="card-content">
                    <div class="row">
                        <div class="input-field">
                            {!!  Form::label('name',trans('pages.enter_event_name'))!!}
                            {!!  Form::text('name',null,['length'=>'20'])!!}
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-field">
                            {!! Form::label('description',trans('pages.enter_event_description')) !!}
                            {!! Form::textarea('description',null,['class'=>'materialize-textarea']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field">
                            {!! Form::label('date', trans('pages.enter_event_date')) !!}
                            {!! Form::date('date',\Carbon\Carbon::now(),['class'=>'datepicker']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field">
                            {!! Form::label('location', trans('pages.enter_event_location')) !!}
                            {!! Form::text('location') !!}
                        </div>
                    </div>
                <!-- {!! Form::button(trans('pages.create'),['class'=>'waves-effect waves-light btn']) !!}-->
                    {!! Form::submit(trans('pages.create'),["class" => "btn"]) !!}

                </div>
            </div>
        </div>
    </div>
    {!!  Form::close() !!}

    <script>
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year
            format: 'yyyy-mm-dd'
        });
    </script>

@endsection