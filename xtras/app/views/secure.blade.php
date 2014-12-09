<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.00">
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
    $('#calendar').keydown(function(event){
    return false;
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
           {{ HTML::image('images/xtras_logo.png') }}
        </a>

    </div>

    <!-- Collection of nav links and other content for toggling -->

    <div id="navbarCollapse" class="collapse navbar-collapse">

        <ul class="nav navbar-nav">

            <li class="active"><a href="#">{{Lang::get('menu.new_order')}}</a></li>
            <li class=""><a href="{{ URL::to('orderHistory') }}">{{Lang::get('menu.order_history')}}</a></li>
            <li class=""><a href="{{ URL::to('myAccount') }}">{{Lang::get('menu.account')}}</a></li>

        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Lang::get('menu.language') }}<span class="caret"></span></a>
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
            <li> <a href="{{ URL::to('logout') }}">{{Lang::get('menu.logout')}}</a></li>
        </ul>

    </div>
</nav>

<form class="form-horizontal" role="form" method="POST" action="{{ URL::to('transportauftrag') }}">
<!--<h1 class="form-heading" style="text-align: center">Formular</h1>
-->

<div class="gesamt">



<div class="form-group">
<div class="col-md-4">
<h2>{{Lang::get('formular.loading_place')}}</h2>
<p class="form-paragraph">{{ Form::text('lp_name', '',array('placeholder' => Lang::get('formular.name'), 'class' => 'form-control datepicker, form-datepicker'));}}</p>

     <div style="height: 30dpi">
          @if($errors->first('lp_name'))
              <div class="alert alert-info">
                  {{ $errors->first('lp_name') }}
               </div>
           @endif
      </div>



<p class="form-paragraph form-inline">
        {{ Form::text('lp_street', '',array('placeholder' => Lang::get('formular.street'), 'class' => 'form-control'));}}
        {{ Form::text('lp_number', '',array('placeholder' => Lang::get('formular.number'), 'class' => 'form-control'));}}
</p>


     <div style="height: 30dpi">
          @if($errors->first('lp_street'))
              <div class="alert alert-info">
                  {{ $errors->first('lp_street') }}
               </div>
           @endif
      </div>


     <div style="height: 30dpi">
          @if($errors->first('lp_number'))
              <div class="alert alert-info">
                  {{ $errors->first('lp_number') }}
               </div>
           @endif
      </div>


<p class="form-paragraph">{{ Form::text('lp_plz', '',array('placeholder' => Lang::get('formular.plz')));}}
{{ Form::text('lp_city', '',array('placeholder' => Lang::get('formular.city')));}}</p>


     <div style="height: 30dpi">
          @if($errors->first('lp_plz'))
              <div class="alert alert-info">
                  {{ $errors->first('lp_plz') }}
               </div>
           @endif
      </div>


     <div style="height: 30dpi">
          @if($errors->first('lp_city'))
              <div class="alert alert-info">
                  {{ $errors->first('lp_city') }}
               </div>
           @endif
      </div>


</div>
<div class="col-md-4">
<h2>{{Lang::get('formular.deliveryPlace')}}</h2>
<p class="form-paragraph">{{ Form::text('dp_name', '',array('placeholder' => Lang::get('formular.name')));}}</p>

     <div style="height: 30dpi">
          @if($errors->first('dp_name'))
              <div class="alert alert-info">
                  {{ $errors->first('dp_name') }}
               </div>
           @endif
      </div>

<p class="form-paragraph">{{ Form::text('dp_street', '',array('placeholder' => Lang::get('formular.street')));}}
{{ Form::text('dp_number', '',array('placeholder' => Lang::get('formular.number')));}}</p>

     <div style="height: 30dpi">
          @if($errors->first('dp_street'))
              <div class="alert alert-info">
                  {{ $errors->first('dp_street') }}
               </div>
           @endif
      </div>

           <div style="height: 30dpi">
                @if($errors->first('dp_number'))
                    <div class="alert alert-info">
                        {{ $errors->first('dp_number') }}
                     </div>
                 @endif
            </div>


<p class="form-paragraph">{{ Form::text('dp_plz', '',array('placeholder' => Lang::get('formular.plz')));}}
{{ Form::text('dp_city', '',array('placeholder' => Lang::get('formular.city')));}}</p>

     <div style="height: 30dpi">
          @if($errors->first('dp_plz'))
              <div class="alert alert-info">
                  {{ $errors->first('dp_plz') }}
               </div>
           @endif
      </div>

           <div style="height: 30dpi">
                @if($errors->first('dp_city'))
                    <div class="alert alert-info">
                        {{ $errors->first('dp_city') }}
                     </div>
                 @endif
            </div>


</div>
</div>

