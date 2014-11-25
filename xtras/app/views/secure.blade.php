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

<form class="form-transport" role="form" method="POST" action="{{ URL::to('transportauftrag') }}">
<!--<h1 class="form-heading" style="text-align: center">Formular</h1>
-->
<h2>Verladeort</h2>

<div class="col-md-4">
<h2 class="">Abhol- und Lieferzeiten</h2>
<p class="form-paragraph">{{ Form::text('abholtermin', null, array('type' => 'text', 'class' => 'form-control datepicker, form-datepicker','placeholder' => 'Abholtermin', 'id' => 'calendar')) }}
</p>
<p class="form-paragraph">{{ Form::text('minLiefertermin', null, array('type' => 'text', 'class' => 'form-control datepicker, form-datepicker','placeholder' => 'minimale Lieferzeit', 'id' => 'calendar2')) }}
</p>
<p class="form-paragraph">{{ Form::text('maxLiefertermin', null, array('type' => 'text', 'class' => 'form-control datepicker, form-datepicker','placeholder' => 'maximale Lieferzeit', 'id' => 'calendar3')) }}
</p>

<h2>Verkehrsmittel</h2>
<p class="form-paragraph">{{ Form::checkbox('schiff', 'value');}} Schiff</p>
<p class="form-paragraph">{{ Form::checkbox('lkw', 'value');}} LKW</p>
<p class="form-paragraph">{{ Form::checkbox('zug', 'value');}} Zug</p>
<p class="form-paragraph">{{ Form::checkbox('pkw', 'value');}} PKW</p>
<p class="form-paragraph">{{ Form::checkbox('flugzeug', 'value');}} Flugzeug</p>
<p class="form-paragraph">{{ Form::checkbox('egal', 'value');}} Egal</p>
</div>


<div class="col-md-4">
<h2>Wareninformationen</h2>
<p class="form-paragraph">{{ Form::checkbox('gefahrgut', 'value');}} Gefahrgut</p>
<p class="form-paragraph">{{Form::textarea('beschreibung', 'Warenbeschreibung',array('type' => 'text', 'class' => 'form-textarea'));}}</p>
<p class="form-paragraph"> Gewicht: {{Form::number('gewicht', 'value');}}{{Form::select('einheit', array('KG' => 'Kilogramm', 'T' => 'Tonnen'), 'T');}}</p>
<p class="form-paragraph">{{ Form::text('verpackung', 'Warenverpackung');}}</p>
</div>

<div class="col-md-4">
<h2>Transportbehälter</h2>
<p class="form-paragraph">{{Form::select('behaelter', array('C' => 'Container', 'P' => 'Palette', 'B' => 'Boxen'), 'C');}}</p>
<br />
Anzahl Transportbehälter
<br />
<p class="form-paragraph">{{Form::number('anzahlBehaelter', 'value');}}</p>
</div>


<div class="col-md-4">
<h2>Sonstiges</h2>
<p class="form-paragraph">{{Form::textarea('bemerkung', 'Bemerkungen',array('type' => 'text', 'class' => 'form-textarea'))}}</p>

</div>
<div class="col-md-4">
{{ Form::submit('Abschicken', array('class' => 'btn btn-lg btn-primary btn-block btn-success')) }}
</div>
</form>
</body>
</html>
