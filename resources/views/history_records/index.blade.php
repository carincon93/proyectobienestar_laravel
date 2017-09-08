@extends('layouts.app')

@section('big-content-desc')
<!-- <div class="col-md-3">
    <div class="card">
        <a href="{{ url('admin/history_record/excel') }}" class="">
            <div class="card-header-historial card-historial card-export-historial">
                <img src=" {{ asset('images/logo-excel.png') }}" alt="" class="img-responsive">
            </div>
            <div class="card-footer-historial">
                Exportar historial a Excel
                <i class="fa fa-fw fa-download"></i>
            </div>
        </a>
    </div>

</div> -->
<p>
    <blockquote class="blockquote historial-desc">
        Si quieres descargar el historial en un archivo excel, por favor da clic en el siguieten botón
        <a href="{{ url('admin/history_record/excel') }}" class="btn">
            <i class="fa fa-fw fa-download"></i>
            Exportar a excel
        </a>
    </blockquote>
</p>
<div class="col-md-6">
    <form action="{{ url('datesearch') }}" method="POST" class="form-datepicker">
        {!! csrf_field()  !!}
        <div class="input-daterange input-group datapickerr" id="datepicker">
            <div class="col-md-6 input-date-wrapper">
                <label for="inicio">Fecha inicio</label>
                <input type="text" class="input-sm form-control" name="inicio"  autocomplete="off">
            </div>
            <!-- <span class="input-group-addon">hasta</span> -->
            <div class="col-md-6 input-date-wrapper">
                <label for="inicio">Fecha fin</label>
                <input type="text" class="input-sm form-control" name="fin" autocomplete="off">
            </div>
        </div>
        <div class="pull-right">
            <button type="button" class="btn-no-style reset text-uppercase">Limpiar</button>
            <button type="button" class="btn-no-style enviarfechas text-uppercase">Buscar</button>
        </div>
    </form>
</div>
<!-- <div class="col-md-3">
    <div class="card">
        <a>
            <div class="card-header-historial card-historial card-fechas-historial">
                <i class="fa fa-calendar"></i>
                <form action="{{ url('datesearch') }}" method="POST" class="form-datepicker">
                    {!! csrf_field()  !!}
                    <div class="input-daterange input-group datapickerr" id="datepicker">
                        <input type="text" class="input-sm form-control" name="inicio"  autocomplete="off" placeholder="Fecha inicio">
                        <span class="input-group-addon">hasta</span>
                        <input type="text" class="input-sm form-control" name="fin" autocomplete="off" placeholder="Fecha fin">
                    </div>
                    <div>
                        <button type="button" class="btn-no-style reset text-uppercase">Limpiar</button>
                        <button type="button" class="btn-no-style pull-right enviarfechas text-uppercase">Buscar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer-historial">
                Búsqueda por fechas
            </div>
        </a>
    </div>

</div> -->
@endsection
@section('content')
@include('layouts.modal')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h4>Example</h4>
        </div>
        <div class="table-responsive card-content">
            <table class="table table-full table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre aprendiz</th>
                        <th>Fecha de entrega</th>
                    </tr>
                </thead>
                <tbody class="history" id="myTableAprendiz">
                    @php
                        $count = 1;
                    @endphp
                    @foreach($history_records as $his)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $his->apprentice->nombre_completo }}</td>
                        <td>{{ $his->fecha }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-4 mas-entregas">
    <p class="text-center">
        Lista de aprendices que más han recibido el suplemento alimenticio.
    </p>
    <div class="panel panel-default card">
        <div class="panel-heading"></div>
        <div class="table-responsive">
            <table class="table table-hovered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hh as $key)
                    <tr>
                        <td>
                                {{ $key->nombre_completo }}
                        </td>
                        <td>
                            {{ $key->total }}
                        </td>
                        <td>
                            <a href="{{ url('admin/history_record/'.$key->id) }}" class="btn btn-round">
                                <i class="fa fa-fw fa-external-link"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
