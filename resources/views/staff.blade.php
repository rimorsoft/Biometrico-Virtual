@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $staff->name }}</div>

                <div class="card-body">
                    <a href="{{ route('admin') }}">Ver todos</a> /
                    <a href="{{ route('export', $staff) }}">Exportar</a>

                    @include('partials.records')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
