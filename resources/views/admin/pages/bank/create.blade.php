@extends('admin.master.index')

@section('content')
    <div class="pagetitle">
        <h1>Cadastro de Financeira</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.banks.index') }}">Financeiras</a></li>
                <li class="breadcrumb-item active">Cadastro</li>
            </ol>
        </nav>

        <div class="alert alert-dismissible fade ajax-alert" role="alert"></div>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Entre com os dados da Financeira</h5>

                        <!-- Custom Styled Validation -->
                        <form class="row g-3 needs-validation ajax-form" novalidate method="POST"
                            action="{{ url('api/banks') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="col-md-12">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" name="name" class="form-control" required>

                            </div>

                            <div class="col-md-12">
                                <label for="document" class="form-label">CNPJ</label>
                                <input type="text" name="document" class="form-control" id="documentCompany" required>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Cadastrar</button>
                            </div>
                        </form><!-- End Custom Styled Validation -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="{{ asset('admin_assets/js/ajax-form.js') }}"></script>
@endsection
