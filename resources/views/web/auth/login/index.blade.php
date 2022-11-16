@extends('web.master.index')

@section('content')
    <section class="text-center">
        <div class="form-signin">
            <form action="{{ url('api/client/login') }}" method="POST" id="login">
                @csrf
                <div class="alert alert-danger alert-dismissible fade" role="alert" id="alertLogin">
                    <strong>Erro!</strong> E-mail ou senha inválidos.
                </div>
                <h1 class="h3 mb-3 fw-normal">Entrar</h1>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="name" placeholder="Digite seu e-mail"
                        required>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Digite sua senha">
                </div>
                <div class="checkbox mb-3">
                    <label class="py-3">
                        <a href="{{ route('web.register') }}">Não tem uma conta? Registre-se!</a>
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
            </form>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/js/auth/login.js') }}"></script>
@endsection
