@extends('web.master.index')

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                        src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible show d-none" role="alert" id="alertOffer">
                        Lance registrado com sucesso.
                    </div>
                    @isset($product->type)
                        <h1 class="display-5 fw-bolder mb-5">
                            {{ ucfirst($product->type) . ' em ' . $product->city . ' - ' . $product->state }}
                        </h1>
                    @endisset


                    <div class="d-flex justify-content-around">
                        <div class="mb-4">
                            <strong>Abertura: </strong>
                            <span><br>{{ dateBrl($product->auctions->date) }}</span>
                        </div>
                        <div class="mb-4">
                            <strong>Encerramento: </strong>
                            <span><br>{{ dateBrl($product->auctions->finished_date) }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="fs-5 mb-5">
                            <strong>Lance Inicial</strong><br>
                            <span class="text-decoration-line-through">R${{ moneyBrl($product->price) }}</span>
                        </div>
                        <div class="fs-5 mb-5">
                            <strong>Último Lance</strong><br>
                            <span>R${{ moneyBrl($product->last_offer) }}</span>
                        </div>
                    </div>

                    <p class="lead">{{ $product->description }}</p>
                    <form action="{{ route('web.make.offer') }}" class="d-flex" method="post" id="formMakeOffer">
                        @csrf
                        <input type="hidden" name="client_id" value="0">
                        <input type="hidden" name="client_token" value="0">
                        <input type="hidden" name="vehicle_id" value="{{ !isset($product->type) ? $product->id : null }}">
                        <input type="hidden" name="property_id" value="{{ isset($product->type) ? $product->id : null }}">
                        <input class="form-control
                            text-center me-3" id="inputQuantity"
                            name="price" type="number" min="{{ $product->last_offer + $product->increment }}"
                            value="{{ $product->last_offer + $product->increment }}" step="{{ $product->increment }}"
                            style="max-width: 10rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Dar Lance
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/js/web/offer.js') }}"></script>
@endsection
