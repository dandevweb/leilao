@extends('admin.master.index')

@section('content')
    <div class="pagetitle">
        <h1>Financeiras</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Financeiras</li>
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
                            <h5 class="card-title">Financeiras Cadastradas</h5>
                            <div>
                                <a href="{{ route('admin.banks.create') }}" class="btn btn-primary">
                                    <i class="bi bi-node-plus"></i>
                                    Cadastrar Financeira
                                </a>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">CNPJ</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($banks)
                                    @foreach ($banks as $bank)
                                        <tr>
                                            <th scope="row">{{ $bank->id }}</th>
                                            <td>{{ $bank->name }}</td>
                                            <td>{{ $bank->document }}</td>
                                            <td class="d-flex">
                                                <a class="me-1" href="{{ route('admin.banks.edit', ['bank' => $bank->id]) }}">
                                                    <i class="bi bi-pencil-square text-warning fs-5"></i>
                                                </a>

                                                <form action="{{ url("api/banks/$bank->id") }}" method="bank"
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
