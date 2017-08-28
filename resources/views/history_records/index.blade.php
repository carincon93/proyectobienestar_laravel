@extends('layouts.app')
@section('content')
@include('layouts.modal')
<div class="modal fade" id="modalFormNovedad">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-capitalize" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="formNovedadNueva">
                    {{ csrf_field() }}
                    <div class="form-group" id="novedad_vieja"></div>
                    <div class="form-group">
                        <label for="novedad_nueva" class="control-label">Nueva novedad</label>
                        <textarea name="novedad_nueva" rows="4" cols="80" class="form-control" autofocus></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="btn-novedad-nueva">Añadir novedad</button>
            </div>
        </div>
    </div>
</div>
<a href="{{ url('history_record/excel') }}" class="btn btn-success"><i class="fa fa-cloud-download"></i> Exportar Historial a Excel</a>
<div class="card">
    <div class="table-responsive">
        <table class="table table-full table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ficha</th>
                    <th>Instructor</th>
                    <th>Ambiente</th>
                    <th>Fecha Prestado</th>
                    <th>Fecha Entregado</th>
                    <th>Novedad</th>
                    <th>Novedad nueva</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @php
            $count = 1;
            @endphp
            @foreach($dataHistoryR as $his)
                <tr>
                	<td>{{$count++}}</td>
                    <td>{{ $his->cLassgroup->id_ficha.' '.$his->nombre_ficha }}</td>
                	<td>{{ $his->instructor->nombre.' '.$his->instructor->apellidos }}</td>
                	<td>{{ $his->classroom->nombre_ambiente}}</td>
                	<td>{{ $his->prestado_en }}</td>
                    <td>{{ $his->entregado_en != '' ? $his->entregado_en : 'Sin entrega'}}</td>
                    <td>{{ $his->entregado_en != '' ? $his->novedad : 'Sin novedad'}}</td>
                    <td>{{ $his->entregado_en != '' ? $his->novedad_nueva : ''}}</td>

                    <td class="td-actions">
                        <button class="btn btn-action novedad_nueva" type="button" data-target="#modalFormNovedad" data-toggle="modal" data-id-historial="{{$his->id}}"><i class="fa fa-fw fa-edit"></i>Editar</button>
                        <form action="{{ url('/admin/history_record/'.$his->id) }}" data-nombre="{{ $his->classgroup->id_ficha }}" method="POST" style="display: inline-block;" class="btn btn-action btn-delete-tbl">
                            {{ method_field('delete') }}
                            {!! csrf_field()  !!}
                            <i class="fa fa-fw fa-trash"></i>
                            Eliminar
                        </form>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
