<table>
	<thead>
		<tr>
			<th>Ficha</th>
			<th>Instructor</th>
			<th>Ambiente</th>
			<th>Fecha Prestado</th>
			<th>Fecha Entregado</th>
			<th>Novedad</th>
			<th>Novedad nueva</th>
		</tr>
	</thead>
	<tbody>
		@foreach($his as $h)
		<tr>
			<td>{{ $h->cLassgroup->id_ficha.' '.$h->nombre_ficha }}</td>
			<td>{{ $h->instructor->nombre.' '.$h->instructor->apellidos }}</td>
			<td>{{ $h->classroom->nombre_ambiente}}</td>
			<td>{{ $h->prestado_en }}</td>
			<td>{{ $h->entregado_en != '' ? $h->entregado_en : 'Sin entrega'}}</td>
			<td>{{ $h->entregado_en != '' ? $h->novedad : 'Sin novedad'}}</td>
			<td>{{ $h->entregado_en != '' ? $h->novedad_nueva : ''}}</td>
		</tr>
		@endforeach
	</tbody>
</table>