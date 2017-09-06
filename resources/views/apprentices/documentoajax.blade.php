@foreach($query as $da)
    @foreach($da->historyrecords as $his)
        @php
        $fecha = substr($his->fecha, 0, -9);
        @endphp
    @endforeach
    @if(isset($fecha) && $fecha == date('Y-m-d'))
        El aprendiz ya recibió el suplemento!
    @else
    <div class="aprendiz-card">
        <div>
            <ul class="list-unstyled">
                <li class="h4" id="name">{{ $da->nombre_completo }}</li>
                <li>{{ $da->programa_formacion }}</li>
            </ul>
        </div>
    </div>
    <form action="{{ url('admin/'.$da->id.'/entrega_suplemento') }}" id="formEntrega">
        {{ csrf_field() }}
        <input type="hidden" name="apprentice_id" value="{{ $da->id }}">
        <button type="submit" class="text-uppercase pull-right btn-no-style" id="entregarSuplemento">Entregar suplemento</button>
    </form>
    @endif
@endforeach
