<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Leilão</title>

    @include('web.components.styles')
</head>

<body>

    @include('web.components.header')

    <main>
        @yield('content')
    </main>

    @include('web.components.footer')

    @include('web.components.scripts')


</body>

</html>
