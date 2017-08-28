@extends('layouts.app')

@section('title', 'Ver administrador')

@section('navbar-top')
<ul class="breadcrumb">
	<li><a href="{{ url('/admin/collaborator') }}" class="btn-link">Lista de administradores</a></li>
	<li>Ver administrador</li>
</ul>
@endsection

@section('content')
	<h1 class="text-uppercase">{{ $dataCollaborator->name }}</h1>
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
				<td>{{ $dataCollaborator->id }}</td>
			</tr>
			<tr>
				<th>Nombre</th>
				<td>{{ $dataCollaborator->name }}</td>
			</tr>
			<tr>
				<th>Correo</th>
				<td>{{ $dataCollaborator->email }}</td>
			</tr>
		</table>
	</div>
@endsection
