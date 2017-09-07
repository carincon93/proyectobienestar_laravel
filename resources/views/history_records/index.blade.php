@extends('layouts.app')

@section('big-content-desc')
    <a href="{{ url('admin/history_record/excel') }}" class="btn btn-success"><i class="fa fa-fw fa-download"></i>Exportar historial a Excel</a>
@endsection
@section('content')
@include('layouts.modal')

<!-- <div class="row">
    <h5>hacer busqueda por fecha</h5>
    <i class="fa fa-calendar fa-2"></i>
    <input type="text" name="daterange" class="datapicker">
</div> -->
<div class="input-daterange input-group datapickerr" id="datepicker">
    <input type="text" class="input-sm form-control" name="start" />
    <span class="input-group-addon">hasta</span>
    <input type="text" class="input-sm form-control" name="end" />
</div>
<div class="col-md-8">
    <div class="panel panel-default card">
        <div class="panel-heading"></div>
        <div class="table-responsive">
            <table class="table table-full table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre aprendiz</th>
                        <th>Fecha de entrega</th>
                    </tr>
                </thead>
                <tbody  id="myTableAprendiz">
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
    <i class="fa fa-fw fa-trophy center-block"></i>
    Lista de aprendices que más han recibido el suplemento alimenticio.
    <div class="panel panel-default card">
        <div class="panel-heading"></div>
        <div class="table-responsive">
            <table class="table table-hovered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hh as $key)
                    <tr>
                        <td>
                            <a href="{{ url('admin/history_record/'.$key->id) }}">
                                {{ $key->nombre_completo }}
                            </a>
                        </td>
                        <td>
                            {{ $key->total }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
