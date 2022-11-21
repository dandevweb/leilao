<div class="modal fade" id="detailsPropertyModal{{ $data->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes do Imóvel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body profile">
                <div class="profile-overview" id="profile-overview">
                    <h5 class="card-title">Descrição</h5>
                    <p class="small fst-italic">{!! $data->description !!}</p>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Lance Inicial</div>
                        <div class="col-lg-9 col-md-8">{{ moneyBrl($data->price) }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Lance Atual</div>
                        <div class="col-lg-9 col-md-8">{{ moneyBrl($data->last_offer) }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Incremento</div>
                        <div class="col-lg-9 col-md-8">{{ moneyBrl($data->increment) }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Tipo</div>
                        <div class="col-lg-9 col-md-8">{{ Str::ucfirst($data->type) }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Categoria</div>
                        <div class="col-lg-9 col-md-8">{{ Str::ucfirst($data->category) }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Endereço</div>
                        <div class="col-lg-9 col-md-8">{{ $data->address }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Cidade</div>
                        <div class="col-lg-9 col-md-8">{{ $data->city }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Estado</div>
                        <div class="col-lg-9 col-md-8">{{ $data->state }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Financeira</div>
                        <div class="col-lg-9 col-md-8">{{ $data->auctions->bank->name }}</div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
