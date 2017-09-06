@foreach($dataApprentice as $da)
    <div class="col-md-6">
        <h5>Tipo de documento</h5>
        <p>{{ $da->tipo_documento }}</p>
    </div>
    <div class="col-md-6">
        <h5>Número de documento</h5>
        <p>{{ $da->numero_documento }}</p>
    </div>
    <div class="col-md-4">
        <h5>Dirección</h5>
        <p>{{ $da->direccion }}</p>
    </div>
    <div class="col-md-4">
        <h5>Barrio</h5>
        <p>{{ $da->barrio }}</p>
    </div>
    <div class="col-md-4">
        <h5>Estrato</h5>
        <p>{{ $da->estrato }}</p>
    </div>
    <div class="col-md-6">
        <h5>Teléfono</h5>
        <p>{{ $da->telefono }}</p>
    </div>
    <div class="col-md-6">
        <h5>Correo electrónico</h5>
        <p>{{ $da->email }}</p>
    </div>
    <div class="col-md-4">
        <h5>Programa de formación</h5>
        <p>{{ $da->programa_formacion }}</p>
    </div>
    <div class="col-md-4">
        <h5>ID ficha</h5>
        <p>{{ $da->numero_ficha }}</p>
    </div>
    <div class="col-md-4">
        <h5>Jornada</h5>
        <p>{{ $da->jornada }}</p>
    </div>
    <div class="col-md-6">
        <h5>De quien depende el aprendiz</h5>
        <p>{{ $da->pregunta1 }}</p>
    </div>
    <div class="col-md-6">
        <h5>Oficio que realiza de quien depende el aprendiz</h5>
        <p>{{ $da->pregunta2 }}</p>
    </div>
    <div class="col-md-12">
        <h5>Personas las cuales dependen del aprendiz</h5>
        <p>{{ $da->pregunta3 }}</p>
    </div>
    <h5>Apoyos a los cuales esta vinculado el aprendiz</h5>
    <p>{{ $da->otro_apoyo }}</p>
    <h5>Se compromete a informar en la oficina de Bienestar al Aprendiz el momento en que usted reciba contrato de aprendizaje, consiguió empleo, o cualquier otro beneficio del Gobierno o del SENA (Monitorias, FIC, Apoyos de sostenimiento, entre otros).</h5>
    <p>{{ $da->compromiso_informar ? $da->compromiso_informar : 'no' }}</p>
    <h5>Se compromete acatar las normas sobre el manejo adecuado del suplemento.</h5>
    <p>{{ $da->compromiso_normas ? $da->compromiso_normas : 'no' }}</p>
    <h5>Justificacion del porque necesita el suplemento</h5>
    <p>{{ $da->justificacion_suplemento }}</p>
@endforeach
