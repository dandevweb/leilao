<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('web.home') }}">Auction</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="{{ route('web.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('web.vehicle.index') }}">Veículos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('web.property.index') }}">Imóveis</a>
                    </li>
                </ul>
                <div class="d-none align-items-center" id="loggedUser">
                    <h6 class="mr-4 mb-0 text-white">Bem-vindo, <strong></strong></h6>
                    <a class="text-white" id="logout" href="">Sair</a>
                </div>

                <div class="d-flex" id="loginRoute">
                    <a href="{{ route('web.login') }}" class="btn btn-success">Entrar</a>
                </div>
            </div>
        </div>
    </nav>
</header>
