@extends('layouts.default')

@section('title', 'Ajout d\'un item')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    <h3>Ajouter un item à la liste</h3>

    {!! Form::open(['url'=>'item']) !!}
    {!! Form::label('name','Item à ajouter :') !!}
    {!! Form::text('eventitem[0][name]',null,['length'=>'30']) !!}
    {!! Form::label('qty_asked','Quantité :') !!}
    {!! Form::number('eventitem[0][qty_asked]','0') !!}
    {!! Form::label('name','Item à ajouter :') !!}
    {!! Form::text('eventitem[1][name]',null,['length'=>'30']) !!}
    {!! Form::label('qty_asked','Quantité :') !!}
    {!! Form::number('eventitem[1][qty_asked]','0') !!}
    {!! Form::hidden('event_id',$event->id) !!}
    {!! Form::submit('Ajouter') !!}
    {!! Form::close() !!}

   @endsection