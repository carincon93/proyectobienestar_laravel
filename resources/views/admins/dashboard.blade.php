@extends('layouts.app')

    @section('big-content-desc')
    <!-- <h4>
        <i class="fa fa-fw fa-file-text-o"></i>
        En la siguiente tabla se listan todas las solicitudes de aprendices que requieren el suplemento alimenticio.
    </h4> -->
    <p>
        <blockquote class="blockquote blockquote-success">
            <i class="fa fa-fw fa-info"></i>
            Por favor de clic en <span class="btn">Ver solicitud</span> verifica todos los datos y da clic en
            <span class="btn">Aprobar solicitud</span> si el aprendiz cumple con los requisitos.
        </blockquote>
    </p>
    @endsection
    @section('content')
        <a href="{{ url('/admin/apprentice/create') }}" class="action-round text-center tooltip-anadir" data-toggle="tooltip" data-placement="top" title="Anadir solicitud"><i class="fa fa-fw fa-plus"></i></a>
        <div class="modal fade" id="confirm-delete">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-capitalize"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-danger" id="btn-delete"></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Solicitud -->
        <div class="modal fade" id="modalSolicitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="" id="mbody-solicitud"></div>
                    <div class="modal-footer">
                        <button type="button" class="text-uppercase btn-no-style pull-left" id="rechazarSolicitud">Rechazar solicitud</button>
                        <button type="button" class="text-uppercase btn-no-style" id="aceptarSolicitud">Aprobar solicitud</button>
                    </div>
                </div>
            </div>
        </div>
            <p>En la siguiente tabla encontrará dos listas, lista de todas las solicitudes y la lista de las solicitudes no aprobadas.</p>

            <ul class="nav nav-tabs lista-aprendices-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#firstTable" aria-controls="firstTable" role="tab" data-toggle="tab"><i class="fa fa-fw fa-list"></i>Lista de todas las solicitudes</a></li>
                <li role="presentation"><a href="#secondTable" aria-controls="secondTable" role="tab" data-toggle="tab"><i class="fa fa-fw fa-list"></i>Lista de solicitudes <strong>no aceptadas</strong></a></li>
            </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active row" id="firstTable">
                <div class="col-md-10">
                    <div class="card">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 table-desc">
                                    <i class="fa fa-fw fa-table"></i>
                                    Tabla de solicitudes.
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="search-table">
                                        <input type="text" id="myInputAprendiz" onkeyup="filterTableAprendiz()" placeholder="Buscar por nombre de aprendiz" class="form-control search-navbar custom-input">
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        @foreach($solicitudAceptado as $sa)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $sa->nombre_completo }}</td>
                                            <td>{{ $sa->tipo_documento === "cedula" ? "Cédula" : ($sa->tipo_documento ==="ti" ? "Tarjeta de identidad" : "") }}</td>
                                            <td>{{ $sa->numero_documento }}</td>
                                            <td class="td-actions">
                                                <button class="btn btn-solicitud" data-toggle="modal" data-target="#modalSolicitud" data-id="{{ $sa->id }}" data-nombre="{{ $sa->nombre_completo }}">
                                                    Ver solicitud
                                                </button>
                                                <a class="btn btn-round" href="{{ url('/admin/apprentice/'.$sa->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar solicitud">
                                                    <i class="fa fa-fw fa-pencil"></i>
                                                </a>
                                                <form action="{{ url('/admin/apprentice/'.$sa->id) }}" style="display: inline-block;" data-nombre="{{ $sa->nombre_ficha }}" method="POST" class="btn-delete-tbl btn btn-round" data-toggle="tooltip" data-placement="top" title="Eliminar solicitud">
                                                    {{ method_field('delete') }}
                                                    {!! csrf_field()  !!}
                                                    <i class="fa fa-fw fa-trash"></i>
                                                </form>
                                                <a href="{{ url('admin/history_record/'.$sa->id) }}" class="btn btn-round" data-toggle="tooltip" data-placement="top" title="Ver historial">
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
                <div class="col-md-2 text-center">
                    <span class="h5">
                        Total de solicitudes:
                    </span>
                    <h2>
                        @php
                            $countSolicitudes = 0;
                        @endphp

                        @foreach($solicitudAceptado as $sa)
                            @php
                                $countSolicitudes++;
                            @endphp
                        @endforeach
                        {{ $countSolicitudes }}
                    </h2>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane row" id="secondTable">
                <div class="col-md-10">
                    <div class="card">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-8 table-desc">
                                    <i class="fa fa-fw fa-table"></i>
                                    Tabla de solicitudes no aceptadas.
                                </div>
                                <div class="col-md-4">
                                    <div class="search-table">
                                        <input type="text" id="myInputAprendizDenegado" onkeyup="filterTableAprendizDenegado()" placeholder="Buscar por nombre de aprendiz" class="form-control search-navbar custom-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table table-full table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre completo</th>
                                            <th>Numero de documento</th>
                                            <th>Novedad</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody  id="myTableAprendizDenegado">
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach($solicitudDenegado as $sd)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $sd->nombre_completo }}</td>
                                            <td>{{ $sd->numero_documento }}</td>
                                            <td>{{ $sd->novedad_solicitud }}</td>
                                            <td class="td-actions">
                                                <button class="btn btn-solicitud" data-toggle="modal" data-target="#modalSolicitud" data-id="{{ $sd->id }}" data-nombre="{{ $sd->nombre_completo }}">
                                                    Ver solicitud
                                                </button>
                                                <a class="btn btn-round" href="{{ url('/admin/apprentice/'.$sd->id.'/edit') }}">
                                                    <i class="fa fa-fw fa-pencil"></i>
                                                </a>
                                                <form action="{{ url('/admin/apprentice/'.$sd->id) }}" style="display: inline-block;" data-nombre="{{ $sd->nombre_ficha }}" method="POST" class="btn-delete-tbl btn btn-round">
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
                        Total de solicitudes no aceptadas:
                    </span>
                    <h2>
                        @php
                            $countSolicitudesDen = 0;
                        @endphp

                        @foreach($solicitudDenegado as $sd)
                            @php
                                $countSolicitudesDen++;
                            @endphp
                        @endforeach
                        {{ $countSolicitudesDen }}
                    </h2>
                </div>
            </div>
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

            function filterTableAprendizDenegado() {
                var input, filter, table, tr, td, i;
                input = document.getElementById("myInputAprendizDenegado");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTableAprendizDenegado");
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
