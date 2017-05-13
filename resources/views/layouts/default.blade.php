<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Lang" content="nl">
    <meta name="author" content="R.F. Laan">
    <meta http-equiv="Reply-to" content="noreply@alfa-college.nl">
    <meta name="description" content="Voorbeeld code voor de lessen rondom Laravel">
    <meta name="keywords" content="">
    <meta name="creation-date" content="03/22/2017">
    <meta name="revisit-after" content="60 days">
    <meta name="google" content="nostranslate">
    <meta name="robots" content="noodp, noarchive">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <title>Blog</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/blog.css') }}">
</head>

<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">BLOG</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#contact">About</a></li>
                <li><a href="#contact">Contact</a></li>
                @if(Auth::check() && Auth::user()->isAdmin())
                    <li><a href="{{ url('post/create') }}">Nieuwe Post</a></li>
                @endif
                @if(Auth::guest())
                    <li><a href="{{ url('/login') }}">Aanmelden</a></li>
                    <li><a href="{{ url('/register') }}">Registreren</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="position: relative; padding-left: 50px;">
                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%;">
                            {{ Auth::user()->username }}
                            <span class="glyphicon glyphicon-menu-down" style="color: grey"></span>
                        </a>
                        <ul class="dropdown-menu">

                            <li><a href="{{ url('user/profile') }}"><span class="glyphicon glyphicon-user" style="color: lightgrey"></span> Profiel </a></li>
                            @if(Auth::check() && Auth::user()->isAdmin())
                                <li><a href="{{ url('users/manage') }}"><span class="glyphicon glyphicon-list-alt" style="color: lightgrey;"></span> Beheer Gebruikers</a></li>
                                <li><a href="{{ url('post/manage') }}"><span class="glyphicon glyphicon-list-alt" style="color: lightgrey;"></span> Beheer posts</a></li>
                            @endif

                            <li><a href="{{ url('comment/manage') }}"><span class="glyphicon glyphicon-comment" style="color: lightgrey;"></span> Mijn comments</a></li>

                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out" style="color: lightgrey"></span> Afmelden
                                </a>
                                <form id="logout-form"
                                      action="{{ url('/logout') }}"
                                      method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')


<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

@yield('scripts')

    </body>
</html>

