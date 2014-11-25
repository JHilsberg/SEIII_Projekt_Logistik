<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS are placed here -->
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}
    {{ HTML::style('css/signin.css') }}
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


<h1>Formular</h1>
<h2>Verladeort</h2>
{{Form::select('land', array('DE' => 'Deutschland', 'PL' => 'Polen'), 'P');}}
<h2>Abhol- und Lieferzeiten</h2>
{{ Form::text('abholtermin', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Abholtermin', 'id' => 'calendar')) }}
{{ Form::text('minLiefertermin', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'minimale Lieferzeit', 'id' => 'calendar2')) }}
{{ Form::text('maxLiefertermin', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'maximale Lieferzeit', 'id' => 'calendar3')) }}
<h2>Verkehrsmittel</h2>
<p>{{ Form::checkbox('schiff', 'value');}} Schiff</p>
<p>{{ Form::checkbox('lkw', 'value');}} LKW</p>
<p>{{ Form::checkbox('zug', 'value');}} Zug</p>
<p>{{ Form::checkbox('pkw', 'value');}} PKW</p>
<p>{{ Form::checkbox('flugzeug', 'value');}} Flugzeug</p>
<p>{{ Form::checkbox('egal', 'value');}} Egal</p>
<h2>Transportbehälter</h2>
{{Form::select('behaelter', array('C' => 'Container', 'P' => 'Palette', 'B' => 'Boxen'), 'C');}}
<br />
Anzahl Transportbehälter
<br />
{{Form::number('anzahlBehaelter', 'value');}}
<h2>Wareninformationen</h2>
<p>{{ Form::checkbox('gefahrgut', 'value');}} Gefahrgut</p>
{{Form::textarea('beschreibung', 'Warenbeschreibung');}}
<p> Gewicht: {{Form::number('gewicht', 'value');}}{{Form::select('einheit', array('KG' => 'Kilogramm', 'T' => 'Tonnen'), 'T');}}</p>
{{ Form::text('verpackung', 'Warenverpackung');}}
<h2>Sonstiges</h2>
{{Form::textarea('bemerkung', 'Bemerkungen');}}
</body>
</html>
