<table class="table table-full table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre aprendiz</th>
            <th>Fecha de entrega</th>
        </tr>
    </thead>
    <tbody  id="myTableAprendiz">
        @php
            $count = 1;
        @endphp
        @if(count($history_records) > 0)
            @foreach($history_records as $his)
            <tr>
                <td>{{ $count++ }}</td>
                <td>{{ $his->apprentice->nombre_completo }}</td>
                <td>{{ $his->fecha }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3">
                    No se encuentran registros para este aprendiz.</p>
                </td>
            </tr>

        @endif
    </tbody>
</table>
