@extends('web.master.index')

@section('content')
    <section class="text-center">
        <div class="form-signin">
            <form action="{{ url('api/client/register') }}" method="POST" id="register">
                @csrf
                <div class="alert alert-dismissible fade" role="alert" id="alertRegister">

                </div>

                <h1 class="h3 mb-3 fw-normal">Registre-se</h1>
                <div class="form-floating">
                    <input type="text" name="name" class="form-control" placeholder="Digite seu nome" required>
                </div>
                <div class="form-floating">
                    <input type="text" name="document" class="form-control" placeholder="Digite seu CPF" required>
                </div>
                <div class="form-floating">
                    <input type="text" name="phone" class="form-control" placeholder="Digite seu telefone" required>
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" placeholder="Digite seu e-mai requiredl">
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" placeholder="Digite uma senha" required>
                </div>
                <div class="checkbox mb-3">
                    <label class="py-3">
                        <a href="{{ route('web.login') }}">Já tem uma conta? Entre!</a>
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button>
            </form>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('assets/js/auth/register.js') }}"></script>
@endsection
