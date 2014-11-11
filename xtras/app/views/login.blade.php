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

                  <div class="container">
                                     <form class="form-signin" role="form">
                                       <h2 class="form-signin-heading">Please sign in</h2>
                                     <!--
                                      <input type="email" class="form-control" placeholder="Email address" required autofocus>
                                       <input type="password" class="form-control" placeholder="Password" required>
                                      -->
                                         <p>
                                            {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email Adress')) }}
                                         </p>

                                      	<p>
                                     	    {{ Form::password('password', array('placeholder' => 'Password')) }}
                                     	</p>
                                       <div class="checkbox">
                                         <label>
                                           <input type="checkbox" value="remember-me"> Remember me
                                         </label>
                                       </div>

                                       <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                       </form>

                                        </div>

</body>
</html>


