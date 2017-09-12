

<table class="table table-full table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre aprendiz</th>
            <th>Fecha de entrega</th>
            <th>Acciones</th>
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
                @php

                    $dt=new Jenssegers\Date\Date($his->fecha);

                @endphp
                <td>{{ $dt->format('d F Y h:i A') }}</td>
                <td>
                                <div class="dropdown">
                                <a href="#" class="dropdown-toggle text-capitalize user-name" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-trash"></i><span class="caret"></span></a>
                                    
                                <ul class="dropdown-menu">
                                    <li><form action="{{ url('/admin/history_records/'.$his->id) }}" style="display: inline-block;" method="GET">

                                    {{ method_field('delete') }}
                                    {!! csrf_field()  !!}
                                    <button type="submit">si</button>
                                </form></li>
                                    
                                </ul>
                            </div>
                            </td>
            </tr>
            @endforeach
        @else
        <tr>
            <td colspan="4">
                No se encuentran registros para este aprendiz.</p>
            </td>
        </tr>

        @endif
    </tbody>
</table>
