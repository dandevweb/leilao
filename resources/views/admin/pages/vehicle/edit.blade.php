@extends('admin.master.index')

@section('content')
    <div class="pagetitle">
        <h1>Edição de Veículo</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.vehicles.index') }}">Veículos</a></li>
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

                        <form class="row col-md-8 g-3 needs-validation ajax-form" novalidate method="POST"
                            action="{{ url("api/vehicles/$vehicle->id") }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="id" value="{{ $vehicle->id }}">
                            <div class="col-md-3">
                                <label for="price" class="form-label">Lance Inicial</label>
                                <input type="number" name="price" class="form-control money-mask" required
                                    value="{{ $vehicle->price }}" placeholder="9999.00">
                            </div>

                            <div class="col-md-3">
                                <label for="increment" class="form-label money-mask">Incremento</label>
                                <input type="number" name="increment" class="form-control" required
                                    value="{{ $vehicle->increment }}" placeholder="99.00">
                            </div>

                            <div class="col-md-6">
                                <label for="stored_in" class="form-label">Local de Armazenamento </label>
                                <input type="text" name="stored_in" class="form-control" required
                                    value="{{ $vehicle->stored_in }}">
                            </div>

                            <div class="col-md-3">
                                <label for="quantity" class="form-label">Quantidade</label>
                                <input type="number" name="quantity" class="form-control" min="1" value="1"
                                    required value="{{ $vehicle->quantity }}">
                            </div>

                            <div class="col-md-9">
                                <label for="" class="form-label">Leilão</label>
                                <select class="form-select form-select" name="auction_id" required>
                                    <option value="">Selecione</option>
                                    @foreach ($auctions as $auction)
                                        <option value="{{ $auction->id }}"
                                            {{ $vehicle->auctions->id === $auction->id ? 'selected' : '' }}>
                                            {{ $auction->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <h5 class="card-title">Descrição</h5>
                                <!-- TinyMCE Editor -->
                                <textarea name="description" class="tinymce-editor"> {{ $vehicle->description }}</textarea>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="{{ asset('admin_assets/js/ajax-form.js') }}"></script>
@endsection
