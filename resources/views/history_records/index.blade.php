@extends('layouts.app')
    {{-- @section('navbar-top')
        <div class="input-daterange input-group" id="datepicker">
            <input type="text" class="input-sm form-control" name="start" />
            <span class="input-group-addon">to</span>
            <input type="text" class="input-sm form-control" name="end" />
        </div>
    @endsection --}}
@section('content')
@include('layouts.modal')
<a href="{{ url('history_record/excel') }}" class="btn btn-success"><i class="fa fa-fw fa-cloud-download"></i>Exportar historial a Excel</a>
<div class="card">
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
                @foreach($dataHistoryRecord as $his)
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
@endsection
