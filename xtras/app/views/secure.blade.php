<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS are placed here -->
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}
    {{ HTML::style('css/formular.css') }}
    {{ HTML::style('css/datepicker.css') }}
    {{ HTML::style('css/datepicker3.css') }}
    <!-- Scripts are placed here -->
    {{ HTML::script('js/jquery-2.1.1.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/bootbox.min.js') }}
    {{ HTML::script('js/login.js') }}
    {{ HTML::script('js/bootstrap-datepicker.js') }}




<script type="text/javascript">
$(document).ready(function() {
    $('#calendar').datepicker({
    });
} );
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#calendar2').datepicker({
    });
} );
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#calendar3').datepicker({
    });
} );
</script>

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

        <a href="#" class="navbar-brand">
           <img alt="Brand" src= {{ 'images/'.LaravelLocalization::setLocale().'/xtras_logo.png' }} >
        </a>

    </div>

    <!-- Collection of nav links and other content for toggling -->

    <div id="navbarCollapse" class="collapse navbar-collapse">

        <ul class="nav navbar-nav">

            <li class="active"><a href="#">Home</a></li>

        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Lang::get('formular.language') }}<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                {{{ $properties['native'] }}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li> <a href="{{ URL::to('logout') }}">{{Lang::get('formular.logout')}}</a></li>
        </ul>

    </div>
</nav>

<form class="form-horizontal" role="form" method="POST" action="{{ URL::to('transportauftrag') }}">
<!--<h1 class="form-heading" style="text-align: center">Formular</h1>
-->
<h2>{{Lang::get('formular.loading_place')}}</h2>

<div class="form-group">
<div class="col-md-4">
<h2 class="">{{Lang::get('formular.pickup_delivery')}}</h2>
<p class="form-paragraph">{{ Form::text('abholtermin', null, array('type' => 'text', 'class' => 'form-control datepicker, form-datepicker','placeholder' => Lang::get('formular.pickup'), 'id' => 'calendar')) }}
</p>
<p class="form-paragraph">{{ Form::text('minLiefertermin', null, array('type' => 'text', 'class' => 'form-control datepicker, form-datepicker','placeholder' => Lang::get('formular.min_delivery'), 'id' => 'calendar2')) }}
</p>
<p class="form-paragraph">{{ Form::text('maxLiefertermin', null, array('type' => 'text', 'class' => 'form-control datepicker, form-datepicker','placeholder' => Lang::get('formular.max_delivery'), 'id' => 'calendar3')) }}
</p>
</div>
<div class="col-md-4">
<h2>{{Lang::get('formular.means_transport')}}</h2>
<p class="form-paragraph">{{ Form::checkbox('schiff', 'value');}} {{Lang::get('formular.ship')}}</p>
<p class="form-paragraph">{{ Form::checkbox('lkw', 'value');}} {{Lang::get('formular.lorry')}}</p>
<p class="form-paragraph">{{ Form::checkbox('zug', 'value');}} {{Lang::get('formular.train')}}</p>
<p class="form-paragraph">{{ Form::checkbox('pkw', 'value');}} {{Lang::get('formular.car')}}</p>
<p class="form-paragraph">{{ Form::checkbox('flugzeug', 'value');}} {{Lang::get('formular.airplane')}}</p>
<p class="form-paragraph">{{ Form::checkbox('egal', 'value');}} {{Lang::get('formular.similar')}}</p>
</div>
</div>

<div class="form-group">
<div class="col-md-4">
<h2>{{Lang::get('formular.prod_info')}}</h2>
<p class="form-paragraph">{{ Form::checkbox('gefahrgut', 'value');}} {{Lang::get('formular.dangerous')}}</p>
<p class="form-paragraph">{{Form::textarea('beschreibung', '',array('type' => 'text', 'class' => 'form-textarea','placeholder' => Lang::get('formular.description_goods')));}}</p>
<p class="form-paragraph">{{Form::number('gewicht', 'value',array('placeholder'=>Lang::get('formular.weight')));}}{{Form::select('einheit', array('KG' => Lang::get('formular.kilogram'), 'T' => Lang::get('formular.ton')), 'T');}}</p>
<p class="form-paragraph">{{ Form::text('verpackung', '',array('placeholder' => Lang::get('formular.packaging')));}}</p>
</div>

<div class="col-md-4">
<h2>{{Lang::get('formular.casket')}}</h2>
<p class="form-paragraph">{{Form::select('behaelter', array('C' => Lang::get('formular.container'), 'P' => Lang::get('formular.pallet'), 'B' => Lang::get('formular.boxes')), 'C');}}</p>
<p class="form-paragraph">{{Form::number('anzahlBehaelter', 'value',array('placeholder' =>Lang::get('formular.quantity')));}}</p>
</div>
</div>

<div class="">
<h2>{{Lang::get('formular.other')}}</h2>
<label class="sr-only" for="bemerkung">Email address</label>
<p class="form-paragraph">{{Form::textarea('bemerkung', '',array('type' => 'text', 'class' => 'form-textarea','placeholder' => Lang::get('formular.comment')))}}</p>

</div>
<div class="form-group, col-md-4">
{{ Form::submit(Lang::get('formular.submit'), array('class' => 'btn btn-lg btn-primary btn-block btn-success')) }}
</div>
</form>
</body>
</html>
