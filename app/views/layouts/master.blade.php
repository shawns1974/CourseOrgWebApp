<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
            Laravel 4 - Tutorial
            @show
        </title>
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">

        <script src="//cdn.ckeditor.com/4.4.4/standard/ckeditor.js"></script>


       
        <!-- CSS are placed here -->
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/bootstrap-theme.css') }}
        {{ HTML::style('css/sprites.css') }}
         {{ HTML::style('css/datepicker.css') }}

        <!--<style>
            .container {
                background: #fff;
            }

            #alert {
                display: none;
            }
        </style> -->

        {{ HTML::style('css/site.css') }}

        <style>
        @section('styles')
            body {
                padding-top: 60px;
            }
        @show
        </style>



        <!-- Scripts are placed here -->
        {{ HTML::script('js/jquery-2.1.1.min.js') }}
        {{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js') }}

        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/bootstrap-datepicker.js') }}
        
        <script>
            $('.datepicker').datepicker();
        </script>

    </head>

    <body>
    
        <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#">Laravel</a>
                </div>
                <!-- Everything you want hidden at 940px or less, place within here -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{{ URL::to('') }}}">Home</a></li>
                        
                        @if(Auth::check())
                            <li>{{ HTML::link('courses/create','Add a Course') }}</li>
                            <li>{{ HTML::link('logout', 'Logout') }}</li>
                        @else
                            <li>{{ HTML::link('login', 'Login') }}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- Container -->
        <div class="container">

        
            <!-- Success-Messages -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Success</h4>
                    {{{ $message }}}
                </div>
            @endif


            <!-- Content -->
            @yield('content')

        </div>
        

    </body>
</html>