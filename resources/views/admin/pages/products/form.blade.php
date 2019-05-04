@extends('admin.layouts.app')

@section('title', 'Produk')

@section('card-title', $model->exists ? 'Edit Produk' : 'Tambah Produk')

@section('content')
  
  {!! Form::model($model, [
      'route' => $model->exists ? ['product.update', $model->id] : 'product.store', 
      'method' => $model->exists ? 'PUT' : 'POST',
      'enctype' => 'multipart/form-data',
      'class' => 'form-horizontal'

  ])!!}

      {{-- {!! Form::open(array('route' => array('product.store'), 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')) !!} --}}

      <div class="form-group row">
        {!! Form::label('name', 'Nama Produk : ', array('class' => 'col-md-3 col-form-label-lg')) !!}
          <div class="col-md-8">
             {!!Form::text('name', null, ['class' => 'form-control form-control-lg'. ( $errors->has('name') ? ' is-invalid' : '' ), 'id' => 'name']) !!}
             {!! $errors->has('name') ? '<div class="invalid-feedback">'.$errors->first('name').'</div>':'' !!}
          </div>
      </div>

      <div class="form-group row">
        {!! Form::label('code', 'Kode Produk : ', array('class' => 'col-md-3 col-form-label')) !!}
        <div class="col-md-8">
          {!!Form::text('code', null, ['class' => 'form-control'. ( $errors->has('code') ? ' is-invalid' : '' ), 'id' => 'code']) !!}
          {!! $errors->has('code') ? '<div class="invalid-feedback">'.$errors->first('code').'</div>':'' !!}
        </div>
      </div>

      <div class="form-group row">
        {!! Form::label('category_id', 'Kategori : ', array('class' => 'col-md-3 col-form-label')) !!}
        <div class="col-md-8">
          {!! Form::select('category_id', $categories, NULL, array('class' => 'form-control select2'. ( $errors->has('category_id') ? ' is-invalid' : '' )))!!}
          {!! $errors->has('category_id') ? '<div class="invalid-feedback">'.$errors->first('category_id').'</div>':'' !!}
        </div>
      </div>

      <div class="form-group row">
        {!! Form::label('price', 'Harga : ', array('class' => 'col-md-3 col-form-label')) !!}
        <div class="col-md-8">
          {!!Form::number('price', null, ['class' => 'form-control'. ( $errors->has('price') ? ' is-invalid' : '' ), 'id' => 'price', 'placeholder' => 'Tentukan Harga Produk']) !!}
          {!! $errors->has('price') ? '<div class="invalid-feedback">'.$errors->first('price').'</div>':'' !!}
        </div>
      </div>

      <div class="form-group row">
        {!! Form::label('stock', 'Stok : ', array('class' => 'col-md-3 col-form-label')) !!}
        <div class="col-md-8">
          {!!Form::number('stock', null, ['class' => 'form-control'. ( $errors->has('stock') ? ' is-invalid' : '' ), 'id' => 'stock', 'placeholder' => 'Tentukan Stok Produk']) !!}
          {!! $errors->has('stock') ? '<div class="invalid-feedback">'.$errors->first('stock').'</div>':'' !!}
        </div>
      </div>
      
      <div class="form-group row">
        {!! Form::label('weight', 'Berat : ', array('class' => 'col-md-3 col-form-label')) !!}
        <div class="col-md-8">
          {!!Form::text('weight', null, ['class' => 'form-control'. ( $errors->has('weight') ? ' is-invalid' : '' ), 'id' => 'weight', 'placeholder' => 'Tentukan Berat Produk']) !!}
           {!! $errors->has('weight') ? '<div class="invalid-feedback">'.$errors->first('weight').'</div>':'' !!}
        </div>
      </div>

      <div class="form-group row">
        {!! Form::label('size', 'Ukuran : ', array('class' => 'col-md-3 col-form-label')) !!}
        <div class="col-md-8">
          {!!Form::text('size', null, ['class' => 'form-control'. ( $errors->has('size') ? ' is-invalid' : '' ), 'id' => 'size', 'placeholder' => 'Tentukan Ukuran Produk']) !!}
          {!! $errors->has('size') ? '<div class="invalid-feedback">'.$errors->first('size').'</div>':'' !!}
        </div>
      </div>

      <div class="form-group row">
        {!! Form::label('description', 'Deskripsi : ', array('class' => 'col-md-3 col-form-label')) !!}
        <div class="col-md-8">
          {!!Form::textarea('description', null, ['class' => 'form-control'. ( $errors->has('description') ? ' is-invalid' : '' ), 'id' => 'description']) !!}
          {!! $errors->has('description') ? '<div class="invalid-feedback">'.$errors->first('description').'</div>':'' !!}
        </div>
      </div>

      <div class="form-group row">
        {!! Form::label('keywords', 'Keywords : ', array('class' => 'col-md-3 col-form-label')) !!}
        <div class="col-md-8">
          {!!Form::textarea('keywords', null, ['class' => 'form-control'. ( $errors->has('keywords') ? ' is-invalid' : '' ), 'id' => 'keywords', 'rows' => 3]) !!}
           {!! $errors->has('keywords') ? '<div class="invalid-feedback">'.$errors->first('keywords').'</div>':'' !!}
        </div>
      </div>

      <div class="form-group row">
        {!! Form::label('tags', 'Tag : ', array('class' => 'col-md-3 col-form-label')) !!}
        <div class="col-md-8">
          {!! Form::select('tag_list[]', $tags, NULL, array('class' => 'form-control select2'. ( $errors->has('tags') ? ' is-invalid' : '' ),'multiple'))!!}
          {!! $errors->has('tags') ? '<div class="invalid-feedback">'.$errors->first('tags').'</div>':'' !!}
        </div>
      </div>

      <div class="form-group row">
        {!! Form::label('image', 'Gambar : ', array('class' => 'col-md-3 col-form-label')) !!}
        <div class="col-md-8">
          {!!Form::file('image', null, ['class' => 'form-control', 'id' => 'image']) !!}
          {!! Form::hidden('image_max_size', 5) !!}
          {!! Form::hidden('image_max_width', 2048) !!}
          {!! Form::hidden('image_max_height', 2048) !!}
          {!! $errors->has('image') ? '<div class="invalid-feedback">'.$errors->first('image').'</div>':'' !!}
        </div>
      </div>

      <div class="form-group row">
        {!! Form::label('status', 'Status : ', array('class' => 'col-md-3 col-form-label')) !!}
        <div class="col-md-8">
          {!! Form::select('status', $status, NULL, array('class' => 'form-control select2'. ( $errors->has('status') ? ' is-invalid' : '' )))!!}
          {!! $errors->has('status') ? '<div class="invalid-feedback">'.$errors->first('status').'</div>':'' !!}
        </div>
      </div>


      <div class="form-group row">
        {!! Form::label('button', '', array('class' => 'col-md-3 col-form-label')) !!}
        <div class="col-md-8">
          
          {!! Form::button($model->exists ? 'Ubah':'Simpan', array('class' => 'btn btn-success btn-lg mr-2', 'type' => 'submit')); !!}
          {!! Form::button('Reset', array('class' => 'btn btn-warning btn-lg mr-2', 'type' => 'reset')); !!}
        </div>
      </div>



  {!! Form::close() !!}
      
@endsection

@include('admin.layouts._modal')

@push('styles')
  <!-- Sweet Alert -->
  <link rel="stylesheet" href=" {{ asset('vendor/sweetalert2') }}/sweetalert2.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href=" {{ asset('vendor/adminlte') }}/plugins/select2/select2.min.css">

@endpush

@push('scripts')
    <script src="{{ asset('vendor/sweetalert2') }}/sweetalert2.all.min.js"></script>
    <script src="{{ asset('vendor/adminlte') }}/plugins/select2/select2.min.js"></script>

    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
      CKEDITOR.replace( 'description' );

      $('.select2').select2();
    </script>
@endpush
