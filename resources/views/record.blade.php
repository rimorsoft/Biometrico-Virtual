@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <strong>#{{ $staff->code }}</strong>
                    {{ $staff->name }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button
                        type="button"
                        class="btn btn-primary btn-lg"
                        onclick="document.getElementById('check-in').submit();"
                        @if($staff->check_in) disabled @endif
                    >
                        ENTRADA
                    </button> /
                    <button
                        type="button"
                        class="btn btn-primary btn-lg"
                        onclick="document.getElementById('check-out').submit();"
                        @if($staff->check_out) disabled @endif
                    >
                        SALIDA
                    </button>

                    <form id="check-in" action="{{ route('check.in', $staff->code) }}" method="POST">
                        @csrf
                    </form>
                    <form id="check-out" action="{{ route('check.out', $staff->code) }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Últimos Registros</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Entrada</th>
                                <th>Salida</th>
                                <th>Hrs</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                            <tr>
                                <td>{{ $record->id }}</td>
                                <td>{{ $record->get_check_in }}</td>
                                <td>{{ $record->get_check_out }}</td>
                                <td># {{ $record->get_diff_in_hours }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $records->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
