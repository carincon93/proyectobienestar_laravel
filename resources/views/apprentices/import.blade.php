@extends('layouts.app')

    @section('big-content-desc')
        <!-- <blockquote class="blockquote blockquote-danger">
            <i class="fa fa-fw fa-warning"></i>
            <form action="{{ url('/admin/truncate') }}" method="POST" style="display: inline-block;" class="form-truncate-aprendiz btn">
                {!! csrf_field() !!}
                Eliminar todos los registros
            </form>
        </blockquote> -->
        <h4>Sistema</h4>
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
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-content">
                                <form class="" action="{{ url('/admin/apprentice/store_import') }}" method="post" enctype="multipart/form-data" >
                                    <fieldset>
                                        <legend>Importar solicitudes</legend>
                                        {!! csrf_field() !!}
                                        <label for="imported-file">Selecciona un archivo excel para importar</label>
                                        <div class="box js">
                                            <input type="file" name="imported-file" id="file-6" class="inputfile inputfile-5" accept=".xlsx" data-multiple-caption="{count} files selected" multiple  />
                                            <label for="file-6"><figure><svg  width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
                                        </div>
                                        <button type="submit" name="button-import" class="btn btn-success" disabled>
                                            Importar
                                        </button>
                                    </fieldset>
                                </form>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-4">
                        <blockquote class="blockquote">
                            <i class="fa fa-fw fa-info"></i>
                            Selecciona un archivo de excel <i class="fa fa-fw fa-file-excel-o"></i> y dale clic en <span class="btn">Importar</span>
                        </blockquote>
                    </div>
                </div>
        </section>

        <hr>

        <section class="import-section">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="legend">Exportar todo</h4>
                            <a href="{{ url('/excel') }}" class="btn btn-success">
                                <i class="fa fa-fw fa-download"></i>
                                Exportar a excel
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <i class="fa fa-fw fa-info"></i>
                        Si quieres descargar todos los registros en un archivo excel, por favor da clic en el botón <span class="btn">Exportar a excel</span>
                    </blockquote>
                </div>
            </div>
        </section>

        <hr>

        <section class="import-section">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="legend">Eliminar todo</h4>
                            <form action="{{ url('/admin/truncate') }}" method="POST" style="display: inline-block;" class="form-truncate-aprendiz btn btn-danger">
                                {!! csrf_field() !!}
                                Eliminar todos los registros
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote blockquote-danger">
                        <i class="fa fa-fw fa-warning"></i>
                        Si quieres eliminar todos los registros, da clic en el botón <span class="btn">Eliminar todos los registros</span>
                        <br>
                        <br>
                        Se recomienda primero exportar todo a un archivo en excel antes de eliminar.
                    </blockquote>
                </div>
            </div>
        </section>
    @endsection
