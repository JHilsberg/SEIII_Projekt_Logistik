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
                      @elseif(App::getLocale() == 'en' && Session::has('saved'))openDataBaseSuccessEN()@endif;
document.getElementById('lp_name').value='{{$order->abholadresse()->first()->firma}}';
document.getElementById('lp_street').value='{{$order->abholadresse()->first()->strasse}}';
document.getElementById('lp_number').value='{{$order->abholadresse()->first()->hausnummer}}';
document.getElementById('lp_plz').value='{{$order->abholadresse()->first()->postleitzahl}}';
document.getElementById('lp_city').value='{{$order->abholadresse()->first()->ort}}';

document.getElementById('dp_name').value='{{$order->lieferadresse()->first()->firma}}';
document.getElementById('dp_street').value='{{$order->lieferadresse()->first()->strasse}}';
document.getElementById('dp_number').value='{{$order->lieferadresse()->first()->hausnummer}}';
document.getElementById('dp_plz').value='{{$order->lieferadresse()->first()->postleitzahl}}';
document.getElementById('dp_city').value='{{$order->lieferadresse()->first()->ort}}';

document.getElementById('calendar').value='{{date("m/d/Y", strtotime($order->lieferdatum))}}';
document.getElementById('calendar2').value='{{date("m/d/Y", strtotime($order->minlieferzeit))}}';
document.getElementById('calendar3').value='{{date("m/d/Y", strtotime($order->maxlieferzeit))}}';

document.getElementById('anzahlBehaelter').value='{{$order->anzahltransportbehaelter}}';
document.getElementById('behaelter').value='{{$order->transportbehaelter}}';

if('{{$order->schiff}}'==1)
document.getElementById('schiff').checked=true;

if('{{$order->lkw}}'==1)
document.getElementById('lkw').checked=true;

if('{{$order->zug}}'==1)
document.getElementById('zug').checked=true;

if('{{$order->flugzeug}}'==1)
document.getElementById('flugzeug').checked=true;

if('{{$order->pkw}}'==1)
document.getElementById('pkw').checked=true;

if('{{$order->egal}}'==1)
document.getElementById('egal').checked=true;

if('{{$order->gefahrengut}}'==1)
document.getElementById('gefahrengut').checked=false;

document.getElementById('beschreibung').value='{{$order->warenbeschreibung}}';
document.getElementById('gewicht').value='{{$order->warengewicht}}';

document.getElementById('verpackung').value='{{$order->warenverpackung}}';
document.getElementById('bemerkung').value='{{$order->bemerkung}}';



                      ">

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
{{ Form::open(['action' => ['submitEditOrder', $order->id],'class'=>'form-horizontal','role'=>'form','method'=>'POST']) }}

<!--<h1 class="form-heading" style="text-align: center">Formular</h1>
-->

<div class="gesamt">

<div class="form-group">
<div class="col-md-4">
<h2>{{Lang::get('formular.loading_place')}}</h2>
<p class="form-paragraph">{{ Form::text('lp_name', Input::old('lp_name'),array('placeholder' => Lang::get('formular.name'), 'class' => 'form-control', 'id' =>'lp_name'));}}</p>


          @if($errors->first('lp_name'))
              <div class="alert alert-info">
                  {{ $errors->first('lp_name') }}
               </div>
           @endif




<p class="form-paragraph form-inline">
        {{ Form::text('lp_street', Input::old('lp_street'),array('placeholder' => Lang::get('formular.street'), 'class' => 'form-control', 'id' =>'lp_street'));}}
        {{ Form::text('lp_number', Input::old('lp_number'),array('placeholder' => Lang::get('formular.number'), 'class' => 'form-control', 'id' =>'lp_number'));}}
</p>

          @if($errors->first('lp_street'))
              <div class="alert alert-info">
                  {{ $errors->first('lp_street') }}
               </div>
           @endif

          @if($errors->first('lp_number'))
              <div class="alert alert-info">
                  {{ $errors->first('lp_number') }}
               </div>
           @endif



