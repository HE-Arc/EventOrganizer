@extends('layouts.default')

@section('title', 'Authentification')


@section('content')


    <div class="row">
        <div class="col s12 m6">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">Login</div>
                    <form method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="input-field col s12">
                                <input required value="" type="email" name="email" class="validate">
                                <label for="disabled">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="name" value="" type="text" class="validate">
                                <label for="disabled">Votre nom (Optionnel)</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <button class="btn waves-effect waves-light" type="submit" name="action">GO !
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                            <div class="input-field col s8">
                                <input name="remember" type="checkbox" id="test5" />
                                <label for="test5">Remember me</label>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection