@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de produtos</h3>
            <div class="col-12">
                @include('table.table')
            </div>
        </div>
    </div>
@endsection
