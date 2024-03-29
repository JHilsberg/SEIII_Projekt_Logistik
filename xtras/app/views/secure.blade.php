<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.00">
    <!-- CSS are placed here -->
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}
    {{ HTML::style('css/formular.css') }}

    {{ HTML::style('css/datepicker3.css') }}
    <!-- Scripts are placed here -->
    {{ HTML::script('js/jquery-2.1.1.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/bootbox.min.js') }}
    {{ HTML::script('js/formular.js') }}
    {{ HTML::script('js/bootstrap-datepicker.js') }}
    {{ HTML::script('js/dataBaseOperations.js') }}

</head>
<body onload="@if(App::getLocale() == 'de' && Session::has('saved'))openDataBaseSuccessDE()
                      @elseif(App::getLocale() == 'en' && Session::has('saved'))openDataBaseSuccessEN()@endif">

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
     @if($errors->first('lp_name'))
        <p class="form-paragraph">{{ Form::text('lp_name', Input::old('lp_name'),array('placeholder' => Lang::get('formular.name'), 'class' => 'form-control hasError'));}}</p>
    @else
        <p class="form-paragraph">{{ Form::text('lp_name', Input::old('lp_name'),array('placeholder' => Lang::get('formular.name'), 'class' => 'form-control'));}}</p>
     @endif
<p class="form-paragraph form-inline">
     @if($errors->first('lp_street'))
         {{ Form::text('lp_street', Input::old('lp_street'),array('placeholder' => Lang::get('formular.street'), 'class' => 'form-control hasError'));}}

    @else
      {{ Form::text('lp_street', Input::old('lp_street'),array('placeholder' => Lang::get('formular.street'), 'class' => 'form-control'));}}
     @endif
     @if($errors->first('lp_number'))
         {{ Form::text('lp_number', Input::old('lp_number'),array('placeholder' => Lang::get('formular.number'), 'class' => 'form-control hasError'));}}
     @else
         {{ Form::text('lp_number', Input::old('lp_number'),array('placeholder' => Lang::get('formular.number'), 'class' => 'form-control'));}}
     @endif
</p>


<p class="form-paragraph form-inline">
     @if($errors->first('lp_plz'))
        {{ Form::text('lp_plz', Input::old('lp_plz'),array('placeholder' => Lang::get('formular.plz'), 'class' => 'form-control hasError'));}}
     @else
        {{ Form::text('lp_plz', Input::old('lp_plz'),array('placeholder' => Lang::get('formular.plz'), 'class' => 'form-control'));}}
     @endif
     @if($errors->first('lp_city'))
        {{ Form::text('lp_city', Input::old('lp_city'),array('placeholder' => Lang::get('formular.city'), 'class' => 'form-control hasError'));}}
     @else
        {{ Form::text('lp_city', Input::old('lp_city'),array('placeholder' => Lang::get('formular.city'), 'class' => 'form-control'));}}
     @endif
</p>
</div>
<div class="col-md-4">
<h2>{{Lang::get('formular.deliveryPlace')}}</h2>
<p class="form-paragraph">
     @if($errors->first('dp_name'))
        {{ Form::text('dp_name', Input::old('lp_name'),array('placeholder' => Lang::get('formular.name'), 'class' => 'form-control hasError'));}}
     @else
        {{ Form::text('dp_name', Input::old('lp_name'),array('placeholder' => Lang::get('formular.name'), 'class' => 'form-control'));}}
     @endif
</p>

<p class="form-paragraph form-inline">
     @if($errors->first('dp_street'))
        {{ Form::text('dp_street', Input::old('dp_street'),array('placeholder' => Lang::get('formular.street'), 'class' => 'form-control hasError'));}}
     @else
        {{ Form::text('dp_street', Input::old('dp_street'),array('placeholder' => Lang::get('formular.street'), 'class' => 'form-control'));}}
     @endif
     @if($errors->first('dp_number'))
        {{ Form::text('dp_number', Input::old('dp_number'),array('placeholder' => Lang::get('formular.number'), 'class' => 'form-control hasError'));}}
     @else
        {{ Form::text('dp_number', Input::old('dp_number'),array('placeholder' => Lang::get('formular.number'), 'class' => 'form-control'));}}
     @endif
</p>
<p class="form-paragraph form-inline">

     @if($errors->first('dp_plz'))
        {{ Form::text('dp_plz', Input::old('dp_plz'),array('placeholder' => Lang::get('formular.plz'), 'class' => 'form-control hasError'));}}
     @else
        {{ Form::text('dp_plz', Input::old('dp_plz'),array('placeholder' => Lang::get('formular.plz'), 'class' => 'form-control'));}}
     @endif
     @if($errors->first('dp_city'))
        {{ Form::text('dp_city', Input::old('dp_city'),array('placeholder' => Lang::get('formular.city'), 'class' => 'form-control hasError'));}}
     @else
        {{ Form::text('dp_city', Input::old('dp_city'),array('placeholder' => Lang::get('formular.city'), 'class' => 'form-control'));}}
     @endif
</p>

</div>
</div>

<div class="form-group">
<div class="col-md-4">
<h2 class="">{{Lang::get('formular.pickup_delivery')}}</h2>






