@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
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
                    			@if($ap->estado_beneficio == '')
	                    			<td>{{$ap->nombre_completo}}</td>
	                    			<td>{{$ap->numero_documento}}</</td>
	                    			<td>
									<a class="btn btn-success" href="{{url('admin/'.$ap->id.'/aprendizaceptado')}}">Aceptado</a>
									<a class="btn btn-danger" href="{{url('admin/'.$ap->id.'/aprendizrechazado')}}">No Aceptado</a>
									</td>	
                    			@endif
                    		</tr>

                    	@endforeach
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
