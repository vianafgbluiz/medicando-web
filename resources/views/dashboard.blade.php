@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Fluxo de Entrada Mensal</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Medicamentos mais vendidos</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">Todos</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Medicamento</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">%</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Dipirona 30 comprimidos</th>
                                    <td>14 unidades</td>
                                    <td>R$ 141.68</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">8.38%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="8.38" aria-valuemin="0" aria-valuemax="100" style="width: 8.38%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Expec 120ml</th>
                                    <td>4 unidades</td>
                                    <td>R$ 103.56</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">6.13%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="6.13" aria-valuemin="0" aria-valuemax="100" style="width: 6.13%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Aspirina 10 comprimidos</th>
                                    <td>10 Unidades</td>
                                    <td>R$ 97,50</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">5.77%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="5.77" aria-valuemin="0" aria-valuemax="100" style="width: 5.77%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Omeoprazol 20mg</th>
                                    <td>5 unidades</td>
                                    <td>R$ 69.45</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">4.11%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="4.11" aria-valuemin="0" aria-valuemax="100" style="width: 4.11%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Status dos Pedidos</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">Todos</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Status</th>
                                    <th scope="col">Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Aguardando Aprovação</th>
                                    <td>6</td>
                                </tr>
                                <tr>
                                    <th scope="row">Aprovados</th>
                                    <td>13</td>
                                </tr>
                                <tr>
                                    <th scope="row">Em trânsito</th>
                                    <td>8</td>
                                </tr>
                                <tr>
                                    <th scope="row">Finalizados</th>
                                    <td>107</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
