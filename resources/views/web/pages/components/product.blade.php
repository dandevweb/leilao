<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $product)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                        </div>

                        <!-- Product image-->
                        <img class="card-img-top" src="{{ $product->images[0]->path }}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <p>
                                    {!! !isset($product->type)
                                        ? Str::substr($product->description, 0, 70) . '...'
                                        : ucfirst($product->type) . ' em ' . $product->city . ' - ' . $product->state !!}
                                </p>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <p class="mb-1">
                                    <strong>Lance Inicial</strong> <br>
                                    {{ moneyBrl($product->price) }}
                                </p>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                    href="
                                    {{ !isset($product->type) ? route('web.vehicle.show', $product->id) : route('web.property.show', $product->id) }}">Ver
                                    detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
