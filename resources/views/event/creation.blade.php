@extends('layouts.default')

@section('title', trans('pages.create_new_event'))

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <h3>{{  trans('pages.new_event') }}</h3>

    <div class="row">
    {!! Form::open(array('url'=>action('EventController@store', App::getLocale()),'class'=>'col s6')) !!}
        <div class="row">
            <div class="input-field">

                {!!  Form::label('name',trans('pages.enter_event_name'))!!}
                {!!  Form::text('name',null,['length'=>'20'])!!}
            </div>
        </div>

        {!! Form::label('description',trans('pages.enter_event_description')) !!}
        <div class="row">
            <div class="input-field">
                {!! Form::textarea('description',null,['class'=>'materialize-textarea']) !!}
            </div>
        </div>
        {!! Form::label('date', trans('pages.enter_event_date')) !!}
        <div class="row">
            <div class="input-field">
        {!! Form::date('date',\Carbon\Carbon::now(),['class'=>'datepicker']) !!}
                </div>
            </div>
        {!! Form::label('location', trans('pages.enter_event_location')) !!}
        <div class="row">
            <div class="input-field">
        {!! Form::text('location') !!}
                </div>
            </div>
       <!-- {!! Form::button(trans('pages.create'),['class'=>'waves-effect waves-light btn']) !!}-->
        {!! Form::submit(trans('pages.create')) !!}
    {!!  Form::close() !!}
    </div>
    <script>
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });
    </script>

@endsection