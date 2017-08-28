@extends('layouts.app')
@section('navbar-top')
<div class="search-navbar-wrapper">
    <i class="fa fa-fw fa-search"></i>
    <input type="text" id="myInputAprendiz" onkeyup="filterTableAprendiz()" placeholder="Buscar por nombre de aprendiz" class="form-control search-navbar">
</div>
@endsection
@section('big-content-desc')
@endsection
@section('content')

@include('layouts.messages')
<!-- <blockquote class="">
    <p>Si desea realizar una importación de un archivo de excel, por favor primero elimine todos los registros de esta tabla</p>
    <form action="{{ url('/admin/class_group/truncate') }}" method="POST" style="display: inline-block;" class="form-truncate-ficha btn">
        {!! csrf_field()  !!}
        <i class="fa fa-fw fa-trash"></i>
        Eliminar todos los registros
    </form>
</blockquote>
<form action="{{ url('admin/class_group/import') }}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    <input type="file" name="imported-file" class="form-control" accept=".xlsx">
    <button type="submit">Importar</button>
</form> -->
<div class="card">
    <a href="{{ url('/admin/apprentice/create') }}"><i class="fa fa-fw fa-plus"></i> Añadir un nuevo aprendiz</a>
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
                        <a class="btn btn-action" href="{{ url('/admin/apprentice/'.$da->id) }}">
                            <i class="fa fa-fw fa-search"></i>
                        </a>
                        <a class="btn btn-action" href="{{ url('/admin/apprentice/'.$da->id.'/edit') }}">
                            <i class="fa fa-fw fa-pencil"></i>
                            Editar
                        </a>
                        <form action="{{ url('/admin/apprentice/'.$da->id) }}" style="display: inline-block;" data-nombre="{{ $da->nombre_ficha }}"  method="POST" class="btn-delete-tbl btn btn-action">
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
