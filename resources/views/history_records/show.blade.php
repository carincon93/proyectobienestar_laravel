@extends('layouts.app')
@section('big-content-desc')
<p>
    <blockquote class="blockquote">
        <i class="fa fa-fw fa-calendar-o"></i>
        Historial del aprendiz
    </blockquote>
</p>
@endsection
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="table-responsive">
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
                        @foreach($history_records as $his)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $his->apprentice->nombre_completo }}</td>
                            <td>{{ $his->fecha }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <span class="h5">
            Total de entregas:
        </span>
        <h2>
            @php
                $countEntregas = 0;
            @endphp
            @foreach($history_records as $his)
            @php
                $countEntregas++;
            @endphp
            @endforeach
            {{ $countEntregas }}
        </h2>
    </div>

</div>
@endsection
