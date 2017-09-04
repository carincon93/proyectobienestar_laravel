@foreach($query as $da)
    @foreach($da->historyrecords as $his)
        @php
        $fecha = substr($his->fecha, 0, -9);
        @endphp
    @endforeach
    @if(isset($fecha) && $fecha == date('Y-m-d') && $da->estado_beneficio == 1)
        El aprendiz ya recibió el suplemento!
    @else
    <form action="{{ url('admin/'.$da->id.'/entrega_suplemento') }}" id="formEntrega">
        {{ csrf_field() }}
        <input type="hidden" name="apprentice_id" value="{{ $da->id }}">
        <button type="submit" class="text-uppercase" id="entregarSuplemento">Entregar suplemento</button>
    </form>
    @endif
@endforeach
