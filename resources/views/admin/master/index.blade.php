<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('admin_assets/img/logo-ecos.png') }}" rel="icon">
    <link href="{{ asset('admin_assets/img/logo-ecos.png') }}" rel="apple-touch-icon">

    @include('admin.master.components.styles')
</head>

<body>

    @include('admin.master.components.header')

    @include('admin.master.components.sidebar')

    <main id="main" class="main">

        @include('admin.master.components.alerts')

        @yield('content')



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="credits">
            Desenvolvido por <a target="_blank" href="https://cv.dansol.com.br/guar">Danilo Augusto</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('admin.master.components.scripts')

</body>

</html>
