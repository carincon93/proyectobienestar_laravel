@php
$count = 1;
@endphp
@foreach($hr as $h)
<tr>
    <td>{{ $count++ }}</td>
    <td>{{ $h->apprentice->nombre_completo }}</td>
    <td>{{ $h->fecha }}</td>
</tr>
@endforeach
