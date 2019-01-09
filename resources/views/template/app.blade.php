<html lang="en">
<head>
    @include('template.partial._head')
</head>
<body>
    <div class="jumbotron bg-success text-center" style="padding: 10 0px;">
        <h3>BE - Berat</h3>
        <strong>Sirclo Prescreen Test Part#3</strong>
    </div>

    <section class="container" style="padding-top: 20px;">
        @yield('content')
    </section>

    @include('template.partial._script')
</body>
</html>