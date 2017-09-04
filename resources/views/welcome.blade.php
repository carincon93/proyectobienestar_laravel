@extends('layouts.app')

@section('navbar-top')
    <div class="search-navbar-wrapper">
        <i class="fa fa-fw fa-search"></i>
        <input type="text" id="myInputAprendiz" onkeyup="filterTableAprendiz()" placeholder="Buscar por nombre de aprendiz" class="form-control search-navbar">
    </div>
    @endsection
    
    @section('content')
        <!-- Session Mensajes -->
        <div class="col-md-10 col-md-offset-1">
            <li>
                <a href="#" data-toggle="modal" data-target="#modalEntrega"><i class="fa fa-fw fa-cutlery"></i>Entregar suplemento</a>
            </li> 
            <div class="panel panel-default card">
                <div class="panel-heading">Lista de aprendices</div>
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