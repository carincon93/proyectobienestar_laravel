@extends('layouts.app')

    @section('big-content-desc')
        <p>
            <blockquote class="blockquote blockquote-danger">
                <i class="fa fa-fw fa-warning"></i>
                Atención! Antes de importar las solicitudes debe primero eliminar todos los registros dando clic en el siguiente botón
                <form action="{{ url('/admin/truncate') }}" method="POST" style="display: inline-block;" class="form-truncate-aprendiz btn">
                    {!! csrf_field() !!}
                    Eliminar todos los registros
                </form>
            </blockquote>
        </p>
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
        <section class="import-section">
            <h1 class="text-center">Importar solicitudes</h1>
            <p>

            </p>

            <form class="" action="{{ url('/admin/apprentice/store_import') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="file" name="imported-file" class="form-control" accept=".xlsx">
                <button type="submit">Importar</button>
            </form>
            <button type="button" name="button" class="btn btn-import center-block">
                <i class="fa fa-fw fa-upload"></i>
            </button>
        </section>
    @endsection
