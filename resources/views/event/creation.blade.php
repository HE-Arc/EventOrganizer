@extends('layouts.default')

@section('title', 'Création d\'un événements')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <h3>Nouvel événement</h3>

    <div class="row">
    {!! Form::open(array('url'=>'event','class'=>'col s6')) !!}
        <div class="row">
            <div class="input-field">

                {!!  Form::label('name','Entrez le nom de votre événement :')!!}
                {!!  Form::text('name',null,['length'=>'20'])!!}
            </div>
        </div>

        {!! Form::label('description','Décrivez brièvement votre événement :') !!}
        <div class="row">
            <div class="input-field">
                {!! Form::textarea('description',null,['class'=>'materialize-textarea']) !!}
            </div>
        </div>
        {!! Form::label('date','Entrez la date de votre événement :') !!}
        <div class="row">
            <div class="input-field">
        {!! Form::date('date',\Carbon\Carbon::now(),['class'=>'datepicker']) !!}
                </div>
            </div>
        {!! Form::label('location','Entrez le lieu de votre événement :') !!}
        <div class="row">
            <div class="input-field">
        {!! Form::text('location') !!}
                </div>
            </div>
       <!-- {!! Form::button('Créer',['class'=>'waves-effect waves-light btn']) !!}-->
        {!! Form::submit('Click Me!') !!}
    {!!  Form::close()!!}
    </div>
    <script>
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });
    </script>

@endsection