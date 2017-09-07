@extends('layouts.app')
@section('content')
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
@endsection
