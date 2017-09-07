<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/bootstrap-datepicker.standalone.min.css') }}" rel="stylesheet"> 
</head>
<body>
    @include('layouts.modal')
    @if (Auth::check())
    <aside id="sidebar">
        <div id="sidebar-logo">
            <a href="{{ url('/admin/dashboard') }}"><img src="{{ asset('/images/logo-bienestar.svg') }}" alt="" class="img-responsive"></a>
        </div>
        <div id="sidebar-admin">
            <div>
                <div>
                </div>
            </div>
        </div>
        <div id="sidebar-content">
            <ul class="sidebar-menu list-unstyled">
                <li>Dashboard</li>
                <li>
                    <a href="{{ url('/admin/dashboard') }}"><i class="fa fa-fw fa-cog"></i>Dashboard</a>
                </li>
                <li>Administración</li>
                <li>
                    <a href="{{ url('/admin/collaborator') }}"><i class="fa fa-fw fa-cog"></i>Administradores</a>
                </li>
                <li>Acciones</li>
                <li>
                    <a href="{{ url('/admin/history_record') }}"><i class="fa fa-fw fa-line-chart"></i>Historial de aprendices</a>
                </li>
                <li>
                    <form action="{{ url('/admin/truncate') }}" method="POST" style="display: inline-block;" class="form-truncate-aprendiz btn">
                        {!! csrf_field() !!}
                        <i class="fa fa-fw fa-trash"></i>
                        Eliminar todos los registros
                    </form>
                </li>
            </ul>
        </div>
    </aside>
    @endif
    <main id="app">
        <div class="{{ Auth::check() ? 'app-check' : ''}}">
            <nav class="navbar navbar-default {{ Auth::check() ? 'mleft' : '' }}">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            @if(!Auth::check())
                            <li><img src="{{ url('/images/logo1.png') }}" class="img-responsive logobienestar-navbar"></li>
                            <li class="dropdown {{ count($errors) > 0 ? 'open' : '' }}">
                                <a class="top-login dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Iniciar sesión</a>
                                <div class="dropdown-menu login-box">
                                    <div class="">
                                        <form method="POST" action="{{ route('login') }}">
                                            {{ csrf_field() }}

                                            <div class="secpart-login">
                                                <h4 class="login-title">Ingresa a tu cuenta</h4>
                                            </div>

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} no-margin">
                                                <div class="">
                                                    <i class="fa fa-fw fa-envelope icon-form"></i>
                                                    <input id="email" type="email" class="form-control form-login" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required>

                                                    @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        {{ $errors->first('email') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} no-margin">
                                                <div class="">
                                                    <i class="fa fa-fw fa-key icon-form"></i>
                                                    <input id="password" type="password" class="form-control form-login" name="password" placeholder="Contraseña" required>

                                                    @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="secpart-login">
                                                <div class="form-group">
                                                    <div class="">
                                                        <div class="checkbox">
                                                            <label class="control control--checkbox"> Recuerda mi cuenta
                                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                <div class="control__indicator"></div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="">
                                                        <button type="submit" class="btn btn-login">
                                                            Iniciar sesión
                                                        </button>

                                                    </div>
                                                </div>
                                                <a class="btn-link" href="{{ route('password.request') }}">
                                                    ¿Olvidaste tu contraseña?
                                                </a>
                                                <!-- / -->
                                                angela@mail.com
                                                pwd: admin123
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle text-capitalize user-name" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('admin/password')}}">Cambiar mi contraseña</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="">
                                            <i class="fa fa-fw fa-sign-out"></i>
                                            Cerrar Sesión
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        <div class="main-content">

            <div class="row no-gutter">
                <div class="col-md-12 big-content">
                <!-- <div class="{{ Auth::guest() ? 'col-md-9' : 'col-md-12' }} big-content"> -->
                    <div class="big-content-desc clearfix">
                        @yield('big-content-desc')
                    </div>
                    @yield('content')
                </div>
                <!-- <div class="{{ Auth::guest() ? 'col-md-3 right-content' : ''}}">
                    <div>
                        @yield('right-content')
                    </div>
                </div> -->
            </div>

        </div>

        </div>
    </main>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // =========================== Active Links =================================
            var current_url = "{{ Request::fullUrl() }}";
            var full_url = current_url+location.search;
            // console.log(current_url.indexOf('/'));
            var $navLinks = $("ul.sidebar-menu li a");
            // First look for an exact match including the search string
            var $curentPageLink = $navLinks.filter( function() {
                // console.log($(this).attr('href') === full_url);
                return $(this).attr('href') === full_url;
            });
            // If not found, look for the link that starts with the url
            if($curentPageLink.length == 0){
                $curentPageLink = $navLinks.filter(function() {
                    // console.log(current_url.startsWith($(this).attr('href')));
                    return $(this).attr('href').startsWith(current_url) || current_url.startsWith($(this).attr('href'));
                });
            }
            var loc = document.location.href;
            console.log(loc);
            if(!loc == current_url)
                $curentPageLink.parents('li').addClass('active');
                $('.datapickerr').datepicker({
                    format: "dd/mm/yyyy",
                    language: "es",
                    autoclose: true
                });
        });

    </script>
    <!-- <script src="{{ asset('js/master.js') }}"></script> -->
    @stack('scripts')
</body>
</html>
