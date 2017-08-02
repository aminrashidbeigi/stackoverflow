@include('partials._head')
@yield('stylesheets')
<body>

@include('partials._navbar')

<div class="container">
    @include('partials._message')
    @yield('content')
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script></body>
{!! Html::script('js/select2.min.js') !!}
@yield('scripts')

</body>
</html>