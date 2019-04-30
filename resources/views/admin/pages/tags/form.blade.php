{!! Form::model($model, [
    'route' => $model->exists ? ['tag.update', $model->id] : 'tag.store', 
    'method' => $model->exists ? 'PUT' : 'POST'
])!!}

    <div class="form-group">
        <label for="" class="control-label">Nama Tag</label>
        {!!Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>
    
{!! Form::close() !!}