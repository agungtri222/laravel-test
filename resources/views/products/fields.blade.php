
<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control slugify']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control slug-target','readonly' => true]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'editor']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'id' => 'editor']) !!}
</div>

<!-- Featured Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Product Image:') !!}
    {!! Form::file('image') !!}
    <small class="text-info"><strong><i>* Couldn't upload more than 1</i></strong></small>
</div>
<div class="clearfix"></div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.products.index') !!}" class="btn btn-default">Cancel</a>
</div>
