@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Medicamentos') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('medicamento.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i>{{ __(' Medicamento') }}</a>
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
                                <th scope="col">{{ __('medicamento') }}</th>
                                <th scope="col">{{ __('Preço') }}</th>
                                <th scope="col">Data de Cadastro</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($medicamentos as $medicamento)
                                <tr>
                                    <td>{{ $medicamento->id }}</td>
                                    <td>{{ $medicamento->medic_nome }}</td>
                                    <td>R$ {{ $medicamento->medic_preco }}</td>
                                    <td>{{ $medicamento->created_at }}</td>
                                    <td><a class="btn btn-icon-only text-primary" href="{{ route('medicamento.edit', $medicamento->id) }}"><i class="fas fa-info-circle"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $medicamentos->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
