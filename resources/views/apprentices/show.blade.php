@extends('layouts.app')

@section('title', 'Ver aprendiz')

@section('navbar-top')
<ul class="breadcrumb">
	<li><a href="{{ url('/admin/apprentice') }}" class="btn-link">Lista de aprendices</a></li>
	<li>Ver Aprendiz</li>
</ul>
@endsection

@section('content')
	<h1 class="text-uppercase">{{ $dataApprentice->nombre_completo }}</h1>
	<hr>
	@if (session('status'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
		{!!  html_entity_decode(session('status')) !!}
	</div>
	@endif
	<div class="table-responsive">
		<table class="table table-stripped table-bordered table-hover">
			<tr>
				<th>id</th>
				<td>{{ $dataApprentice->id }}</td>
			</tr>
			<tr>
				<th>ID ficha</th>
				<td>{{ $dataApprentice->nombre_completo }}</td>
			</tr>
			<tr>
				<th>Tipo de documento</th>
				<td>{{ $dataApprentice->tipo_documento }}</td>
			</tr>
			<tr>
				<th>Numero de documento</th>
				<td>{{ $dataApprentice->numero_documento }}</td>
			</tr>
			<tr>
				<th>Direccion</th>
				<td>{{ $dataApprentice->direccion }}</td>
			</tr>
			<tr>
				<th>Barrio</th>
				<td>{{ $dataApprentice->barrio }}</td>
			</tr>
			<tr>
				<th>Estrato</th>
				<td>{{ $dataApprentice->estrato }}</td>
			</tr>
			<tr>
				<th>Telefono</th>
				<td>{{ $dataApprentice->telefono }}</td>
			</tr>
			<tr>
				<th>Email</th>
				<td>{{ $dataApprentice->email }}</td>
			</tr>
			<tr>
				<th>Programa de formacion</th>
				<td>{{ $dataApprentice->programa_formacion }}</td>
			</tr>

			<tr>
				<th>Jornada</th>
				<td>{{ $dataApprentice->jornada }}</td>
			</tr>
			<tr>
				<th>De quien depende el aprendiz</th>
				<td>{{ $dataApprentice->pregunta1 }}</td>
			</tr>
			<tr>
				<th>Oficio que realiza de quien depende el aprendiz</th>
				<td>{{ $dataApprentice->pregunta2 }}</td>
			</tr>
			<tr>
				<th>Personas las cuales dependen del aprendiz</th>
				<td>{{ $dataApprentice->pregunta3 }}</td>
			</tr>
			<tr>
				<th>Apoyos a los cuales esta vinculado el aprendiz</th>
				<td>{{ $dataApprentice->otro_apoyo }}</td>
			</tr>

			<tr>
				<th>El estudiante se comprometio con el primer compromiso?</th>
				<td>{{ $dataApprentice->compromiso_informar }}</td>
			</tr>
			<tr>
				<th>El estudiante se comprometio con el segundo compromiso?</th>
				<td>{{ $dataApprentice->compromiso_normas }}</td>
			</tr>
			<tr>
				<th>Justificacion del porque necesita el suplemento</th>
				<td>{{ $dataApprentice->justificacion_suplemento }}</td>
			</tr>

		</table>
	</div>
@endsection
