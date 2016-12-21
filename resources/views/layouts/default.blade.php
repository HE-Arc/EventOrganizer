<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Event Organizer @yield('title')</title>


        {{ Html::style( asset('css/app.css') ) }}


    </head>
    <body>
        <div id="main-app-container">
            <nav>
                <div class="nav-wrapper green accent-4">
                    @if (Auth::check())
                        <ul id="slide-out" class="side-nav">
                            <li><a href="{{ route('list_events',['lang' => App::getLocale()])}}"><i class="material-icons left">perm_identity</i>{{auth()->user()->identity}}</a></li>
                            <li><a href="{{ route('create_event',['lang' => App::getLocale()]) }}"><i class="material-icons left">mode_edit</i>{{ trans('pages.new_event') }}</a></li>
                            <li><a href=""><i class="material-icons left">list</i>{{ trans('pages.my_events') }}</a></li>
                            <li><a href="{{ route('logout',['lang' => App::getLocale()]) }}"><i class="material-icons left">power_settings_new</i>{{ trans('pages.logout') }}</a></li>
                        </ul>
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                    @endif
                    
                    <a href="#" class="brand-logo"><span id="logo-bar">WIN</span> <span id="custom-bar-title">@yield("bar_title")</span></a>


                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        @if (Auth::check())
                            <li><a href="{{ route('create_event',['lang' => App::getLocale()]) }}"><i class="material-icons left">mode_edit</i>{{ trans('pages.new_event') }}</a></li>
                            <li><a href="{{ route('list_events',['lang' => App::getLocale()]) }}"><i class="material-icons left">perm_identity</i>{{auth()->user()->identity}}</a></li>
                            <li><a href="{{ route('logout',['lang' => App::getLocale()]) }}"><i class="material-icons left">power_settings_new</i>{{ trans('pages.logout') }}</a></li>
                        @endif
                    </ul>
                </div>
            </nav>
            <div class="container">
                @yield('content')

                @if ($errors->any())
                    {!!  implode('', $errors->all('<div class="error">:message</div>')) !!}
                @endif
            </div>
        </div>

        <footer class="page-footer green accent-4">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">What I need</h5>
                        <p class="grey-text text-lighten-4">Makes events planning great again</p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    {{ trans('pages.names') }}
                </div>
            </div>
        </footer>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
        {{ Html::script( asset('js/app.js') ) }}
    </body>
</html>
