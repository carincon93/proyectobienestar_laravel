@extends('layouts.app')

    @section('navbar-top')
    <div class="search-navbar-wrapper">
        <i class="fa fa-fw fa-search"></i>
        <input type="text" id="myInputAprendiz" onkeyup="filterTableAprendiz()" placeholder="Buscar por nombre de aprendiz" class="form-control search-navbar">
    </div>
    @endsection

    @section('content')
        <section class="import-section">
            <h1 class="text-center">Importar solicitudes</h1>
            <p>

            </p>

            <!-- <form class="" action="{{ url('/admin/import') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="file" name="imported-file" class="form-control" accept=".xlsx">
                <button type="submit">Importar</button>
            </form> -->
            <button type="button" name="button" class="btn btn-import center-block">
                <i class="fa fa-fw fa-upload"></i>
            </button>
        </section>
    @endsection