<p class="form-paragraph form-inline">
    {{ Form::text('lp_plz', Input::old('lp_plz'),array('placeholder' => Lang::get('formular.plz'), 'class' => 'form-control', 'id' =>'lp_plz'));}}
    {{ Form::text('lp_city', Input::old('lp_city'),array('placeholder' => Lang::get('formular.city'), 'class' => 'form-control', 'id' =>'lp_city'));}}
</p>


           @if($errors->first('lp_plz'))
              <div class="alert alert-info">
                  {{ $errors->first('lp_plz') }}
               </div>
           @endif


          @if($errors->first('lp_city'))
              <div class="alert alert-info">
                  {{ $errors->first('lp_city') }}
               </div>
           @endif

</div>
<div class="col-md-4">
<h2>{{Lang::get('formular.deliveryPlace')}}</h2>
<p class="form-paragraph">
    {{ Form::text('dp_name', Input::old('lp_name'),array('placeholder' => Lang::get('formular.name'), 'class' => 'form-control', 'id' =>'dp_name'));}}
</p>

          @if($errors->first('dp_name'))
              <div class="alert alert-info">
                  {{ $errors->first('dp_name') }}
               </div>
           @endif

<p class="form-paragraph form-inline">
{{ Form::text('dp_street', Input::old('dp_street'),array('placeholder' => Lang::get('formular.street'), 'class' => 'form-control', 'id' =>'dp_street'));}}
{{ Form::text('dp_number', Input::old('dp_number'),array('placeholder' => Lang::get('formular.number'), 'class' => 'form-control', 'id' =>'dp_number'));}}</p>

    @if($errors->first('dp_street'))
        <div class="alert alert-info">
            {{ $errors->first('dp_street') }}
        </div>
    @endif

    @if($errors->first('dp_number'))
        <div class="alert alert-info">
            {{ $errors->first('dp_number') }}
        </div>
    @endif


<p class="form-paragraph form-inline">
    {{ Form::text('dp_plz', Input::old('dp_plz'),array('placeholder' => Lang::get('formular.plz'), 'class' => 'form-control', 'id' =>'dp_plz'));}}
    {{ Form::text('dp_city', Input::old('dp_city'),array('placeholder' => Lang::get('formular.city'), 'class' => 'form-control', 'id' =>'dp_city'));}}
</p>

          @if($errors->first('dp_plz'))
              <div class="alert alert-info">
                  {{ $errors->first('dp_plz') }}
               </div>
           @endif

                @if($errors->first('dp_city'))
                    <div class="alert alert-info">
                        {{ $errors->first('dp_city') }}
                     </div>
                 @endif

</div>
</div>

