@extends('layouts.election-template')
@section('content')
<!-- banner-bottom1 -->
<div class="text-center" style="margin-bottom: 50px; margin-top: 50px;">
    <h1><span class="glyphicon glyphicon-play" style="color: grey; font-size: 30px;"></span> Choose Category</h1>
</div>
    <div class="banner-bottom1">
        <div class="banner-bottom1-grids">
             @foreach($categories as $categories)
              <a href="{!! route('categories.show', [$categories->id]) !!}">
            <div class="col-md-4 banner-bottom1-left banner-bottom1-left1">
                <div class="banner-bottom1-lft">
                    @if(isset($categories->icon))
                    <span class="{!! $categories->icon !!}" aria-hidden="true"></span>
                    @else
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    @endif
                    <h3>{!! $categories->name !!}</h3>
                </div>
            </div>
        </a>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
<!-- //banner-bottom1 -->
@endsection
{{--

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
 --}}