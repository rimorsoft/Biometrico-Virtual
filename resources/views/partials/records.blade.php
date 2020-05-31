<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Empleado</th>
            <th>Entrada</th>
            <th>Salida</th>
            <th>Hrs</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>
                <a href="{{ route('staff', $record->staff->code) }}">
                    {{ $record->staff->name }}
                </a>
            </td>
            <td>{{ $record->get_check_in }}</td>
            <td>{{ $record->get_check_out }}</td>
            <td># {{ $record->get_diff_in_hours }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $records->links() }}
