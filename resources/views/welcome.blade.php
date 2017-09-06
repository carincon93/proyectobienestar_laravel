@extends('layouts.app')

    @section('big-content-desc')
        <section class="page-section">
            <div>
                <img src="{{ asset('/images/suplemento.png') }}" alt="" class="img-responsive center-block img-welc-suplemento">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium quia recusandae doloribus ab provident officiis sed. Vero mollitia id exercitationem voluptatibus. Totam minima odit beatae amet fuga, consectetur libero, inventore aut dolor error. Beatae, fuga, cupiditate. Impedit, sunt vero temporibus.
                </p>
                <button class="btn center-block btn-welc-entrega" type="button" data-toggle="modal" data-target="#modalEntrega">Entregar suplemento</button>
            </div>
        </section>
        <section class="page-section">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <i class="fa fa-fw fa-list"></i>
                            Lista de aprendices seleccionados.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right search-table">
                            <input type="text" id="myInputAprendiz" onkeyup="filterTableAprendiz()" placeholder="Buscar por nombre de aprendiz" class="form-control search-navbar custom-input">
                        </div>
                    </div>
                </div>
                <div class="panel panel-default card">
                    <div class="panel-heading">Tabla de aprendices seleccionados</div>
                    <!-- Session Mensajes -->
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span
                            aria-hidden="true">&times;</span>
                        </button>
                        {!! html_entity_decode(session('status')) !!}
                    </div>
                    @endif

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
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <i class="fa fa-fw fa-list"></i>
                    Lista de aprendices que más han recibido el suplemento alimenticio.
                </div>
                <div class="panel panel-default card">
                    <div class="panel-heading">Tabla de aprendices</div>
                    <div class="table-responsive">
                        <table class="table table-hovered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history_records as $key)
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
