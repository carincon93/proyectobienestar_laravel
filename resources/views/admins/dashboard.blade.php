@extends('layouts.app')
@section('content')
@include('layouts.messages')
<form action="{{ url('admin/import') }}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    <input type="file" name="imported-file" class="form-control" accept=".xlsx">
    <button type="submit">Importar</button>
</form>
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        @if (session('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span
            aria-hidden="true">&times;</span></button>
                {!! html_entity_decode(session('status')) !!}
        </div>
        @endif
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Numero Documento</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($apprentice as $ap)
                    <tr>
                        <td>{{$ap->nombre_completo}}</td>
                        <td>{{$ap->numero_documento}}</</td>
                        <td>
                            @if($ap->estado_beneficio == 0)
                            <a class="btn btn-success" href="{{url('admin/'.$ap->id.'/solicitudaceptado')}}">Aceptado</a>
                            <a class="btn btn-danger" href="{{url('admin/'.$ap->id.'/solicitudrechazado')}}">No Aceptado</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
