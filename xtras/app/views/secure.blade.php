<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS are placed here -->
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}
    {{ HTML::style('css/signin.css') }}
    <!-- Scripts are placed here -->
    {{ HTML::script('js/jquery-2.1.1.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/bootbox.min.js') }}
    {{ HTML::script('js/login.js') }}
</head>
<body>
<nav role="navigation" class="navbar navbar-default">

    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">

        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

        </button>

        <a href="#" class="navbar-brand">Text</a>

    </div>

    <!-- Collection of nav links and other content for toggling -->

    <div id="navbarCollapse" class="collapse navbar-collapse">

        <ul class="nav navbar-nav">

            <li class="active"><a href="#">Home</a></li>

        </ul>

        <ul class="nav navbar-nav navbar-right">

            <li> <a href="{{ URL::to('logout') }}">Logout</a></li>

        </ul>

    </div>

</nav>
</body>
</html>
