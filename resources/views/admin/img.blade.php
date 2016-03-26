{!! Form::open(
    array(
        'route' => 'admin.img.store',
        'class' => 'form', 
        'novalidate' => 'novalidate', 
        'files' => true)) !!}

<div class="form-group">
    {!! Form::label('Product Image') !!}
    {!! Form::file('image', null) !!}
</div>

<div class="form-group">
    {!! Form::submit('Create Product!') !!}
</div>
{!! Form::close() !!}
