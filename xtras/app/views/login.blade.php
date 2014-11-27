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
<title>Xtras - Login</title>
</head>
<body onload="@if(App::getLocale() == 'de' && Session::has('logout'))openLogoutDialogDE()
                @elseif(App::getLocale() == 'en' && Session::has('logout'))openLogoutDialogEN()@endif">
                    <div class="btn-group pull-right btn-margin-top btn-margin-right btn-group-sm" role="group">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="btn btn-default" rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                    {{{ $properties['native'] }}}
                            </a>
                        @endforeach
                    </div>
                <div class="container">
                       <form class="form-signin" role="form" method="POST" action="{{ URL::to('login') }}">

                         <h2 class="form-signin-heading" style="text-align: center">{{ Lang::get('login.heading') }}</h2>
                         <p style="text-align: center">
                            {{ Form::text('email', Input::old('email'), array('placeholder' => Lang::get('login.email'))) }}
                         </p>
                         <div style="height: 30dpi">
                            @if($errors->first('email'))
                                <div class="alert alert-info">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                         </div>
                         <p style="text-align: center">
                            {{ Form::password('password', array('placeholder' => Lang::get('login.password'))) }}
                         </p>
                         @if(Session::has('wrongPassword'))
                            <div class="alert alert-info">
                                {{ Session::get('wrongPassword') }}
                            </div>
                         @endif
                         @if($errors->first('password'))
                            <div class="alert alert-info">
                                {{ $errors->first('password')}}
                            </div>
                         @endif
                         <div class="checkbox" style="text-align: center">
                            <label>
                                <input type="checkbox" value="remember-me"> {{ Lang::get('login.remember') }}
                            </label>
                          </div>
                          {{ Form::submit(Lang::get('login.signin'), array('class' => 'btn btn-lg btn-primary btn-block')) }}
                       </form>
                  </div>

</body>
</html>


