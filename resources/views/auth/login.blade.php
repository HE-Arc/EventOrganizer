@extends('layouts.default')

@section('title', 'Authentification')


@section('content')


    <form method="POST">
        {{csrf_field()}}
        <input type="email" name="email" placeholder="yo, put your email here">
        <p>
            <input name="remember" type="checkbox" id="test5" />
            <label for="test5">Remember me</label>
        </p>
        <input type="submit" value="go" />
    </form>

@endsection