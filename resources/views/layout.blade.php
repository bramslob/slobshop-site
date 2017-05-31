<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SlobsShop</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css"/>

</head>
<body>
<div class="body">
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    SlobShop
                </h1>
                <h2 class="subtitle">
                    @yield('subtitle', 'Easy shared lists')
                </h2>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container is-fluid">
            @yield('content')
        </div>
    </section>
</div>
<script src="{{ mix('/js/app.js') }}" type="text/javascript"></script>
<script>
    App = new app($('#modal_container'));
</script>
@yield('script')

</body>
</html>