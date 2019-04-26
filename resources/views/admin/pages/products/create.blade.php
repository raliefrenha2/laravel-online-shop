@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Produk</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
       {{--  {!! Form::model($model, [
            'route' => $model->exists ? ['category.update', $model->id] : 'category.store', 
            'method' => $model->exists ? 'PUT' : 'POST',
            'enctype' => 'multipart/form-data',
            'class' => 'form-horizontal'

        ])!!} --}}

            {!! Form::open(array('route' => array('product.store'), 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')) !!}

            <div class="form-group row">
              {!! Form::label('product_name', 'Nama Produk : ', array('class' => 'col-md-3 col-form-label-lg')) !!}
                <div class="col-md-8">
                   {!!Form::text('product_name', null, ['class' => 'form-control form-control-lg'. ( $errors->has('product_name') ? ' is-invalid' : '' ), 'id' => 'product_name']) !!}
                   {!! $errors->has('product_name') ? '<div class="invalid-feedback">'.$errors->first('product_name').'</div>':'' !!}
                </div>
            </div>

            <div class="form-group row">
              {!! Form::label('product_code', 'Kode Produk : ', array('class' => 'col-md-3 col-form-label')) !!}
              <div class="col-md-8">
                {!!Form::text('product_code', null, ['class' => 'form-control'. ( $errors->has('product_code') ? ' is-invalid' : '' ), 'id' => 'product_code']) !!}
                {!! $errors->has('product_code') ? '<div class="invalid-feedback">'.$errors->first('product_code').'</div>':'' !!}
              </div>
            </div>

            <div class="form-group row">
              {!! Form::label('category_id', 'Kategori : ', array('class' => 'col-md-3 col-form-label')) !!}
              <div class="col-md-8">
                {!! Form::select('category_id', $categories, NULL, array('class' => 'form-control select2'))!!}
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
              {!! Form::label('image', 'Gambar : ', array('class' => 'col-md-3 col-form-label')) !!}
              <div class="col-md-8">
                {!!Form::file('image', null, ['class' => 'form-control', 'id' => 'image']) !!}
                {!! $errors->has('image') ? '<div class="invalid-feedback">'.$errors->first('image').'</div>':'' !!}
              </div>
            </div>

            <div class="form-group row">
              {!! Form::label('product_status', 'Status : ', array('class' => 'col-md-3 col-form-label')) !!}
              <div class="col-md-8">
                {!! Form::select('product_status', $status, NULL, array('class' => 'form-control select2'. ( $errors->has('product_status') ? ' is-invalid' : '' )))!!}
                {!! $errors->has('product_status') ? '<div class="invalid-feedback">'.$errors->first('product_status').'</div>':'' !!}
              </div>
            </div>

            <div class="form-group row">
              {!! Form::label('button', '', array('class' => 'col-md-3 col-form-label')) !!}
              <div class="col-md-8">
                
                {!! Form::button('Simpan', array('class' => 'btn btn-success btn-lg mr-2', 'type' => 'submit')); !!}
                {!! Form::button('Reset', array('class' => 'btn btn-warning btn-lg mr-2', 'type' => 'reset')); !!}
              </div>
            </div>



        {!! Form::close() !!}
          
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection

@include('admin.layouts._modal')

@push('styles')
  <!-- Sweet Alert -->
  <link rel="stylesheet" href=" {{ asset('vendor/sweetalert2') }}/sweetalert2.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href=" {{ asset('vendor/adminlte') }}/plugins/select2/select2.min.js">

@endpush

@push('scripts')
    <script src="{{ asset('vendor/sweetalert2') }}/sweetalert2.all.min.js"></script>
    <script src="{{ asset('vendor/adminlte') }}/plugins/select2/select2.min.js"></script>

    <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
      CKEDITOR.replace( 'description' );
    </script>
@endpush
