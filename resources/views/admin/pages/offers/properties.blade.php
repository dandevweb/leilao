@extends('admin.master.index')

@section('content')
    <div class="pagetitle">
        <h1>Lances</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Lances</li>
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
                            <h5 class="card-title">Lances de imóveis</h5>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Imóvel</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($offers)
                                    @foreach ($offers as $offer)
                                        <tr>
                                            <th scope="row">{{ $offer->offer_id }}</th>
                                            <td>{{ Str::ucfirst($offer->property_description) }}
                                            </td>
                                            <td>{{ $offer->client_name }}</td>
                                            <td>{{ moneyBrl($offer->offer) }}</td>
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
