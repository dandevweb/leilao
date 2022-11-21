@extends('web.master.index')

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <h2 class="pb-5">Meus Lances</h2>
            @if (isset($offers))
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offers as $offer)
                            <tr>
                                <th scope="row">{{ dateBrl($offer->date) }}</th>
                                <td>{!! $offer->property ?? $offer->vehicle !!}</td>
                                <td>{{ moneyBrl($offer->price) }}</td>
                                <td>
                                    {{ date($offer->auctionEndDate) > date('Y-m-d')
                                        ? 'Encerra em ' . dateBrl($offer->auctionEndDate)
                                        : 'Encerrado em ' . dateBrl($offer->auctionEndDate) }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <h3>Vocâ ainda não deu Lances</h3>
            @endif
            <div>
                <a class="btn btn-success" href="{{ url('/') }}">Voltar</a>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/js/web/offer.js') }}"></script>
@endsection
