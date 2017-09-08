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

            <form class="" action="{{ url('/admin/apprentice/store_import') }}" method="post" enctype="multipart/form-data" >
                {!! csrf_field() !!}
                <div class="box js">
                    <input type="file" name="imported-file" id="file-6" class="inputfile inputfile-5" accept=".xlsx" data-multiple-caption="{count} files selected" multiple  />
                    <label for="file-6"><figure><svg  width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
                </div>
                <button type="submit" name="button" class="btn btn-import center-block">
                    Importar
                </button>
            </form>
        </section>
    @endsection
