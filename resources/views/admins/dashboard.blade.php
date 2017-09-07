@extends('layouts.app')

    @section('big-content-desc')
    <h4>
        <i class="fa fa-fw fa-file-text-o"></i>
        En la siguiente tabla se listan todas las solicitudes de aprendices que requieren el suplemento alimenticio.
    </h4>
    <p>
        <blockquote class="blockquote blockquote-success">
            <i class="fa fa-fw fa-info"></i>
            Por favor de clic en <span class="btn">Ver solicitud</span> verifica todos los datos y da clic en
            <span class="btn">Aprobar solicitud</span> si el aprendiz cumple con los requisitos.
        </blockquote>
    </p>

    @endsection

    @section('content')
        <!-- Modal Solicitud -->
        <div class="modal fade" id="modalSolicitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body" id="mbody-solicitud"></div>
                    <div class="modal-footer">
                        <a href="" class="text-uppercase" id="cancelarSolicitud">Cancelar solicitud</a>
                        <a href="" class="text-uppercase" id="aceptarSolicitud">Aprobar solicitud</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Session Mensajes -->
        <a href="{{ url('/admin/apprentice/create') }}" class="action-round text-center"><i class="fa fa-fw fa-plus"></i></a>

        <div class="col-md-10">
            <div class="panel panel-default card">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8 table-desc">
                            <i class="fa fa-fw fa-list"></i>
                            Lista de solicitudes.
                        </div>
                        <div class="col-md-4">
                            <div class="search-table">
                                <input type="text" id="myInputAprendiz" onkeyup="filterTableAprendiz()" placeholder="Buscar por nombre de aprendiz" class="form-control search-navbar custom-input">
                            </div>
                        </div>
                    </div>
                </div>
                @if (session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span
                    aria-hidden="true">&times;</span></button>
                        {!! html_entity_decode(session('status')) !!}
                </div>
                @endif
                <div>
                    <div class="table-responsive">
                        <table class="table table-full table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre completo</th>
                                    <th>Tipo de documento</th>
                                    <th>Numero de documento</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody  id="myTableAprendiz">
                                @php
                                    $count = 1;
                                @endphp
                                @foreach($dataApprentice as $da)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $da->nombre_completo }}</td>
                                    <td>{{ $da->tipo_documento === "CEDULA" ? "Cédula" : ($da->tipo_documento ==="TI" ? "Tarjeta de identidad" : "") }}</td>
                                    <td>{{ $da->numero_documento }}</td>
                                    <td class="td-actions">
                                        <button class="btn btn-solicitud" data-toggle="modal" data-target="#modalSolicitud" data-id="{{ $da->id }}" data-nombre="{{ $da->nombre_completo }}">
                                            Ver solicitud
                                        </button>
                                        <a class="btn btn-round" href="{{ url('/admin/apprentice/'.$da->id.'/edit') }}">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                        <form action="{{ url('/admin/apprentice/'.$da->id) }}" style="display: inline-block;" data-nombre="{{ $da->nombre_ficha }}" method="POST" class="btn-delete-tbl btn btn-round">
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
        </div>
        <div class="col-md-2 text-center">
            <span class="h5">
                Total de solicitudes:
            </span>
            <h2>{{ $nroApprentices }}</h2>
        </div>
    @endsection
    @push('scripts')
        <script>
            function filterTableAprendiz() {
                var input, filter, table, tr, td, i;
                input = document.getElementById("myInputAprendiz");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTableAprendiz");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
    @endpush
