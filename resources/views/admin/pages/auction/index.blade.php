@extends('admin.master.index')

@section('content')
    <div class="pagetitle">
        <h1>Leilões</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Leilões</li>
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
                            <h5 class="card-title">Leilões Cadastrados</h5>
                            <div>
                                <a href="{{ route('admin.auctions.create') }}" class="btn btn-primary">
                                    <i class="bi bi-node-plus"></i>
                                    Cadastrar Leilão
                                </a>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Data de Início</th>
                                    <th scope="col">Data Final</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($auctions)
                                    @foreach ($auctions as $auction)
                                        <tr>
                                            <th scope="row">{{ $auction->id }}</th>
                                            <td>{{ $auction->name }}</td>
                                            <td>{{ dateBrl($auction->date) }}</td>
                                            <td>{{ dateBrl($auction->finished_date) }}</td>
                                            <td>{{ $auction->city }}</td>
                                            <td>{{ $auction->state }}</td>
                                            <td class="d-flex">
                                                <a class="me-1" href="{{ route('admin.auctions.show', $auction->id) }}"
                                                    data-bs-toggle="modal" data-bs-target="#detailsModal{{ $auction->id }}">
                                                    <i class="bi bi-eye-fill text-primary fs-5"></i>
                                                </a>
                                                <a class="me-1 ms-2" href="{{ route('admin.auctions.edit', $auction->id) }}">
                                                    <i class="bi bi-pencil-square text-warning fs-5"></i>
                                                </a>

                                                <form action="{{ url("api/auctions/$auction->id") }}" method="POST"
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

                                        @component('admin.master.components.modal', ['data' => $auction])
                                        @endcomponent
                                    @endforeach
                                @endisset

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('admin_assets/js/ajax-delete.js') }}"></script>
@endsection
