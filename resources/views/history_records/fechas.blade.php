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
                        @if(count($history_records)>0)
                        @foreach($history_records as $his)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $his->apprentice->nombre_completo }}</td>
                            <td>{{ $his->fecha }}</td>
                        </tr>
                        @endforeach
                        @else
                        <div class="alert alert-dismissable alert-warning">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <h4>Mensaje del sistema!</h4>
                          <p>No se encuentran registros para este periodo.</p>
                        </div>

                        @endif
                    </tbody>
                </table>