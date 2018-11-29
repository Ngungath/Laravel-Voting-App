<table class="table table-responsive" id="categories-table">
    <thead>
        <tr>
              <th>Category Name</th>
            @if(Auth::user()->role_id < 3)

            <th colspan="3">Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $categories)
        <tr> <td>
            <a href="{!! route('categories.show', [$categories->id]) !!}">
           {!! $categories->name !!}
            </a>
            </td>
        @if(Auth::user()->role_id < 3)
            <td>
                {!! Form::open(['route' => ['categories.destroy', $categories->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('categories.show', [$categories->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('categories.edit', [$categories->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        @endif
        </tr>
    @endforeach
    </tbody>
</table>