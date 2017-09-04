@extends('layouts.app')

    @section('navbar-top')
    <div class="search-navbar-wrapper">
        <i class="fa fa-fw fa-search"></i>
        <input type="text" id="myInputAprendiz" onkeyup="filterTableAprendiz()" placeholder="Buscar por nombre de aprendiz" class="form-control search-navbar">
    </div>
    @endsection

    @section('content')
        <div class="modal fade" id="confirm-delete">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-capitalize" id="myModalLabel"></h4>
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
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
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
        @include('layouts.messages')
        <a href="{{ url('/admin/apprentice/create') }}" class="action-round"><i class="fa fa-fw fa-plus"></i></a>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default card">
                <div class="panel-heading">Dashboard</div>
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
                                    <td>{{ $da->tipo_documento }}</td>
                                    <td>{{ $da->numero_documento }}</td>
                                    <td class="td-actions">
                                        <button class="btn btn-round" data-toggle="modal" data-target="#modalSolicitud" data-id="{{ $da->id }}">
                                            <i class="fa fa-fw fa-search"></i>
                                        </button>
                                        <a class="btn btn-round" href="{{ url('/admin/apprentice/'.$da->id.'/edit') }}">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                        <form action="{{ url('/admin/apprentice/'.$da->id) }}" style="display: inline-block;" data-nombre="{{ $da->nombre_ficha }}" method="POST" class="btn-delete-tbl btn btn-round">
                                            {{ method_field('delete') }}
                                            {!! csrf_field()  !!}
                                            <i class="fa fa-fw fa-trash"></i>
                                        </form>
                                        <!-- @if($da->estado_beneficio == 0)
                                        <a class="btn btn-success" href="{{url('admin/'.$da->id.'/solicitudaceptado')}}">Aceptado</a>
                                        <a class="btn btn-danger" href="{{url('admin/'.$da->id.'/solicitudrechazado')}}">No Aceptado</a>
                                        @endif -->
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
