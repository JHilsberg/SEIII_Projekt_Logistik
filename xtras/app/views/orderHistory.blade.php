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
    {{ HTML::script('js/bootstrap-datepicker.js') }}




    <script type="text/javascript">
        $(document).ready(function () {
            $('#calendar').datepicker({});
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#calendar2').datepicker({});
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#calendar3').datepicker({});
        });
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

            <li class=""><a href="{{ URL::to('secure') }}">{{Lang::get('menu.new_order')}}</a></li>
            <li class="active"><a href="#">{{Lang::get('menu.order_history')}}</a></li>
            <li class=""><a href="{{ URL::to('myAccount') }}">{{Lang::get('menu.account')}}</a></li>

        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-expanded="false">{{ Lang::get('menu.language') }}<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{$localeCode}}"
                               href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                {{{ $properties['native'] }}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{ URL::to('logout') }}">{{Lang::get('menu.logout')}}</a></li>
        </ul>

    </div>
</nav>



<table class="table">
    <thead>
    <tr>
        <th data-field="beschreibung">{{Lang::get('orderhistory.startenterprise')}}</th>
        <th data-field="beschreibung">{{Lang::get('orderhistory.loading_place')}}</th>
        <th data-field="beschreibung">{{Lang::get('orderhistory.targetenterprise')}}</th>
        <th data-field="beschreibung">{{Lang::get('orderhistory.deliveryPlace')}}</th>
        <th data-field="beschreibung">{{Lang::get('orderhistory.description_goods')}}</th>
        <th data-field="abgespeichert">{{Lang::get('orderhistory.timestamp')}}</th>
        <th data-field="beschreibung">{{Lang::get('orderhistory.status')}}</th>
        <th data-field="abgespeichert">{{Lang::get('orderhistory.actions')}}</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($orders as $order)
        <tr>
            <td>{{$order->abholadresse()->first()->firma}}</td>
            <td>{{$order->abholadresse()->first()->ort}}</td>
            <td>{{$order->lieferadresse()->first()->firma}}</td>
            <td>{{$order->lieferadresse()->first()->ort}}</td>
            <td>{{$order->warenbeschreibung}}</td>
            <td>{{date("d.m.y H:i", strtotime($order->abgespeichert))}}</td>

            @if(($order->abgesendet!='0000-00-00 00:00:00' && !(File::exists(public_path().'/pdf//'.Auth::user()->email.'//'.$order->id.'/file.pdf'))))<!--Server URL setzen-->
            <td>{{Lang::get('orderhistory.procress')}}</td>
                <td>
                    {{ Form::open(['route' => ['editOrder', $order->id]]) }}
                    {{ Form::submit(Lang::get('orderhistory.watch'), array('class' => 'btn btn-primary btn-block', 'name' => 'test')) }}
                    {{ Form::close() }}
                </td>
                <td>

                </td>
                <td>

                </td>
            @elseif(($order->abgesendet!='0000-00-00 00:00:00' && (File::exists(public_path().'/pdf//'.Auth::user()->email.'//'.$order->id.'/file.pdf'))))<!--Server URL setzen-->
                <td>{{Lang::get('orderhistory.done')}}</td>
                <td>
                     {{ Form::open(['route' => ['editOrder', $order->id]]) }}
                    {{ Form::submit(Lang::get('orderhistory.watch'), array('class' => 'btn btn-primary btn-block', 'name' => 'test')) }}
                    {{ Form::close() }}
                </td>
                <td>
                    {{ Form::open(['action' => 'PDFController@start']) }}
                    {{ Form::submit(Lang::get('orderhistory.show'), array('class' => 'btn btn-primary btn-block', 'name' => 'show')) }}
                    {{ Form::close() }}
                </td>
                <td>
                    {{ Form::open(['action' => 'PDFController@start']) }}
                    {{ Form::submit(Lang::get('orderhistory.save'), array('class' => 'btn btn-primary btn-block', 'name' => 'save')) }}
                    {{ Form::close() }}

                </td>
            @elseif(($order->abgespeichert!=null)&&($order->abgesendet='0000-00-00 00:00:00' ))
                <td>{{Lang::get('orderhistory.saveorder')}}</td>
                <td>
                    {{ Form::open(['route' => ['editOrder', $order->id]]) }}
                    {{ Form::submit(Lang::get('orderhistory.edit'), array('class' => 'btn btn-primary btn-block', 'name' => 'test')) }}
                    {{ Form::close() }}

                </td>
                <td>

                </td>
                <td>

                </td>

            @endif

        </tr>
    @endforeach

    </tbody>
</table>

</body>
</html>
