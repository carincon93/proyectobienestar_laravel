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
                <h4 class="text-capitalize">{{ Auth::user()->name }}</h4>
                <div>
                    <a href="{{url('admin/password')}}" style="font-size:13px;">Cambiar mi contraseña</a><br>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="logout">
                        <i class="fa fa-fw fa-sign-out"></i>
                        Cerrar Sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
        <div id="sidebar-content">
            <ul class="sidebar-menu list-unstyled">
                <li>Administración</li>
                <li>
                    <a href="{{ url('/admin/collaborator') }}"><i class="fa fa-fw fa-cog"></i>Administradores</a>
                </li>
                <li>Acciones</li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#modalEntrega"><i class="fa fa-fw fa-cutlery"></i>Entregar suplemento</a>
                </li>
                <li>
                    <a href="{{ url('/admin/history_record') }}"><i class="fa fa-fw fa-line-chart"></i>Historial de aprendices</a>
                </li>
            </ul>
        </div>
    </aside>
    @endif
    <main id="app">
        <div class="{{ Auth::check() ? 'app-check' : ''}}">
            <nav class="navbar navbar-default navbar-fixed-top {{ Auth::check() ? 'mleft' : '' }}">
                <div class="container">
                    @yield('navbar-top')
                </div>
            </nav>
        <div class="main-content">

            <div class="row no-gutter">
                <div class="{{ Auth::guest() ? 'col-md-9' : 'col-md-12' }} big-content">
                    <div class="big-content-desc clearfix">
                        @yield('big-content-desc')
                    </div>
                    @yield('content')
                </div>
                <div class="{{ Auth::guest() ? 'col-md-3 right-content' : ''}}">
                    <div>
                        @yield('right-content')

                        @if(!Auth::check())
                        <div class="card-form">
                            <form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">Correo electrónico</label>

                                    <div class="">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            {{ $errors->first('email') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">Contraseña</label>

                                    <div class="">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerda mi cuenta
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">
                                            Iniciar sesión
                                        </button>

                                        <a class="btn-link pwd-req" href="{{ route('password.request') }}">
                                            ¿Olvidaste tu contraseña?
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <!-- / -->
                            angela@mail.com
                            pwd: admin123
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

        </div>
    </main>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            // =========================== Active Links =================================
            var current_url = "{{ Request::fullUrl() }}";
            var full_url = current_url+location.search;
            var $navLinks = $("ul.sidebar-menu li a");
            // First look for an exact match including the search string
            var $curentPageLink = $navLinks.filter(
                function() { return $(this).attr('href') === full_url; }
            );
            // If not found, look for the link that starts with the url
            if(!$curentPageLink.length > 0){
                $curentPageLink = $navLinks.filter(
                    function() { return $(this).attr('href').startsWith(current_url) || current_url.startsWith($(this).attr('href')); }
                );
            }

            $curentPageLink.parents('li').addClass('active');
        });
    </script>
    <!-- <script src="{{ asset('js/master.js') }}"></script> -->
    @stack('scripts')
</body>
</html>
