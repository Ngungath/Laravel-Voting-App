<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Full Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    <div class="form-group">
    <label class="control-label">Gender</label>
    <select class="form-control" id="gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>        
    </select>
</div>

</div>

<!-- Bio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bio', 'Bio:') !!}
    {!! Form::text('bio', null, ['class' => 'form-control']) !!}
</div>

<!-- Linkedin Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linkedin_url', 'Linkedin Url:') !!}
    {!! Form::text('linkedin_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Business Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('business_name', 'Business Name:') !!}
    {!! Form::text('business_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Reason For Nomination Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reason_for_nomination', 'Reason For Nomination:') !!}
    {!! Form::text('reason_for_nomination', null, ['class' => 'form-control']) !!}
</div>


@if(Auth::user()->role_id < 3)
<!-- Is Admin Selected Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_admin_selected', 'Selected for voting ?:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_admin_selected', false) !!}
        {!! Form::checkbox('is_admin_selected', '1', null) !!} 
    </label>
</div>

<!-- Is Won Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_won', 'Won ?:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_won', false) !!}
        {!! Form::checkbox('is_won', '1', null) !!} 
    </label>
</div>
@endif

<!-- Category Id Field -->



@if(isset($categories->id))
<div class="form-group col-sm-6">
 
    {!! Form::hidden('category_id', $categories->id, ['class' => 'form-control' ,'id'=>'category_id']) !!}
</div>
@else
<div class="form-group col-sm-6">
    <div class="form-group">
    <label class="control-label">Category Name :</label>
    <select class="form-control" id="gender" name="gender">
        <option value="{{$nomination->category['id']}}">{{$nomination->category['name']}}</option>
        @foreach($categories as $category )
        <option value="{{$category['id']}}">{{$category['name']}}</option>
        @endforeach      
    </select>
</div>
</div>
@endif

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image :') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nominations.index') !!}" class="btn btn-default">Cancel</a>
</div>
