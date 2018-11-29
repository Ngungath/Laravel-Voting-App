@extends('layouts.app')


@section('content')


    <section class="content-header">

    </section>
    <div class="content">

        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('users.show_fields')
                   
                </div>
                 <a href="{!! route('users.edit', [$user->id]) !!}"> <button class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Edit Profile</button></a>
            </div>

        </div>
    </div>
@endsection
