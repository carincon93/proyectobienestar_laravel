@foreach($dataApprentice as $da)
    <div class="row row-info-aprendiz">
        <i class="fa fa-id-card-o btn-round icons-info-aprendiz"></i>
        <div class="col-md-6">
            <h5 class="type-info-aprendiz" class="type-info-aprendiz">Tipo de documento</h5>
            <p class="info-aprendiz text-capitalize" class="info-aprendiz">{{ $da->tipo_documento }}</p>
        </div>
        <div class="col-md-6">
            <h5 class="type-info-aprendiz">Número de documento</h5>
            <p class="info-aprendiz">{{ $da->numero_documento }}</p>
        </div>
    </div>
    <div class="row row-info-aprendiz">
        <i class="fa fa-home btn-round icons-info-aprendiz"></i>
        <div class="col-md-4">
            <h5 class="type-info-aprendiz">Dirección</h5>
            <p class="info-aprendiz">{{ $da->direccion }}</p>
        </div>
        <div class="col-md-4">
            <h5 class="type-info-aprendiz">Barrio</h5>
            <p class="info-aprendiz">{{ $da->barrio }}</p>
        </div>
        <div class="col-md-4">
            <h5 class="type-info-aprendiz">Estrato</h5>
            <p class="info-aprendiz">{{ $da->estrato }}</p>
        </div>
    </div>
    <div class="row row-info-aprendiz">
        <i class="fa fa-phone btn-round icons-info-aprendiz"></i>
        <div class="col-md-6">
            <h5 class="type-info-aprendiz">Teléfono</h5>
            <p class="info-aprendiz">{{ $da->telefono }}</p>
        </div>
        <div class="col-md-6">
            <h5 class="type-info-aprendiz">Correo electrónico</h5>
            <p class="info-aprendiz">{{ $da->email }}</p>
        </div>
    </div>
    <div class="info-aprendiz-title">
        <h4 class="text-center">Información académica</h4>
    </div>
    <div class="row row-info-aprendiz">
        <i class="fa fa-graduation-cap btn-round icons-info-aprendiz"></i>
        <div class="col-md-4">
            <h5 class="type-info-aprendiz">Programa de formación</h5>
            <p class="info-aprendiz">{{ $da->programa_formacion }}</p>
        </div>
        <div class="col-md-4">
            <h5 class="type-info-aprendiz">ID ficha</h5>
            <p class="info-aprendiz">{{ $da->numero_ficha }}</p>
        </div>
        <div class="col-md-4">
            <h5 class="type-info-aprendiz">Jornada</h5>
            <p class="info-aprendiz">{{ $da->jornada }}</p>
        </div>
    </div>
    <div class="info-aprendiz-title">
        <h4 class="text-center">Información académica</h4>
    </div>
    <div class="row row-info-aprendiz">
        <div class="col-md-6">
            <h5 class="type-info-aprendiz">De quien depende el aprendiz</h5>
            <p class="info-aprendiz">{{ $da->pregunta1 }}</p>
        </div>
        <div class="col-md-6">
            <h5 class="type-info-aprendiz">Oficio que realiza de quien depende el aprendiz</h5>
            <p class="info-aprendiz">{{ $da->pregunta2 }}</p>
        </div>
    </div>
    <div class="row row-info-aprendiz">
        <div class="col-md-12">
            <h5 class="type-info-aprendiz">Personas las cuales dependen del aprendiz</h5>
            <p class="info-aprendiz">{{ $da->pregunta3 }}</p>
        </div>
    </div>
    <h5 class="type-info-aprendiz">Apoyos a los cuales esta vinculado el aprendiz</h5>
    <p class="info-aprendiz">{{ $da->otro_apoyo }}</p>
    <h5 class="type-info-aprendiz">Se compromete a informar en la oficina de Bienestar al Aprendiz el momento en que usted reciba contrato de aprendizaje, consiguió empleo, o cualquier otro beneficio del Gobierno o del SENA (Monitorias, FIC, Apoyos de sostenimiento, entre otros).</h5>
    <p class="info-aprendiz">{{ $da->compromiso_informar ? $da->compromiso_informar : 'no' }}</p>
    <h5 class="type-info-aprendiz">Se compromete acatar las normas sobre el manejo adecuado del suplemento.</h5>
    <p class="info-aprendiz">{{ $da->compromiso_normas ? $da->compromiso_normas : 'no' }}</p>
    <h5 class="type-info-aprendiz">Justificacion del porque necesita el suplemento</h5>
    <p class="info-aprendiz">{{ $da->justificacion_suplemento }}</p>
@endforeach
