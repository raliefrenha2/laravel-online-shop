{!! Form::model($model, [
    'route' => $model->exists ? ['category.update', $model->id] : 'category.store', 
    'method' => $model->exists ? 'PUT' : 'POST'
])!!}

    <div class="form-group">
        <label for="" class="control-label">Nama Kategori</label>
        {!!Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Urutan</label>
        {!!Form::text('sort', null, ['class' => 'form-control', 'id' => 'sort']) !!}
    </div>
{!! Form::close() !!}