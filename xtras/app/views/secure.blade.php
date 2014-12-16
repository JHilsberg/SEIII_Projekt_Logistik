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
<p class="form-paragraph">{{ Form::text('lp_name', Input::old('lp_name'),array('placeholder' => Lang::get('formular.name'), 'class' => 'form-control'));}}</p>


          @if($errors->first('lp_name'))
              <div class="alert alert-info">
                  {{ $errors->first('lp_name') }}
               </div>
           @endif




<p class="form-paragraph form-inline">
        {{ Form::text('lp_street', Input::old('lp_street'),array('placeholder' => Lang::get('formular.street'), 'class' => 'form-control'));}}
        {{ Form::text('lp_number', Input::old('lp_number'),array('placeholder' => Lang::get('formular.number'), 'class' => 'form-control'));}}
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
    {{ Form::text('lp_plz', Input::old('lp_plz'),array('placeholder' => Lang::get('formular.plz'), 'class' => 'form-control'));}}
    {{ Form::text('lp_city', Input::old('lp_city'),array('placeholder' => Lang::get('formular.city'), 'class' => 'form-control'));}}
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
    {{ Form::text('dp_name', Input::old('lp_name'),array('placeholder' => Lang::get('formular.name'), 'class' => 'form-control'));}}
</p>

          @if($errors->first('dp_name'))
              <div class="alert alert-info">
                  {{ $errors->first('dp_name') }}
               </div>
           @endif

<p class="form-paragraph form-inline">
{{ Form::text('dp_street', Input::old('dp_street'),array('placeholder' => Lang::get('formular.street'), 'class' => 'form-control'));}}
{{ Form::text('dp_number', Input::old('dp_number'),array('placeholder' => Lang::get('formular.number'), 'class' => 'form-control'));}}</p>

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
    {{ Form::text('dp_plz', Input::old('dp_plz'),array('placeholder' => Lang::get('formular.plz'), 'class' => 'form-control'));}}
    {{ Form::text('dp_city', Input::old('dp_city'),array('placeholder' => Lang::get('formular.city'), 'class' => 'form-control'));}}
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
<p class="form-paragraph">{{ Form::text('minLiefertermin', null, array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.min_delivery'), 'id' => 'calendar2')) }}
</p>
<p class="form-paragraph">{{ Form::text('maxLiefertermin', null, array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.max_delivery'), 'id' => 'calendar3')) }}
</p>


<div>
<h2>{{Lang::get('formular.casket')}}</h2>
<p class="form-paragraph form-inline">
    {{Form::number('anzahlBehaelter', Input::old('anzahlBehaelter'),array('placeholder' =>Lang::get('formular.quantity'), 'class' => 'form-control'));}}
    {{Form::select('behaelter', array('C' => Lang::get('formular.container'), 'P' => Lang::get('formular.pallet'), 'B' => Lang::get('formular.boxes')), 'C',array('class' => 'form-control'));}}
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
<p class="form-paragraph">{{ Form::checkbox('schiff', Input::old('schiff'));}} {{Lang::get('formular.ship')}}</p>
<p class="form-paragraph">{{ Form::checkbox('lkw', Input::old('lkw'));}} {{Lang::get('formular.lorry')}}</p>
<p class="form-paragraph">{{ Form::checkbox('zug', Input::old('zug'));}} {{Lang::get('formular.train')}}</p>
<p class="form-paragraph">{{ Form::checkbox('pkw', Input::old('pkw'));}} {{Lang::get('formular.car')}}</p>
<p class="form-paragraph">{{ Form::checkbox('flugzeug', Input::old('flugzeug'));}} {{Lang::get('formular.airplane')}}</p>
<p class="form-paragraph">{{ Form::checkbox('egal', Input::old('egal'));}} {{Lang::get('formular.similar')}}</p>
</div>
</div>


<div class="form-group">
<div class="col-md-4">
<h2>{{Lang::get('formular.prod_info')}}</h2>
<p class="form-paragraph">{{ Form::checkbox('gefahrgut', Input::old('gefahrgut'));}} {{Lang::get('formular.dangerous')}}</p>
<p class="form-paragraph">{{Form::textarea('beschreibung', Input::old('beschreibung'),array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.description_goods')));}}</p>

          @if($errors->first('beschreibung'))
              <div class="alert alert-info">
                  {{ $errors->first('beschreibung') }}
               </div>
           @endif

<p class="form-paragraph form-inline">
{{Form::number('gewicht', Input::old('gewicht'),array('placeholder'=>Lang::get('formular.weight'), 'class' => 'form-control'));}}
{{Form::select('einheit', array('KG' => Lang::get('formular.kilogram'), 'T' => Lang::get('formular.ton')), 'T', array('class' => 'form-control'));}}</p>

          @if($errors->first('gewicht'))
              <div class="alert alert-info">
                  {{ $errors->first('gewicht') }}
               </div>
           @endif

<p class="form-paragraph">
{{ Form::text('verpackung', Input::old('verpackung'),array('placeholder' => Lang::get('formular.packaging'), 'class' => 'form-control'));}}</p>

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
{{Form::textarea('bemerkung', Input::old('bemerkung'),array('type' => 'text', 'class' => 'form-control','placeholder' => Lang::get('formular.comment')))}}</p>

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
