@extends('layouts.default')

@section('title', $event->name)

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>The event is {{$event->description}}</p>

    <h1>Items to bring !</h1>

    @forelse ($event->eventItems()->get() as $item)
        <div class="item">
            <div class="item-name">
                <h2>{{$item->name}}</h2>
            </div>
            <div class="item-qty_asked">
                {{$item->qty_asked}}
            </div>
        </div>
    @empty
        <p>Nothing to bring ! Everything's on the house !</p>
    @endforelse

@endsection