<div class="form-group">
<div class="col-md-4">
<h2 class="">{{Lang::get('formular.pickup_delivery')}}</h2>
<p class="form-paragraph">{{ Form::text('abholtermin', null, array('type' => 'text', 'class' => 'form-control datepicker, form-datepicker','placeholder' => Lang::get('formular.pickup'), 'id' => 'calendar')) }}
</p>
<p class="form-paragraph">{{ Form::text('minLiefertermin', null, array('type' => 'text', 'class' => 'form-control datepicker, form-datepicker','placeholder' => Lang::get('formular.min_delivery'), 'id' => 'calendar2')) }}
</p>
<p class="form-paragraph">{{ Form::text('maxLiefertermin', null, array('type' => 'text', 'class' => 'form-control datepicker, form-datepicker','placeholder' => Lang::get('formular.max_delivery'), 'id' => 'calendar3')) }}
</p>


<div>
<h2>{{Lang::get('formular.casket')}}</h2>
<p class="form-paragraph">{{Form::number('anzahlBehaelter', 'value',array('placeholder' =>Lang::get('formular.quantity')));}}
{{Form::select('behaelter', array('C' => Lang::get('formular.container'), 'P' => Lang::get('formular.pallet'), 'B' => Lang::get('formular.boxes')), 'C');}}
</p>
     <div style="height: 30dpi">
          @if($errors->first('anzahlBehaelter'))
              <div class="alert alert-info">
                  {{ $errors->first('anzahlBehaelter') }}
               </div>
           @endif
      </div>

</div>
</div>


<div class="col-md-4">
<h2>{{Lang::get('formular.means_transport')}}</h2>
<p class="form-paragraph">{{ Form::checkbox('schiff', '1');}} {{Lang::get('formular.ship')}}</p>
<p class="form-paragraph">{{ Form::checkbox('lkw', '1');}} {{Lang::get('formular.lorry')}}</p>
<p class="form-paragraph">{{ Form::checkbox('zug', '1');}} {{Lang::get('formular.train')}}</p>
<p class="form-paragraph">{{ Form::checkbox('pkw', '1');}} {{Lang::get('formular.car')}}</p>
<p class="form-paragraph">{{ Form::checkbox('flugzeug', '1');}} {{Lang::get('formular.airplane')}}</p>
<p class="form-paragraph">{{ Form::checkbox('egal', '1');}} {{Lang::get('formular.similar')}}</p>
</div>
</div>


<div class="form-group">
<div class="col-md-4">
<h2>{{Lang::get('formular.prod_info')}}</h2>
<p class="form-paragraph">{{ Form::checkbox('gefahrgut', '1');}} {{Lang::get('formular.dangerous')}}</p>
<p class="form-paragraph">{{Form::textarea('beschreibung', '',array('type' => 'text', 'class' => 'form-textarea','placeholder' => Lang::get('formular.description_goods')));}}</p>

     <div style="height: 30dpi">
          @if($errors->first('beschreibung'))
              <div class="alert alert-info">
                  {{ $errors->first('beschreibung') }}
               </div>
           @endif
      </div>

<p class="form-paragraph">{{Form::number('gewicht', 'value',array('placeholder'=>Lang::get('formular.weight')));}}
{{Form::select('einheit', array('KG' => Lang::get('formular.kilogram'), 'T' => Lang::get('formular.ton')), 'T');}}</p>

     <div style="height: 30dpi">
          @if($errors->first('gewicht'))
              <div class="alert alert-info">
                  {{ $errors->first('gewicht') }}
               </div>
           @endif
      </div>

<p class="form-paragraph">{{ Form::text('verpackung', '',array('placeholder' => Lang::get('formular.packaging'), 'class' => 'form-control datepicker, form-datepicker'));}}</p>

     <div style="height: 30dpi">
          @if($errors->first('verpackung'))
              <div class="alert alert-info">
                  {{ $errors->first('verpackung') }}
               </div>
           @endif
      </div>
</div>

<div class="col-md-4">
<h2>{{Lang::get('formular.other')}}</h2>
<div class="top">
<p class="form-paragraph">{{Form::textarea('bemerkung', '',array('type' => 'text', 'class' => 'form-textarea','placeholder' => Lang::get('formular.comment')))}}</p>

     <div style="height: 30dpi">
          @if($errors->first('bemerkung'))
              <div class="alert alert-info">
                  {{ $errors->first('bemerkung') }}
               </div>
           @endif
      </div>

</div>
</div>
</div>

<div class="form-group">
<div class="col-md-4">
<div class="button-space">
{{ Form::submit(Lang::get('formular.submit'), array('class' => 'btn btn-lg btn-primary btn-block btn-success')) }}
</div>
</div>
<div class="button-space">
<div class="col-md-4">
{{ Form::submit(Lang::get('formular.save'), array('class' => 'btn btn-lg btn-primary btn-block')) }}
</div>
</div>
</div>
</div>
</form>
</body>
</html>
