@extends('admin.master.index')

@section('content')
    <div class="pagetitle">
        <h1>Imóveis</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Imóveis</li>
            </ol>
        </nav>
        <div class="alert alert-dismissible fade ajax-alert" role="alert"></div>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center px-4">
                            <h5 class="card-title">Imóveis Cadastrados</h5>
                            <div>
                                <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">
                                    <i class="bi bi-node-plus"></i>
                                    Cadastrar Imóvel
                                </a>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Leilão</th>
                                    <th scope="col">Lance Inicial</th>
                                    <th scope="col">Lance Atual</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Lances</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($properties)
                                    @foreach ($properties as $property)
                                        <tr>
                                            <th scope="row">{{ $property->id }}</th>
                                            <td>{{ Str::ucfirst($property->type) }}</td>
                                            <td>{{ Str::ucfirst($property->category) }}</td>
                                            <td><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#detailsModal{{ $property->auctions->id }}">
                                                    {{ $property->auctions->name }}</a></td>
                                            <td>{{ moneyBrl($property->price) }}</td>
                                            <td>{{ moneyBrl($property->last_offer) }}</td>
                                            <td>{{ $property->city }}</td>
                                            <td>{{ $property->state }}</td>
                                            <td><a class="me-2" href="{{ route('admin.offers.properties', $property->id) }}">
                                                    <i class="bi bi-currency-dollar text-primary fs-5"></i>
                                                </a></td>
                                            <td class="d-flex">
                                                <a class="me-2" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#detailsPropertyModal{{ $property->id }}">
                                                    <i class="bi bi-eye-fill text-primary fs-5"></i>
                                                </a>
                                                <a class="mx-2"
                                                    href="{{ route('admin.properties.edit', ['property' => $property->id]) }}">
                                                    <i class="bi bi-pencil-square text-warning fs-5"></i>
                                                </a>

                                                <form action="{{ url("api/properties/$property->id") }}" method="POST"
                                                    class="ms-2 ajax-delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="token" value="{{ $token }}">
                                                    <button
                                                        {{ $property->last_offer > $property->price ? 'style=cursor:not-allowed;opacity:0.5 disabled' : '' }}
                                                        type="submit" class="border-0 bg-transparent">
                                                        <i class="bi bi-x-square-fill text-danger fs-5"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        @component('admin.master.components.modal', ['data' => $property->auctions])
                                        @endcomponent

                                        @component('admin.master.components.property-modal', ['data' => $property])
                                        @endcomponent
                                    @endforeach
                                @endisset

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('admin_assets/js/ajax-delete.js') }}"></script>
@endsection
