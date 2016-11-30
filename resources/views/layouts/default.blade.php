<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
        <!--Import HandlesBar-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.6/handlebars.js"></script>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Event Organizer @yield('title')</title>


        {{ Html::style( asset('css/main_style.css') ) }}


    </head>
    <body>
        <nav>
            <div class="nav-wrapper green accent-4">
                <a href="#" class="brand-logo">WIN</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/create">{{ trans('pages.new_event') }}</a></li>
                    <li><a href="/event">{{ trans('pages.my_events') }}</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>

        <footer class="page-footer green accent-4">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2016 Debrot Aurélie | Ruedin Cyril | Ferreira Venancio Diogo
                </div>
            </div>
        </footer>

        {{ Html::script( asset('js/app.js') ) }}
    </body>

</html>