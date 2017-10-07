@extends('layouts.app')

@section('big-content-desc')
<div class="row">
    <div class="col-md-6">
        <form action="{{ url('datesearch') }}" method="POST" class="form-datepicker">
            <fieldset>
                <legend class="h4">
                    Búsqueda por fechas
                </legend>
                {!! csrf_field()  !!}
                <div class="input-daterange input-group datapickerr" id="datepicker">
                    <div class="input-date-wrapper">
                        <label for="inicio">Fecha inicio</label>
                        <input type="text" class="input-sm form-control" name="inicio"  autocomplete="off">
                    </div>
                    <span class="input-group-addon"></span>
                    <div class="input-date-wrapper">
                        <label for="inicio">Fecha fin</label>
                        <input type="text" class="input-sm form-control" name="fin" autocomplete="off">
                    </div>
                </div>
                <div class="search-dates-wrapper">
                    <button type="button" class="btn-no-style reset text-uppercase">Limpiar</button>

                    <button type="button" class="btn-no-style enviarfechas text-uppercase pull-right">Buscar</button>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="col-md-6">
        <blockquote class="blockquote">
            <i class="fa fa-fw fa-info"></i>
            Para generar un reporte, primero debe realizar una búsqueda entre dos fechas.
        </blockquote>
        <br>
        <form action="{{ url('/generar_reporte') }}" style="display: inline-block;" method="POST" class="text-uppercase" id="formReporte">
            {!! csrf_field()  !!}
            <input type="hidden" name="fechaInicio">
            <input type="hidden" name="fechaFin">
            <button type="submit" class="btn btn-success" name="button-export-reporte" disabled>Generar reporte</button>
        </form>
    </div>

</div>
@endsection
@section('content')
@include('layouts.modal')
<hr>
<div class="row">
    <div class="col-md-8">
        <p>Historial de aprendices que han recibido suplementos.</p>
        <div class="card">
            <div class="card-header">
                <h4>
                    <i class="fa fa-fw fa-table"></i>
                    Tabla historial
                </h4>
            </div>
            <div class="table-responsive card-content">
                <table class="table table-full table-hover" id="myTable" data-form="deleteForm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre aprendiz</th>
                            <th>Fecha de entrega</th>
                            <th>Acciones</th>
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
                            @php

                                $dt=new Jenssegers\Date\Date($his->fecha);

                            @endphp
                            <td>{{ $dt->format('l d F  Y h:i A') }}</td>

                            <td>
                                <form action="{{ url('/admin/history_records/'.$his->id) }}" style="display: inline-block;" data-nombre="{{ $his->apprentice->nombre_completo }}"  method="POST" class="btn-delete-tbl btn btn-round">

                                    {{ method_field('delete') }}
                                    {!! csrf_field()  !!}
                                    <i class="fa fa-fw fa-trash"></i>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <p class="text-center">
            Aprendices más beneficiados con el suplemento alimenticio.
        </p>
        <div class="card">
            <div class="panel-heading">
                <i class="fa fa-fw fa-trophy center-block"></i>
            </div>
            <div class="table-responsive card-content">
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

</div>
@endsection
