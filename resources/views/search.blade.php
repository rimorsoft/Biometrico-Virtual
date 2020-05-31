@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="form-group">
                            <label>Código *</label>
                            <input type="text" name="code" class="form-control form-control-lg" required>
                            <small class="form-text text-muted">Ingrese el código otorgado</small>
                        </div>

                        <input type="submit" value="Enviar" class="btn btn-lg btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
