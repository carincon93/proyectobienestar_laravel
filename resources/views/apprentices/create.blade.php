@extends('layouts.app')

@section('title','Adicionar aprendiz')

@section('navbar-top')
<ul class="breadcrumb">
	<li><a href="{{ url('/admin/apprentice') }}" class="btn-link">Lista de aprendices</a></li>
	<li>Adicionar aprendiz</li>
</ul>
@endsection

@section('big-content-desc')
<h4>Adicionar aprendiz</h4>
@endsection

@section('content')
	<div class="col-md-8">
		<div class="card-form">
			<form action="{{ url('/admin/apprentice') }}" method="POST">
				{!! csrf_field()  !!}
				<div class="form-group{{ $errors->has('nombre_completo') ? ' has-error' : '' }}">
					<label for="nombre_completo" class="control-label">
						Nombre completo *
					</label>
					<input type="text" name="nombre_completo" class="form-control" value="{{ old('nombre_completo') }}">
					@if ($errors->has('nombre_completo'))
						<span class="help-block">
							{{ $errors->first('nombre_completo') }}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('tipo_documento') ? ' has-error' : '' }}">
					<label for="tipo_documento" class="control-label">
						Tipo de documento *
					</label>
					<select name="tipo_documento" class="form-control">
					<option value="">Seleccione el tipo de documento..</option>
						<option value="CEDULA" {{ (old("tipo_documento") == 'CEDULA' ? "selected" : "")}}>CEDULA</option>
						<option value="TI" {{ (old("tipo_documento") == 'TI' ? "selected" : "")}}>TI</option>
					</select>
					@if ($errors->has('tipo_documento'))
						<span class="help-block">
							{{ $errors->first('tipo_documento') }}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('numero_documento') ? ' has-error' : '' }}">
					<label for="numero_documento" class="control-label">
						Numero de documento *
					</label>
					<input type="number" name="numero_documento" min="0" class="form-control" value="{{ old('numero_documento') }}">
					@if ($errors->has('numero_documento'))
						<span class="help-block">
							{{ $errors->first('numero_documento') }}
						</span>
					@endif
				</div>
				
				<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
					<label for="direccion" class="control-label">
						Direccion *
					</label>
					<input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
					@if ($errors->has('direccion'))
						<span class="help-block">
							{{ $errors->first('direccion') }}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('barrio') ? ' has-error' : '' }}">
					<label for="barrio" class="control-label">
						Barrio *
					</label>
					<input type="text" name="barrio" class="form-control" value="{{ old('barrio') }}">
					@if ($errors->has('barrio'))
						<span class="help-block">
							{{ $errors->first('barrio') }}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('estrato') ? ' has-error' : '' }}">
					<label for="estrato" class="control-label">
						Estrato *
					</label>
					<input type="number" name="estrato" class="form-control" value="{{ old('estrato') }}">
					@if ($errors->has('estrato'))
						<span class="help-block">
							{{ $errors->first('estrato') }}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
					<label for="telefono" class="control-label">
						Telefono
					</label>
					<input type="number" name="telefono" class="form-control" value="{{ old('telefono') }}">
					@if ($errors->has('telefono'))
						<span class="help-block">
							{{ $errors->first('telefono') }}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="control-label">
						Email *
					</label>
					<input type="text" name="email" class="form-control" value="{{ old('email') }}">
					@if ($errors->has('email'))
						<span class="help-block">
							{{ $errors->first('email') }}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('programa_formacion') ? ' has-error' : '' }}">
					<label for="programa_formacion" class="control-label">
						programa de formacion*
					</label>
					<input type="text" name="programa_formacion" class="form-control" value="{{ old('programa_formacion') }}">
					@if ($errors->has('programa_formacion'))
						<span class="help-block">
							{{ $errors->first('programa_formacion') }}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('numero_ficha') ? ' has-error' : '' }}">
					<label for="numero_ficha" class="control-label">
						numero de ficha *
					</label>
					<input type="number" name="numero_ficha" class="form-control" value="{{ old('numero_ficha') }}">
					@if ($errors->has('numero_ficha'))
						<span class="help-block">
							{{ $errors->first('numero_ficha') }}
						</span>
					@endif
				</div>						
				<div class="form-group{{ $errors->has('jornada') ? ' has-error' : '' }}">
					<label for="jornada" class="control-label">
						jornada*
					</label>
					<input type="text" name="jornada" class="form-control" value="{{ old('jornada') }}">
					@if ($errors->has('jornada'))
						<span class="help-block">
							{{ $errors->first('jornada') }}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('pregunta1') ? ' has-error' : '' }}">
					<label for="pregunta1" class="control-label">
						De quien depende usted*
					</label>
					<input type="text" name="pregunta1" class="form-control" value="{{ old('pregunta1') }}">
					@if ($errors->has('pregunta1'))
						<span class="help-block">
							{{ $errors->first('pregunta1') }}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('pregunta2') ? ' has-error' : '' }}">
					<label for="pregunta2" class="control-label">
						Oficio que realiza de quien depende*
					</label>
					<input type="text" name="pregunta2" class="form-control" value="{{ old('pregunta2') }}">
					@if ($errors->has('pregunta2'))
						<span class="help-block">
							{{ $errors->first('pregunta2') }}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('pregunta3') ? ' has-error' : '' }}">
					<label for="pregunta3" class="control-label">
						Tiene personas que dependan de usted?*
					</label>
					<input type="text" name="pregunta3" class="form-control" value="{{ old('pregunta3') }}">
					@if ($errors->has('pregunta3'))
						<span class="help-block">
							{{ $errors->first('pregunta3') }}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('otro_apoyo') ? ' has-error' : '' }}">
					<label for="otro_apoyo" class="control-label">
						Es usted beneficiario de algún tipo de apoyo*
					</label>
					<select name="otro_apoyo" class="form-control">
						<option value="">Seleccione el tipo de apoyo..</option>
						<option value="monitoria" {{ (old("otro_apoyo") == 'MONITORIA' ? "selected" : "")}}>MONITORIA</option>
						<option value="fic" {{ (old("otro_apoyo") == 'fic' ? "selected" : "")}}>FIC</option>
						<option value="apoyo de sostenimiento" {{ (old("otro_apoyo") == 'apoyo de sostenimiento' ? "selected" : "")}}>APOYO DE SOSTENIMIENTO</option>
						<option value="dps" {{ (old("otro_apoyo") == 'dps' ? "selected" : "")}}>DPS</option>
						<option value="patrocinio" {{ (old("otro_apoyo") == 'patrocinio' ? "selected" : "")}}>PATROCINIO</option>
						<option value="vinculo laboral" {{ (old("otro_apoyo") == 'vinculo laboral' ? "selected" : "")}}>VÍNCULO LABORAL</option>
						<option value="auxilio almuerzo" {{ (old("otro_apoyo") == 'auxilio almuerzo' ? "selected" : "")}}>AUXILIO ALMUERZO</option>
						<option value="ninguno" {{ (old("otro_apoyo") == 'ninguno' ? "selected" : "")}}>NINGUNO</option>
					</select>
					@if ($errors->has('otro_apoyo'))
					<span class="help-block">
						{{ $errors->first('otro_apoyo') }}
					</span>
					@endif
				</div>
				<div class="checkbox form-group{{ $errors->has('compromiso_informar') ? ' has-error' : '' }}">
					<label for="compromiso_informar" class="control-label">
						<input type="checkbox" name="compromiso_informar" value="si" {{ (old("compromiso_informar") == 'si' ? "checked" : "")}}>Se compromete a informar en la oficina de Bienestar al Aprendiz el momento en que usted reciba contrato de aprendizaje, consiguió empleo, o cualquier otro beneficio del Gobierno o del SENA (Monitorias, FIC, Apoyos de sostenimiento, entre otros).
					</label>
					@if ($errors->has('compromiso_informar'))
					<span class="help-block">
						{{ $errors->first('compromiso_informar') }}
					</span>
					@endif
				</div>
				<div class="checkbox form-group{{ $errors->has('compromiso_normas') ? ' has-error' : '' }}">
					<label for="compromiso_normas" class="control-label">
						<input type="checkbox" name="compromiso_normas" value="si" {{ (old("compromiso_normas") == 'si' ? "checked" : "")}}>Se compromete acatar las normas sobre el manejo adecuado del suplemento.
					</label>
					@if ($errors->has('compromiso_normas'))
					<span class="help-block">
						{{ $errors->first('compromiso_normas') }}
					</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('justificacion_suplemento') ? ' has-error' : '' }}">
					<label for="justificacion_suplemento" class="control-label">
						Explíque a profundidad por que requiere el suplemento *
					</label>
					<input type="text" name="justificacion_suplemento" class="form-control" value="{{ old('justificacion_suplemento') }}">
					@if ($errors->has('justificacion_suplemento'))
						<span class="help-block">
							{{ $errors->first('justificacion_suplemento') }}
						</span>
					@endif
				</div>
				<div class="form-group">
					<button class="btn btn-success" type="submit">
						<i class="fa fa-fw fa-floppy-o"></i>
						Guardar
					</button>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-4">
		<h3><i class="fa fa-fw fa-plus"></i> Adicionar aprendiz</h3>
		<p>
			Diligencie este formulario para agregar un aprendiz.
		</p>
		<blockquote class="note note-info {{ count($errors) > 0 ? 'note-danger animated shake' : '' }}">
			Los campos que tienen asterisco <span class="btn">*</span> son obligatorios. <br>
			{{ count($errors) > 0 ? 'Por favor echa un vistazo a los errores y asegurate de llenar bien cada campo.' : '' }}
		</blockquote>
	</div>
@endsection
