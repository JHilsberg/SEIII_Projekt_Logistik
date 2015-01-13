<!doctype html>
<html>


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.00">
    <!-- CSS are placed here -->
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-theme.css') }}
    {{ HTML::style('css/account.css') }}
    <!-- Scripts are placed here -->
    {{ HTML::script('js/jquery-2.1.1.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/accountviewcontroller.js')}}
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

            <li class=""><a href="{{ URL::to('secure') }}">{{Lang::get('menu.new_order')}}</a></li>
            <li class=""><a href="{{ URL::to('orderHistory') }}">{{Lang::get('menu.order_history')}}</a></li>
            <li class="active"><a href="#">{{Lang::get('menu.account')}}</a></li>

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

@if($errors->has())
    <div class="alert alert-info">
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form class="form-vertical" role="form" method="POST" action="{{Url::to('account')}}">

    <div class="container">



        <div class="form-group">
            <div class="col-md-4">
            <p class="form-paragraph left">
                {{ Form::label('email', Lang::get('account.email'), array('class' => 'account-labels')); }}
            </p>
             <p class="form-paragraph">
                            {{ Form::text('email-text',Auth::user()->email, array('disabled', 'class' => 'form-control')); }}
                        </p>

            <p class="form-paragraph left">
                {{ Form::label('name', Lang::get('account.name'), array('class' => 'account-labels')); }}
            </p>
                <p class="form-paragraph">
                            {{ Form::text('name-text',Auth::user()->nachname, array('disabled' => 'disabled', 'class' => 'form-control')); }}
                        </p>


            <p class="form-paragraph left">
            {{ Form::label('surname', Lang::get('account.surname'), array('class' => 'account-labels')); }}

            </p>
               <p class="form-paragraph">
                        {{ Form::text('surname-text',Auth::user()->vorname, array('disabled' => 'disabled', 'class' => 'form-control')); }}
                        </p>


            <p class="form-paragraph left">
            {{ Form::label('company', Lang::get('account.firma'), array('class' => 'account-labels')); }}

            </p>

                 <p class="form-paragraph">
                        {{ Form::text('company-text',Auth::user()->firma, array('disabled' => 'disabled', 'class' => 'form-control')); }}
                        </p>


            <p class="form-paragraph left">
            {{ Form::label('street', Lang::get('account.strasse'), array('class' => 'account-labels')); }}
            </p>

              <p class="form-paragraph">
                        {{ Form::text('street-text',Auth::user()->strasse, array('disabled' => 'disabled', 'class' => 'form-control')); }}
                        </p>


            <p class="form-paragraph left">
            {{ Form::label('housenumber', Lang::get('account.hausnummer'), array('class' => 'account-labels')); }}
            </p>

                  <p class="form-paragraph">
                        {{ Form::text('housenumber-text',Auth::user()->hausnummer, array('disabled' => 'disabled', 'class' => 'form-control')); }}
                        </p>


            <p class="form-paragraph left">
            {{ Form::label('city', Lang::get('account.ort'), array('class' => 'account-labels')); }}

            </p>

               <p class="form-paragraph">
                        {{ Form::text('city-text',Auth::user()->ort, array('disabled' => 'disabled', 'class' => 'form-control')); }}
                        </p>


            <p class="form-paragraph left">
            {{ Form::label('pincode', Lang::get('account.plz'), array('class' => 'account-labels')); }}
            </p>

               <p class="form-paragraph">
                        {{ Form::text('pincode-text',Auth::user()->postleitzahl, array('disabled' => 'disabled', 'class' => 'form-control')); }}
                        </p>


            <p class="form-paragraph left">
            {{ Form::label('country', Lang::get('account.land'));}}
            </p>

                <p class="form-paragraph">
                        {{ Form::text('country-text',Auth::user()->land, array('disabled' => 'disabled', 'class' => 'form-control'));}}
                        </p>


            <p class="form-paragraph">
             {{ Form::button(Lang::get('account.edit'), array('class' => 'btn btn-lg btn-primary btn-block btn-account', 'onclick' => 'enableTexts()', 'id' => 'saveButton')); }}
            </p>

                  <p class="form-paragraphsubmit">
                        {{ Form::submit(Lang::get('account.save'), array('disabled','class' => 'btn btn-lg btn-primary btn-block btn-account btn-success','onclick' => 'disablebutton()','id'=>'save')); }}
                       </p>



          </div>
    </div>

</div>
</form>


</body>
</html>
