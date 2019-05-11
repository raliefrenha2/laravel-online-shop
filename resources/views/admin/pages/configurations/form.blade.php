@extends('admin.layouts.app')

@section('title', 'Konfigurasi')

@section('card-title', 'Konfigurasi')

@section('content')
  
  {!! Form::model($model, [
      'route' => 'configuration.update', 
      'method' => 'PUT',
      'files' => true,
      'class' => 'form-horizontal'

  ])!!}

     <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Umum</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="image-tab" data-toggle="tab" href="#image" role="tab" aria-controls="image" aria-selected="false">Gambar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">SEO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="social-media-tab" data-toggle="tab" href="#social-media" role="tab" aria-controls="social-media" aria-selected="false">Media Sosial</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="account-payment-tab" data-toggle="tab" href="#account-payment" role="tab" aria-controls="account-payment" aria-selected="false">Rekening</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
        <div class="form-group row mt-3">
          {!! Form::label('webname', 'Nama Web : ', array('class' => 'col-md-3 col-form-label-lg')) !!}
            <div class="col-md-8">
               {!!Form::text('webname', null, ['class' => 'form-control form-control-lg'. ( $errors->has('webname') ? ' is-invalid' : '' ), 'id' => 'webname']) !!}
               {!! $errors->has('webname') ? '<div class="invalid-feedback">'.$errors->first('webname').'</div>':'' !!}
            </div>
          </div>

          <div class="form-group row">
            {!! Form::label('website', 'Website : ', array('class' => 'col-md-3 col-form-label')) !!}
            <div class="col-md-8">
              {!!Form::text('website', null, ['class' => 'form-control'. ( $errors->has('website') ? ' is-invalid' : '' ), 'id' => 'website']) !!}
              {!! $errors->has('website') ? '<div class="invalid-feedback">'.$errors->first('website').'</div>':'' !!}
            </div>
          </div>

          <div class="form-group row">
            {!! Form::label('email', 'Email : ', array('class' => 'col-md-3 col-form-label')) !!}
            <div class="col-md-8">
              {!!Form::email('email', null, ['class' => 'form-control'. ( $errors->has('email') ? ' is-invalid' : '' ), 'id' => 'email']) !!}
              {!! $errors->has('email') ? '<div class="invalid-feedback">'.$errors->first('email').'</div>':'' !!}
            </div>
          </div>

          <div class="form-group row">
            {!! Form::label('address', 'Alamat : ', array('class' => 'col-md-3 col-form-label')) !!}
            <div class="col-md-8">
              {!!Form::text('address', null, ['class' => 'form-control'. ( $errors->has('address') ? ' is-invalid' : '' ), 'id' => 'address']) !!}
              {!! $errors->has('address') ? '<div class="invalid-feedback">'.$errors->first('address').'</div>':'' !!}
            </div>
          </div>

        <div class="form-group row">
          {!! Form::label('telephone', 'Telepon : ', array('class' => 'col-md-3 col-form-label')) !!}
          <div class="col-md-8">
            {!!Form::text('telephone', null, ['class' => 'form-control'. ( $errors->has('telephone') ? ' is-invalid' : '' ), 'id' => 'telephone']) !!}
            {!! $errors->has('telephone') ? '<div class="invalid-feedback">'.$errors->first('telephone').'</div>':'' !!}
          </div>
        </div>

      </div>
      <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">

        <div class="form-group row mt-3">
          {!! Form::label('logo', 'Logo Web : ', array('class' => 'col-md-3 col-form-label')) !!}
          <div class="col-md-8">
            {!!Form::file('logo', ['class' => 'form-control-file']) !!}
            {!! Form::hidden('logo_max_size', 5) !!}
            {!! Form::hidden('logo_max_width', 2048) !!}
            {!! Form::hidden('logo_max_height', 2048) !!}
            {!! $errors->has('logo') ? '<div class="invalid-feedback">'.$errors->first('logo').'</div>':'' !!}
          </div>
        </div>

        <div class="form-group row">
          {!! Form::label('icon', 'Icon Web : ', array('class' => 'col-md-3 col-form-label')) !!}
          <div class="col-md-8">
            {!!Form::file('icon', ['class' => 'form-control-file mt-3']) !!}
            {!! Form::hidden('icon_max_size', 5) !!}
            {!! Form::hidden('icon_max_width', 2048) !!}
            {!! Form::hidden('icon_max_height', 2048) !!}
            {!! $errors->has('icon') ? '<div class="invalid-feedback">'.$errors->first('icon').'</div>':'' !!}
          </div>
        </div>

       
      </div>
      <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
        <div class="form-group row mt-3">
          {!! Form::label('tagline', 'Tagline/Motto : ', array('class' => 'col-md-3 col-form-label')) !!}
          <div class="col-md-8">
            {!!Form::text('tagline', null, ['class' => 'form-control'. ( $errors->has('tagline') ? ' is-invalid' : '' ), 'id' => 'tagline']) !!}
            {!! $errors->has('tagline') ? '<div class="invalid-feedback">'.$errors->first('tagline').'</div>':'' !!}
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
          {!! Form::label('metatext', 'Metatext : ', array('class' => 'col-md-3 col-form-label')) !!}
          <div class="col-md-8">
            {!!Form::textarea('metatext', null, ['class' => 'form-control'. ( $errors->has('metatext') ? ' is-invalid' : '' ), 'id' => 'metatext', 'rows' => 3]) !!}
             {!! $errors->has('metatext') ? '<div class="invalid-feedback">'.$errors->first('metatext').'</div>':'' !!}
          </div>
        </div>

        <div class="form-group row">
          {!! Form::label('description', 'Keterangan : ', array('class' => 'col-md-3 col-form-label')) !!}
          <div class="col-md-8">
            {!!Form::textarea('description', null, ['class' => 'form-control'. ( $errors->has('description') ? ' is-invalid' : '' ), 'id' => 'description', 'rows' => 3]) !!}
             {!! $errors->has('description') ? '<div class="invalid-feedback">'.$errors->first('description').'</div>':'' !!}
          </div>
        </div>

      </div>
      <div class="tab-pane fade" id="social-media" role="tabpanel" aria-labelledby="social-media-tab">

        <div class="form-group row mt-3">
          {!! Form::label('facebook', 'Facebook : ', array('class' => 'col-md-3 col-form-label')) !!}
          <div class="col-md-8">
            {!!Form::text('facebook', null, ['class' => 'form-control'. ( $errors->has('facebook') ? ' is-invalid' : '' ), 'id' => 'facebook']) !!}
            {!! $errors->has('facebook') ? '<div class="invalid-feedback">'.$errors->first('facebook').'</div>':'' !!}
          </div>
        </div>

        <div class="form-group row">
          {!! Form::label('instagram', 'Instagram : ', array('class' => 'col-md-3 col-form-label')) !!}
          <div class="col-md-8">
            {!!Form::text('instagram', null, ['class' => 'form-control'. ( $errors->has('instagram') ? ' is-invalid' : '' ), 'id' => 'instagram']) !!}
            {!! $errors->has('instagram') ? '<div class="invalid-feedback">'.$errors->first('instagram').'</div>':'' !!}
          </div>
        </div>

        <div class="form-group row">
          {!! Form::label('twitter', 'Twitter : ', array('class' => 'col-md-3 col-form-label')) !!}
          <div class="col-md-8">
            {!!Form::text('twitter', null, ['class' => 'form-control'. ( $errors->has('twitter') ? ' is-invalid' : '' ), 'id' => 'twitter']) !!}
            {!! $errors->has('twitter') ? '<div class="invalid-feedback">'.$errors->first('twitter').'</div>':'' !!}
          </div>
        </div>
      
      </div>

      <div class="tab-pane fade" id="account-payment" role="tabpanel" aria-labelledby="account-payment-tab">
        <div class="form-group row mt-3">
          {!! Form::label('payment_account', 'Rekening Pembayaran : ', array('class' => 'col-md-3 col-form-label')) !!}
          <div class="col-md-8">
            {!!Form::text('payment_account', null, ['class' => 'form-control'. ( $errors->has('payment_account') ? ' is-invalid' : '' ), 'id' => 'payment_account']) !!}
            {!! $errors->has('payment_account') ? '<div class="invalid-feedback">'.$errors->first('payment_account').'</div>':'' !!}
          </div>
        </div>
  
      </div>

      <div class="form-group row">
        <div class="col-md-8">
          
          {!! Form::button('Simpan', array('class' => 'btn btn-success btn-lg mr-2 ml-4', 'type' => 'submit')); !!}
          {!! Form::button('Reset', array('class' => 'btn btn-warning btn-lg mr-2', 'type' => 'reset')); !!}
        </div>
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
    <script>

      $('.select2').select2();
    </script>
@endpush
