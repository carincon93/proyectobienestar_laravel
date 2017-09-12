<table class="table table-full table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody  id="myTableAprendiz">
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach($history_records as $his)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $his->fecha }}</td>
                                        <td><button>x</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>