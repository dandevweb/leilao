@extends('admin.master.index')

@section('content')
    <div class="pagetitle">
        <h1>Cadastro de Veículo</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.vehicles.index') }}">Veículos</a></li>
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
                        <h5 class="card-title">Entre com os dados da Veículo</h5>

                        <form class="row col-lg-8 g-3 needs-validation ajax-form" novalidate method="POST"
                            action="{{ url('api/vehicles') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="col-md-3">
                                <label for="price" class="form-label">Lance Inicial</label>
                                <input type="number" name="price" class="form-control money-mask" required
                                    placeholder="9999.00">
                            </div>

                            <div class="col-md-3">
                                <label for="increment" class="form-label money-mask">Incremento</label>
                                <input type="number" name="increment" class="form-control" required placeholder="99.00">
                            </div>

                            <div class="col-md-6">
                                <label for="stored_in" class="form-label">Local de Armazenamento </label>
                                <input type="text" name="stored_in" class="form-control" required>
                            </div>

                            <div class="col-md-3">
                                <label for="quantity" class="form-label">Quantidade</label>
                                <input type="number" name="quantity" class="form-control" min="1" value="1"
                                    required>
                            </div>

                            <div class="col-md-9">
                                <label for="" class="form-label">Leilão</label>
                                <select class="form-select form-select" name="auction_id" required>
                                    <option value="">Selecione</option>
                                    @foreach ($auctions as $auction)
                                        <option value="{{ $auction->id }}">{{ $auction->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <h5 class="card-title">Descrição</h5>
                                <!-- TinyMCE Editor -->
                                <textarea name="description" class="tinymce-editor"> </textarea>
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
    <script src="{{ asset('admin_assets/js/ajax-form.js') }}"></script>
@endsection