<p class="form-paragraph">
     @if($errors->first('abholtermin'))
        {{ Form::text('abholtermin', null, array('type' => 'text', 'class' => 'form-control hasError','placeholder' => Lang::get('formular.pickup'), 'id' => 'calendar')) }}
     @else
        {{ Form::text('abholtermin', null, array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.pickup'), 'id' => 'calendar')) }}
     @endif
</p>

<p class="form-paragraph">
     @if($errors->first('minLiefertermin'))
        {{ Form::text('minLiefertermin', null, array('type' => 'text', 'class' => 'form-control hasError','placeholder' => Lang::get('formular.min_delivery'), 'id' => 'calendar2')) }}
     @else
        {{ Form::text('minLiefertermin', null, array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.min_delivery'), 'id' => 'calendar2')) }}
     @endif
</p>

<p class="form-paragraph">
    @if($errors->first('maxLiefertermin'))
        {{ Form::text('maxLiefertermin', null, array('type' => 'text', 'class' => 'form-control hasError','placeholder' => Lang::get('formular.max_delivery'), 'id' => 'calendar3')) }}
     @else
        {{ Form::text('maxLiefertermin', null, array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.max_delivery'), 'id' => 'calendar3')) }}
     @endif
</p>

<div>
<h2>{{Lang::get('formular.casket')}}</h2>
<p class="form-paragraph form-inline">
    @if($errors->first('anzahlBehaelter'))
    {{Form::number('anzahlBehaelter', Input::old('anzahlBehaelter'),array('placeholder' =>Lang::get('formular.quantity'), 'class' => 'form-control hasError'));}}
     @else
        {{Form::number('anzahlBehaelter', Input::old('anzahlBehaelter'),array('placeholder' =>Lang::get('formular.quantity'), 'class' => 'form-control'));}}
     @endif
    {{Form::select('behaelter', array('C' => Lang::get('formular.container'), 'P' => Lang::get('formular.pallet'), 'B' => Lang::get('formular.boxes')), 'C',array('class' => 'form-control'));}}
</p>
</div>
</div>


<div class="col-md-4">
<h2>{{Lang::get('formular.means_transport')}}</h2>
<?php $transportmittel =  Input::old('transportmittel[]', array());?>
<p class="form-paragraph">{{ Form::checkbox('transportmittel[]','schiff', in_array('schiff', $transportmittel));}} {{Lang::get('formular.ship')}}</p>
<p class="form-paragraph">{{ Form::checkbox('transportmittel[]','lkw', in_array('lkw', $transportmittel));}} {{Lang::get('formular.lorry')}}</p>
<p class="form-paragraph">{{ Form::checkbox('transportmittel[]','zug', in_array('zug', $transportmittel));}} {{Lang::get('formular.train')}}</p>
<p class="form-paragraph">{{ Form::checkbox('transportmittel[]','pkw', in_array('pkw', $transportmittel));}} {{Lang::get('formular.car')}}</p>
<p class="form-paragraph">{{ Form::checkbox('transportmittel[]','flugzeug', in_array('flugzeug', $transportmittel));}} {{Lang::get('formular.airplane')}}</p>
<p class="form-paragraph">{{ Form::checkbox('transportmittel[]','egal', in_array('egal', $transportmittel));}} {{Lang::get('formular.similar')}}</p>
          @if($errors->first('transportmittel'))
              <div class="alert alert-danger">
                  {{ $errors->first('transportmittel') }}
               </div>
           @endif
</div>
</div>


<div class="form-group">
<div class="col-md-4">
<h2>{{Lang::get('formular.prod_info')}}</h2>
<p class="form-paragraph">{{ Form::checkbox('gefahrgut', Input::old('gefahrgut'));}} {{Lang::get('formular.dangerous')}}</p>
<p class="form-paragraph">
 @if($errors->first('beschreibung'))
        {{Form::textarea('beschreibung', Input::old('beschreibung'),array('type' => 'text', 'class' => 'form-control hasError','placeholder' => Lang::get('formular.description_goods')));}}
     @else
        {{Form::textarea('beschreibung', Input::old('beschreibung'),array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.description_goods')));}}
     @endif
</p>
<p class="form-paragraph form-inline">
 @if($errors->first('gewicht'))
     {{Form::number('gewicht', Input::old('gewicht'),array('placeholder'=>Lang::get('formular.weight'), 'class' => 'form-control hasError'));}}
 @else
     {{Form::number('gewicht', Input::old('gewicht'),array('placeholder'=>Lang::get('formular.weight'), 'class' => 'form-control'));}}
 @endif
{{Form::select('einheit', array('KG' => Lang::get('formular.kilogram'), 'T' => Lang::get('formular.ton')), 'T', array('class' => 'form-control'));}}</p>

<p class="form-paragraph">
 @if($errors->first('verpackung'))
    {{ Form::text('verpackung', Input::old('verpackung'),array('placeholder' => Lang::get('formular.packaging'), 'class' => 'form-control hasError'));}}
 @else
     {{ Form::text('verpackung', Input::old('verpackung'),array('placeholder' => Lang::get('formular.packaging'), 'class' => 'form-control'));}}
 @endif
</p>
</div>


<div class="col-md-4">
<h2>{{Lang::get('formular.other')}}</h2>
<div class="top">
<p class="form-paragraph">
@if($errors->first('bemerkung'))
    {{Form::textarea('bemerkung', Input::old('bemerkung'),array('type' => 'text', 'class' => 'form-control hasError','placeholder' => Lang::get('formular.comment')))}}
 @else
    {{Form::textarea('bemerkung', Input::old('bemerkung'),array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.comment')))}}
 @endif
</p>

</div>
</div>
</div>

<div class="form-group">
<div class="col-md-4">
<div class="button-space">
{{ Form::submit(Lang::get('formular.submit'), array('class' => 'btn btn-lg btn-primary btn-block btn-success', 'name' => 'submit')) }}
</div>
</div>
<div class="button-space">
<div class="col-md-4">
{{ Form::submit(Lang::get('formular.save'), array('class' => 'btn btn-lg btn-primary btn-block', 'name' => 'save')) }}
</div>
</div>
</div>
</div>
</form>
</body>
</html>
