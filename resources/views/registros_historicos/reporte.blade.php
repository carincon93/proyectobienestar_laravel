<table>
	<thead>
		<tr>
			<th colspan="3" class="text-center">Reporte de entregas {{ date('d-m-Y') }}</th>
		</tr>
		<tr>
			<th>#</th>
			<th>Nombre del aprendiz</th>
			<th>Número de documento</th>
			<th>Programa de formación</th>
			<th>Fecha de entrega</th>
		</tr>
	</thead>
	<tbody>
		@php
			$count = 1;
		@endphp
		@foreach($registros_historicos as $registro_historico)
		<tr>
			<td>{{ $count++ }}</td>
			<td>{{ $registro_historico->nombre_completo }}</td>
			<td>{{ $registro_historico->numero_documento }}</td>
			<td>{{ $registro_historico->programa_formacion }}</td>
			<td>{{ $registro_historico->fecha }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
