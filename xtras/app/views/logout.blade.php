<!DOCTYPE html>
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
<title>Xtras - Logout</title>
</head>
<body>
<p style="position: relative"><strong>Sie haben sich erfolgreich abgemeldet!</strong></p>
<p><a href="login">Zurück zum Login</a></p>
<button onclick="openLogoutDialog()">Test</button>
</body>


</html>
