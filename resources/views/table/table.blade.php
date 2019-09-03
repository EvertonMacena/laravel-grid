<table class="table table-striped">
    <thead>
        <tr>
            @foreach($table->columns() as $column)
                <th>{{$column['label']}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($table->rows() as $row)
            <tr>
                @foreach($table->columns() as $column)
                    <td>{{$row->{$column['name']} }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>

</table>
