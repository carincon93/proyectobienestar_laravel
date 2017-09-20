@extends('layouts.app')

    @section('title', 'Suplemento alimenticio')

    @section('big-content-desc')
        <!-- Modal historial -->
        @include('layouts.modal_historial')

        @if ($errors->has('token_error'))
        <!-- Modal -->
        <div class="modal fade" id="modalSession" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Sesión expirada</h4>
                    </div>
                    <div class="modal-body">
                        {{ $errors->first('token_error') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">
                            <a href="{{ url('/') }}">Volver a la página principal</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <section class="page-section">
            <div>
                <img src="{{ asset('/images/suplemento.png') }}" alt="" class="img-responsive center-block img-welc-suplemento">
                <button class="btn btn-success center-block btn-welc-entrega" type="button" data-toggle="modal" data-target="#modalEntrega">
                    Entregar suplemento
                </button>
                <div class="row">
                    <div class="col-md-6">
                        <div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <div class="panel panel-default card">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8 table-desc">
                                <i class="fa fa-fw fa-list"></i>
                                Lista de aprendices seleccionados.
                            </div>
                            <div class="col-md-4">
                                <div class="search-table">
                                    <input type="text" id="myInputAprendiz" onkeyup="filterTableAprendiz()" placeholder="Buscar por nombre de aprendiz" class="form-control search-navbar custom-input">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="table-responsive">
                            <table class="table table-full table-hover">
                                <caption>
                                </caption>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre completo</th>
                                        <th>Tipo de documento</th>
                                        <th>Número de documento</th>
                                        <th>Programa de formación</th>
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
                                        <td>{{ $da->tipo_documento === "cedula" ? "Cédula" : ($da->tipo_documento ==="ti" ? "Tarjeta de identidad" : "") }}</td>
                                        <td>{{ $da->numero_documento }}</td>
                                        <td>{{ $da->programa_formacion }}</td>
                                        <td>
                                            <button class="btn btn-historial" data-toggle="modal" data-target="#modalHistorial" data-id="{{ $da->id }}" data-nombre="{{ $da->nombre_completo }}">
                                                Ver historial
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
