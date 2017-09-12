<table>
	<thead>
		<tr>
			<th colspan="3" class="text-center">Reporte de entregas {{ date('d-m-Y') }}</th>			
		</tr>
		<tr>
			<th>#</th>
			<th>Nombre del aprendiz</th>
			<th>Fecha de entrega</th>
		</tr>
	</thead>
	<tbody>
		@php
			$count = 1;
		@endphp
		@foreach($his as $h)
		<tr>
			<td>{{ $count++ }}</td>
			<td>{{ $h->nombre_completo }}</td>
			<td>{{ $h->fecha }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
