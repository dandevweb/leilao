@extends('admin.master.index')

@section('content')
    <div class="pagetitle">
        <h1>Edição de Leilão</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.auctions.index') }}">Leilões</a></li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </nav>
        <div class="alert alert-dismissible fade ajax-alert" role="alert"></div>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Altere os dados necessários</h5>

                        <form class="row g-3 needs-validation ajax-form" novalidate method="POST"
                            action="{{ url("api/auctions/$auction->id") }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="id" value="{{ $auction->id }}">
                            <div class="col-md-3">
                                <label for="date" class="form-label">Data</label>
                                <input type="date" name="date" class="form-control" required
                                    value="{{ $auction->date }}">
                            </div>

                            <div class="col-md-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" name="name" class="form-control" required
                                    value="{{ $auction->name }}">
                            </div>

                            <div class="col-md-6">
                                <label for="address" class="form-label">Logradouro</label>
                                <input type="text" name="address" class="form-control" required
                                    value="{{ $auction->address }}">
                            </div>

                            <div class="col-md-3">
                                <label for="city" class="form-label">Cidade</label>
                                <input type="text" name="city" class="form-control" required
                                    value="{{ $auction->city }}">
                            </div>

                            <div class="col-md-4">
                                <label for="" class="form-label">Estado</label>
                                <select class="form-select form-select" name="state" required>
                                    <option value="{{ $auction->state }}">{{ $auction->state }}</option>
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AP">AP</option>
                                    <option value="AM">AM</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MT">MT</option>
                                    <option value="MS">MS</option>
                                    <option value="MG">MG </option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PR">PR</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">TO</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label for="" class="form-label">Financeira</label>
                                <select class="form-select form-select" name="bank_id" required>
                                    @foreach ($banks as $bank)
                                        <option {{ $bank->id === $auction->bank->id ? 'selected' : '' }}
                                            value="{{ $bank->id }}">
                                            {{ $bank->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Atualizar</button>
                            </div>
                        </form><!-- End Custom Styled Validation -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('admin_assets/js/ajax-form.js') }}"></script>
@endsection
