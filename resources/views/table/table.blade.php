@if(count($table->rows()))
<div class="row">
    <div class="col-8">
        {!! $table->rows()->appends(['search' => \Request::get('search')])->links() !!}
    </div>
    <div class="col-4 ">
        <div class="float-right">
            <form action="{{url()->current()}}" method="GET" class="form-inline">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-search"></span>
                        </div>
                        <input class="form-control" type="text" name="search" placeholder="Pesquisar" value="{{\Request::get('search')}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-md btn-primary">Pesquisar</button>
            </form>
        </div>
    </div>
</div>
<table class="table table-striped" id="table-search">
    <thead>
        <tr>
            @foreach($table->columns() as $column)
                <th data-name="{{$column['name']}}">
                    {{$column['label']}}
                    @if(isset($column['_order']))
                        @php
                            $icon = [
                                1 => 'fa-sort',
                                'asc' => 'fa-sort-alpha-up',
                                'desc' => 'fa-sort-alpha-down-alt'
                            ]
                        @endphp
                        <a href="javascript:void(0)">
                            <span class="fa {{$icon[$column['_order']]}}"></span>
                        </a>
                    @endif
                </th>
            @endforeach
            @if(count($table->actions()))
                <th> Ações </th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($table->rows() as $row)
            <tr>
                @foreach($table->columns() as $column)
                    <td>{{$row->{$column['name']} }}</td>
                @endforeach
                @if(count($table->actions()))
                    <td>
                        @foreach($table->actions() as $action)
                            @include($action['template'], [
                                'row' => $row,
                                'sction' => $action])
                        @endforeach
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
{!! $table->rows()->appends(['search' => \Request::get('search'), 'field_order' => \Request::get('field_order'), 'order' => \Request::get('order') ])->links() !!}
@else
    <div class="col-12">
        Nenhum registro encontrado
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Back</a>
    </div>
@endif

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#table-search>thead>tr>th[data-name]>a')
                .click(function () {
                    var anchor = $(this);
                    var field =  anchor.closest('th').attr('data-name');
                    var order = anchor.find('span').hasClass('fa-sort') || anchor.find('span').hasClass('fa-sort-alpha-up')
                        ? 'asc' : 'desc';

                    var url = "{{url()->current()}}?";
                    @if(\Request::get('page'))
                        url += "page={{\Request::get('page')}}&";
                    @endif
                    @if(\Request::get('search'))
                        url += "search={{\Request::get('search')}}&";
                    @endif
                    url+='field_order='+field+'&order='+order;
                });

        });

    </script>
@endsection
