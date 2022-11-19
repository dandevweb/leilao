@extends('admin.auth.layouts.app')

@section('content')
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="alert alert-danger alert-dismissible fade" role="alert" id="alertLogin">
                            <strong>Erro!</strong> E-mail ou senha inválidos.
                        </div>
                        <div class="d-flex justify-content-center py-4">
                            <a href="{{ route('web.home') }}" target="_blank" class="logo d-flex align-items-center w-auto">
                                <img src="{{ asset('admin_assets/img/auction-logo.png') }}" alt="Logo">
                                <span class="d-none d-lg-block">AUCTION ADMIN</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Faça o Login para Continuar</h5>
                                </div>

                                <form class="row g-3 needs-validation" method="POST" action="{{ url('/api/login') }}"
                                    id="login">
                                    @csrf
                                    <div class="col-12">
                                        <label for="email" class="form-label">E-mail</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="email" name="email" class="form-control" id="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Senha</label>
                                        <input type="password" name="password" class="form-control" name="password" required
                                            autocomplete="current-password" id="password">
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Entrar</button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection

@section('js')
    <script src="{{ asset('admin_assets/js/auth/login.js') }}"></script>
@endsection
