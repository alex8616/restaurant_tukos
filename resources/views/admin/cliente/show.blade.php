@extends('adminlte::page')

@section('title', 'Restaurant')

@section('content_header')
<div class="hero">
    <h1 id="htitle"><span id="title">RESTAURANT TUKO´S</span><br>LISTADO DE REGISTRO DE PENSIONADO </h1>
</div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="border-bottom text-center pb-4">
                    <h3>{{ ucwords($cliente->Nombre_cliente) }} {{ucwords($cliente->Apellidop_cliente)}}</h3>
                    <div class="d-flex justify-content-between">
                    </div>
                </div>
                <div class="border-bottom py-4">
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                            href="#list-home" role="tab" aria-controls="home">
                            Sobre cliente
                        </a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                            href="#list-profile" role="tab" aria-controls="profile">
                            Historial de compras
                        </a>
                        <a class="list-group-item list-group-item-action" id="list-profile-mensualidad" data-toggle="list"
                            href="#list-mensualidad" role="tab" aria-controls="profile">
                            Historial de Pensionado
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 pl-lg-5">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" user="tabpanel"
                        aria-labelledby="list-home-list">

                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>Información de cliente</h4>
                            </div>
                        </div>
                        <div class="profile-feed">
                            <div class="d-flex align-items-start profile-feed-item">

                                <div class="form-group col-md-6">
                                    <strong><i class="fab fa-product-hunt mr-1"></i> Nombre</strong>
                                    <p class="text-muted">
                                        {{ ucwords($cliente->Nombre_cliente) }} {{ucwords($cliente->Apellidop_cliente)}}
                                    </p>
                                    <hr>
                                    <strong>
                                        <i class="fas fa-map-marked-alt mr-1"></i>
                                        Dirección</strong>
                                    <p class="text-muted">
                                        {{ $cliente->Direccion_cliente }}
                                    </p>
                                    <hr>
                                    <strong><i class="fa-solid fa-at"></i> Correo electrónico</strong>
                                    <p class="text-muted">
                                        {{ $cliente->Correo_cliente }}
                                    </p>                                    
                                </div>

                                <div class="form-group col-md-6">
                                    
                                    <strong><i class="fas fa-phone-square mr-1"></i> Teléfono</strong>
                                    <p class="text-muted">
                                        {{ $cliente->Celular_cliente }}
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-mobile mr-1"></i> Celular</strong>
                                    <p class="text-muted">
                                        {{ $cliente->Celular_cliente }}
                                    </p>
                                    <hr>                                    
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="list-profile" user="tabpanel" aria-labelledby="list-profile-list">


                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>Historial de compras</h4>
                            </div>
                        </div>
                        <div class="profile-feed">
                            <div class="d-flex align-items-start profile-feed-item">

                                <div class="table-responsive">
                                    <table id="order-listing"
                                        class="table table-striped table-bordered shadow-lg mt-4 dt-responsive nowrap cliente">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Total</th>
                                                <th style="width:50px; text-align: right;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cliente->comandas as $comanda)
                                                <tr>
                                                    <td>{{ $comanda->fecha_venta }}</td>
                                                    <td>{{ $comanda->total }}</td>
                                                    <td style="width: 230px; text-align: right">
                                                        <a href="{{ route('admin.comanda.pdf', $comanda) }}"
                                                                class="btn btn-danger">Imprimir <i
                                                                    class="far fa-file-pdf"></i></a>
                                                        
                                                            <a href="{{ route('admin.comanda.show', $comanda) }}"
                                                                class="btn btn-info">Ver <i
                                                                    class="far fa-eye"></i></a>
                                                    </td>
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2"><strong>Total de monto comprado: </strong></td>
                                                <td colspan="3" align="left"><strong>Bs/{{ number_format($total_ventas, 2) }}</strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="list-mensualidad" user="tabpanel" aria-labelledby="list-profile-mensualidad">


                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>Historial de Mensualidad</h4>
                            </div>
                        </div>
                        <div class="profile-feed">
                            <div class="d-flex align-items-start profile-feed-item">

                                <div class="table-responsive">
                                    <table id="order-listing"
                                        class="table table-striped table-bordered shadow-lg mt-4 dt-responsive nowrap cliente">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>N°</th>
                                                <th>Fecha Inicio</th>
                                                <th>Fecha Final</th>
                                                <th>Tipo De Pension</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                            @foreach ($tipoclientes as $Tipocliente)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $Tipocliente->Fecha_Inicio }}</td>
                                                <td>{{ $Tipocliente->Fecha_Final }}</td>
                                                <td>{{ $Tipocliente->tipo }}</td>
                                                <td>
                                                    @if($Tipocliente->tipo == 'Normal')
                                                        <p>Concluido</p>
                                                    @else
                                                        <p>Aun Con Tiempo</p>
                                                    @endif
                                                    
                                                </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        <a href="{{ route('admin.cliente.index') }}" class="btn btn-primary float-right">Regresar</a>
    </div>
    </div>
@stop

@section('content_top_nav_right')
    @include('Notificaciones')
@endsection
@section('css')
    <link href="{{ asset('css/material-dashboardForms.css?v=2.1.1') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha512-rRQtF4V2wtAvXsou4iUAs2kXHi3Lj9NE7xJR77DE7GHsxgY9RTWy93dzMXgDIG8ToiRTD45VsDNdTiUagOFeZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('css/bottonfooder.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .is-required:after {
        content: '*';
        margin-left: 3px;
        color: red;
        font-weight: bold;
        }
    </style>
    @notifyCss
@stop

@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.8/js/responsive.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
@stop


