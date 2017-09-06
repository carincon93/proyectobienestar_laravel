<!-- Modal -->
<div class="modal fade" id="modalEntrega" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body clearfix">
                Ingresa el número de documento del aprendiz o pasa el lector sobre el código de barras del carné del aprendiz,
                una vez la persona es identifica, dale clic en 'Entregar el suplemento'.

                <div>
                    <i class="fa fa-fw fa-info"></i>
                    El aprendiz solo puede recibir el suplemento alimenticio una vez por día.
                </div>
                <i class="fa fa-fw fa-barcode"></i>
                <input type="text" class="form-control" placeholder="Número de documento del aprendiz" id="numero_documento" autofocus>
                <div id="apprentice"></div>
            </div>
        </div>
    </div>
</div>
