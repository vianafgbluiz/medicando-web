@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('layouts.headers.no_stats')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Cadastrar Medicamento') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('medicamento.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="formCIA" method="post" action="{{ route('medicamento.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted">{{ __('Informações da Medicamento') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-12 col-md-6 form-group">
                                        <label class="form-control-label" for="medic_nome">{{ __('Nome do Medicamento') }} <span style="color:red;">*</span></label>
                                        <input type="text" name="medic_nome" id="medic_nome" placeholder="Nome do Medicamento" class="form-control" required/>
                                    </div>

                                    <div class="col-12 col-md-6 form-group">
                                        <label class="form-control-label" for="medic_preco">{{ __('Preço do Medicamento') }} <span style="color:red;">*</span></label>
                                        <input type="text" name="medic_preco" id="medic_preco" placeholder="Preço" class="form-control" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
