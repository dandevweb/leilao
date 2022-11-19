<div class="modal fade" id="detailsModal{{ $data->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body profile">
                <div class="profile-overview" id="profile-overview">
                    <h5 class="card-title">{{ $data->name }}</h5>

                    @isset($data->date)
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Data</div>
                            <div class="col-lg-9 col-md-8">{{ dateBrl($data->date) }}</div>
                        </div>
                    @endisset

                    @isset($data->address)
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Endereço</div>
                            <div class="col-lg-9 col-md-8">{{ $data->address }}</div>
                        </div>
                    @endisset

                    @isset($data->city)
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Cidade</div>
                            <div class="col-lg-9 col-md-8">{{ $data->city }}</div>
                        </div>
                    @endisset

                    @isset($data->state)
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Estado</div>
                            <div class="col-lg-9 col-md-8">{{ $data->state }}</div>
                        </div>
                    @endisset

                    @isset($data->bank->name)
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Financeira</div>
                            <div class="col-lg-9 col-md-8">{{ $data->bank->name }}</div>
                        </div>
                    @endisset

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
