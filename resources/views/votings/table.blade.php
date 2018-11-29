<table class="table table-responsive" id="votings-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Nomination Id</th>
        <th>Category Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($votings as $voting)
        <tr>
            <td>{!! $voting->user_id !!}</td>
            <td>{!! $voting->nomination_id !!}</td>
            <td>{!! $voting->category_id !!}</td>
            <td>
                {!! Form::open(['route' => ['votings.destroy', $voting->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('votings.show', [$voting->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('votings.edit', [$voting->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>