@extends('layouts.app')
@section('content')
@include('layouts.messages')
<form action="{{ url('admin/import') }}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    <input type="file" name="imported-file" class="form-control" accept=".xlsx">
    <button type="submit">Importar</button>
</form>
@endsection