<div class="form-group">
<div class="col-md-4">
<h2 class="">{{Lang::get('formular.pickup_delivery')}}</h2>
<p class="form-paragraph">{{ Form::text('abholtermin', null, array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.pickup'), 'id' => 'calendar')) }}
</p>

   @if($errors->first('abholtermin'))
              <div class="alert alert-info">
                  {{ $errors->first('abholtermin') }}
               </div>
           @endif

<p class="form-paragraph">{{ Form::text('minLiefertermin', null, array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.min_delivery'), 'id' => 'calendar2')) }}
</p>

  @if($errors->first('minLiefertermin'))
              <div class="alert alert-info">
                  {{ $errors->first('minLiefertermin') }}
               </div>
           @endif


<p class="form-paragraph">{{ Form::text('maxLiefertermin', null, array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.max_delivery'), 'id' => 'calendar3')) }}
</p>

  @if($errors->first('maxLiefertermin'))
              <div class="alert alert-info">
                  {{ $errors->first('maxLiefertermin') }}
               </div>
           @endif


<div>
<h2>{{Lang::get('formular.casket')}}</h2>
<p class="form-paragraph form-inline">
    {{Form::number('anzahlBehaelter', Input::old('anzahlBehaelter'),array('placeholder' =>Lang::get('formular.quantity'), 'class' => 'form-control', 'id' =>'anzahlBehaelter'));}}
    {{Form::select('behaelter', array('C' => Lang::get('formular.container'), 'P' => Lang::get('formular.pallet'), 'B' => Lang::get('formular.boxes')), 'C',array('class' => 'form-control', 'id' =>'behaelter'));}}
</p>

          @if($errors->first('anzahlBehaelter'))
              <div class="alert alert-info">
                  {{ $errors->first('anzahlBehaelter') }}
               </div>
           @endif

</div>
</div>


<div class="col-md-4">
<h2>{{Lang::get('formular.means_transport')}}</h2>
<?php $transportmittel =  Input::old('transportmittel[]', array());?>
<p class="form-paragraph">{{ Form::checkbox('transportmittel[]','schiff', in_array('schiff', $transportmittel), array('id' => 'schiff'));}} {{Lang::get('formular.ship')}}</p>
<p class="form-paragraph">{{ Form::checkbox('transportmittel[]','lkw', in_array('lkw', $transportmittel), array('id' => 'lkw'));}} {{Lang::get('formular.lorry')}}</p>
<p class="form-paragraph">{{ Form::checkbox('transportmittel[]','zug', in_array('zug', $transportmittel), array('id' => 'zug'));}} {{Lang::get('formular.train')}}</p>
<p class="form-paragraph">{{ Form::checkbox('transportmittel[]','pkw', in_array('pkw', $transportmittel), array('id' => 'pkw'));}} {{Lang::get('formular.car')}}</p>
<p class="form-paragraph">{{ Form::checkbox('transportmittel[]','flugzeug', in_array('flugzeug', $transportmittel), array('id' => 'flugzeug'));}} {{Lang::get('formular.airplane')}}</p>
<p class="form-paragraph">{{ Form::checkbox('transportmittel[]','egal', in_array('egal', $transportmittel), array('id' => 'egal'));}} {{Lang::get('formular.similar')}}</p>
          @if($errors->first('transportmittel'))
              <div class="alert alert-info">
                  {{ $errors->first('transportmittel') }}
               </div>
           @endif
</div>
</div>


<div class="form-group">
<div class="col-md-4">
<h2>{{Lang::get('formular.prod_info')}}</h2>
<p class="form-paragraph">{{ Form::checkbox('gefahrgut','gefahrgut', Input::old('gefahrgut'),array('id' => 'gefahrengut'));}} {{Lang::get('formular.dangerous')}}</p>
<p class="form-paragraph">{{Form::textarea('beschreibung', Input::old('beschreibung'),array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.description_goods'), 'id' =>'beschreibung'));}}</p>

          @if($errors->first('beschreibung'))
              <div class="alert alert-info">
                  {{ $errors->first('beschreibung') }}
               </div>
           @endif

<p class="form-paragraph form-inline">
{{Form::number('gewicht', Input::old('gewicht'),array('placeholder'=>Lang::get('formular.weight'), 'class' => 'form-control', 'id' =>'gewicht'));}}
{{Form::select('einheit', array('KG' => Lang::get('formular.kilogram'), 'T' => Lang::get('formular.ton')), 'T', array('class' => 'form-control', 'id' =>'einheit'));}}</p>

          @if($errors->first('gewicht'))
              <div class="alert alert-info">
                  {{ $errors->first('gewicht') }}
               </div>
           @endif

<p class="form-paragraph">
{{ Form::text('verpackung', Input::old('verpackung'),array('placeholder' => Lang::get('formular.packaging'), 'class' => 'form-control', 'id' =>'verpackung'));}}</p>

        @if($errors->first('verpackung'))
            <div class="alert alert-info">
                  {{ $errors->first('verpackung') }}
            </div>
        @endif
</div>


<div class="col-md-4">
<h2>{{Lang::get('formular.other')}}</h2>
<div class="top">
<p class="form-paragraph">
{{Form::textarea('bemerkung', Input::old('bemerkung'),array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.comment'), 'id' =>'bemerkung'))}}</p>

        @if($errors->first('bemerkung'))
            <div class="alert alert-info">
                {{ $errors->first('bemerkung') }}
            </div>
        @endif

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
