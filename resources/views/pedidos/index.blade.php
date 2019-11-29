@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('pedidos.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Pedidos') }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                <strong>Sucesso!</strong> {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('#') }}</th>
                                <th scope="col">{{ __('Código') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col">{{ __('Valor') }}</th>
                                <th scope="col">{{ __('Data do Pedido') }}</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <td>{{ $pedido->id }}</td>
                                    <td>{{ $pedido->ped_hash }}</td>
                                    <td>
                                        @switch($pedido->ped_status)
                                            @case(1)
                                            <span class="badge badge-info">Aguardando Aprovação</span>
                                            @break
                                            @case(2)
                                            <span class="badge badge-default">Aprovado</span>
                                            @break
                                            @case(3)
                                            <span class="badge badge-warning">Em Transporte</span>
                                            @break
                                            @case(4)
                                            <span class="badge badge-success">Entregue</span>
                                            @break
                                            @case(5)
                                            <span class="badge badge-danger">Cancelado</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>R$ {{ $pedido->ped_preco }}</td>
                                    <td>R$ {{ $pedido->created_at }}</td>
                                    <td>
                                        @switch($pedido->ped_status)
                                            @case(1)
                                            <a href="#" data-toggle="modal" data-target="#modal-aguardando" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                            @break
                                            @case(2)
                                            <a href="#" data-toggle="modal" data-target="#modal-aprovado" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                            @break
                                            @case(3)
                                            <a href="#" data-toggle="modal" data-target="#modal-transporte" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                            @break
                                            @case(4)
                                            <a href="#" data-toggle="modal" data-target="#modal-entregue" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                            @break
                                            @case(5)
                                            <a href="#" data-toggle="modal" data-target="#modal-cancelado" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                            @break
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $pedidos->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
        <!-- Modal Aguardando Aprovação -->
        <div class="modal fade" id="modal-aguardando" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal- modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="row">
                            <div class="col-xl-12 order-xl-1">
                                <div class="card bg-secondary shadow">
                                    <div class="card-header bg-white border-0">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h3 class="mb-0">{{ __('00000001') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('pedido.update', 1) }}" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            @method('put')
                                            <h4><strong>{{ __('INFORMAÇÕES DO PEDIDO') }}</strong></h4>
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="media align-items-center">
                                                        <a href="#" class="avatar rounded-circle mr-3">
                                                            <img alt="Image placeholder" src="{{ asset('storage/medicamentos/medicamento1.jpg') }}">
                                                        </a>
                                                        <div class="media-body">
                                                            <p class="mb-0">AMOXICILINA 21 comprimidos</p>
                                                            <p class="mb-0"><strong>1 Unidade - R$ 15,00</strong></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="media align-items-center">
                                                        <a href="#" class="avatar rounded-circle mr-3">
                                                            <img alt="Image placeholder" src="{{ asset('storage/medicamentos/medicamento2.jpg') }}">
                                                        </a>
                                                        <div class="media-body">
                                                            <p class="mb-0">A CURITYBINA - 120ml</p>
                                                            <p class="mb-0"><strong>1 Unidade - R$ 23,89</strong></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-3">

                                            <h4><strong>{{ __('TOTAL') }}</strong></h4>
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="mb-0"><strong>TOTAL</strong> R$ 38,89</p>
                                                        <p class="mb-0"><strong>ENTREGA: </strong> Rua dos Pinheiros, 287 - Cidade Jardim</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="mt-3 text-right">
                                                <button class="mr-2 btn btn-icon btn-3 btn-danger" type="button">
                                                    <span class="btn-inner--icon"><i class="fas fa-times-circle"></i></span>

                                                    <span class="btn-inner--text">Reprovar</span>

                                                </button>

                                                <button class="ml-2 btn btn-icon btn-3 btn-success" type="button">
                                                    <span class="btn-inner--icon"><i class="fas fa-check-circle"></i></span>

                                                    <span class="btn-inner--text">Aprovar</span>

                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-aprovado" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal- modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="row">
                            <div class="col-xl-12 order-xl-1">
                                <div class="card bg-secondary shadow">
                                    <div class="card-header bg-white border-0">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h3 class="mb-0">{{ __('Editar CIA') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('pedido.update', 1) }}" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            @method('put')
                                            <h6 class="heading-small text-muted">{{ __('Informações do Pedido') }}</h6>
                                            <div class="pl-lg-4">
                                                <div class="row">

                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success mt-4">{{ __('Nois') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-transporte" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal- modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="row">
                            <div class="col-xl-12 order-xl-1">
                                <div class="card bg-secondary shadow">
                                    <div class="card-header bg-white border-0">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h3 class="mb-0">{{ __('Editar CIA') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('pedido.update', 1) }}" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            @method('put')
                                            <h6 class="heading-small text-muted">{{ __('Informações do Pedido') }}</h6>
                                            <div class="pl-lg-4">
                                                <div class="row">

                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success mt-4">{{ __('Nois') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-entregue" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal- modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="row">
                            <div class="col-xl-12 order-xl-1">
                                <div class="card bg-secondary shadow">
                                    <div class="card-header bg-white border-0">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h3 class="mb-0">{{ __('Editar CIA') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('pedido.update', 1) }}" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            @method('put')
                                            <h6 class="heading-small text-muted">{{ __('Informações do Pedido') }}</h6>
                                            <div class="pl-lg-4">
                                                <div class="row">

                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success mt-4">{{ __('Nois') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-cancelado" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal- modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="row">
                            <div class="col-xl-12 order-xl-1">
                                <div class="card bg-secondary shadow">
                                    <div class="card-header bg-white border-0">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h3 class="mb-0">{{ __('Editar CIA') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('pedido.update', 1) }}" enctype="multipart/form-data" autocomplete="off">
                                            @csrf
                                            @method('put')
                                            <h6 class="heading-small text-muted">{{ __('Informações do Pedido') }}</h6>
                                            <div class="pl-lg-4">
                                                <div class="row">

                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success mt-4">{{ __('Nois') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
