@extends('admin.master.index')

@section('content')
    <div class="pagetitle">
        <h1>Veículos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Veículos</li>
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
                            <h5 class="card-title">Veículos Cadastrados</h5>
                            <div>
                                <a href="{{ route('admin.vehicles.create') }}" class="btn btn-primary">
                                    <i class="bi bi-node-plus"></i>
                                    Cadastrar Veículo
                                </a>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Leilão</th>
                                    <th scope="col">Lance Inicial</th>
                                    <th scope="col">Lance Atual</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Armazenado em</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($vehicles)
                                    @foreach ($vehicles as $vehicle)
                                        <tr>
                                            <th scope="row">{{ $vehicle->id }}</th>
                                            <td>{!! Str::substr($vehicle->description, 0, 50) . '...' !!}</td>
                                            <td><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#detailsModal{{ $vehicle->auctions->id }}">
                                                    {{ $vehicle->auctions->name }}</a></td>
                                            <td>{{ moneyBrl($vehicle->price) }}</td>
                                            <td>{{ moneyBrl($vehicle->last_offer) }}</td>
                                            <td>{{ $vehicle->quantity }}</td>
                                            <td>{{ $vehicle->stored_in }}</td>
                                            <td class="d-flex">
                                                <a class="me-1"
                                                    href="{{ route('admin.vehicles.edit', ['vehicle' => $vehicle->id]) }}">
                                                    <i class="bi bi-pencil-square text-warning fs-5"></i>
                                                </a>

                                                <form action="{{ url("api/vehicles/$vehicle->id") }}" method="POST"
                                                    class="ms-2 ajax-delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="token" value="{{ $token }}">
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="bi bi-x-square-fill text-danger fs-5"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        @component('admin.master.components.modal', ['data' => $vehicle->auctions])
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
