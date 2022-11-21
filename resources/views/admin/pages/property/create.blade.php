@extends('admin.master.index')

@section('content')
    <div class="pagetitle">
        <h1>Cadastro de Imóvel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">Imóveis</a></li>
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
                        <h5 class="card-title">Entre com os dados da Imóvel</h5>

                        <form class="row g-3 needs-validation ajax-form" novalidate method="POST"
                            action="{{ url('api/properties') }}">
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

                            <div class="col-md-3">
                                <label for="" class="form-label">Categoria</label>
                                <select class="form-select form-select" name="category" required>
                                    <option value="">Selecione</option>
                                    <option value="residencial">Residencial</option>
                                    <option value="comercial">Comercial</option>
                                    <option value="rural">Rural</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="" class="form-label">Tipo</label>
                                <select class="form-select form-select" name="type" required>
                                    <option value="">Selecione</option>
                                    <option value="casa">Casa</option>
                                    <option value="apartamento">Apartamento</option>
                                    <option value="terreno">Terreno</option>
                                    <option value="chácara">Chácara</option>
                                    <option value="fazenda">Fazenda</option>
                                    <option value="galpão">Galpão</option>
                                    <option value="terreno">Terreno</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="area_total" class="form-label">Área total</label>
                                <input type="number" name="area_total" class="form-control" required>
                            </div>

                            <div class="col-md-3">
                                <label for="area_util" class="form-label">Área útil</label>
                                <input type="number" name="area_util" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="address" class="form-label">Endereço</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>

                            <div class="col-md-3">
                                <label for="city" class="form-label">Cidade</label>
                                <input type="text" name="city" class="form-control" required>
                            </div>

                            <div class="col-md-3">
                                <label for="" class="form-label">Estado</label>
                                <select class="form-select form-select" name="state" required>
                                    <option value="">Selecione</option>
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

                            <div class="col-md-6">
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
