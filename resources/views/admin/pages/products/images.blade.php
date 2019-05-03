@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gambar Produk</h1>
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
          <h3 class="card-title">Daftar Gambar {!! $model->name !!} </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body"> 

        {!! Form::open(['route' => 'product.image.store', 
                        'method' => 'POST',
                        'class' => 'form-horizontal', 
                        'enctype' => 'multipart/form-data']) !!}

            <div class="form-group row">
              {!! Form::label('name', 'Nama Gambar : ', array('class' => 'col-md-3 col-form-label')) !!}
              <div class="col-md-8">
                {!!Form::text('name', null, ['class' => 'form-control'. ( $errors->has('name') ? ' is-invalid' : '' ), 'id' => 'name', 'placeholder' => 'Tentukan Nama Gambar Produk']) !!}
                 {!! $errors->has('name') ? '<div class="invalid-feedback">'.$errors->first('name').'</div>':'' !!}
                 {!! Form::hidden('product_id', $model->id) !!}
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
              {!! Form::label('', '', array('class' => 'col-md-3 col-form-label')) !!}
              <div class="col-md-8">
                
                {!! Form::button('Simpan', array('class' => 'btn btn-success btn-lg mr-2', 'type' => 'submit')); !!}
                {!! Form::button('Reset', array('class' => 'btn btn-warning btn-lg mr-2', 'type' => 'reset')); !!}
              </div>
            </div>

          {!! Form::close() !!}
          
          <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td> <img src="{!! asset('uploads/product/'.$model->image)  !!}" class="img img-responsive img-thumbnail" width = "60" alt=""> </td>
                    <td>{!! $model->name !!}</td>
                    <td></td>
                  </tr>
                  @php
                    {{ $no =2; }}
                  @endphp
                  @foreach ($images as $image)
                    <tr>
                      <td>{!! $no !!}</td>
                      <td> <img src="{!! asset('uploads/product/'.$image->image)  !!}" class="img img-responsive img-thumbnail" width = "60" alt=""> </td>
                      <td>{!! $image->name !!}</td>
                      <td><a href="{{ route('image.destroy', $image->id) }}" class="btn-delete" title="Hapus > {{ $image->name }}"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></i></a></td>
                    </tr>
                  @php
                    {{$no++; }}
                  @endphp
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
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
  <!-- DataTables -->
  <link rel="stylesheet" href=" {{ asset('vendor/adminlte') }}/plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href=" {{ asset('vendor/sweetalert2') }}/sweetalert2.min.css">
@endpush

@push('scripts')
    <script src=" {{ asset('vendor/adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src=" {{ asset('vendor/adminlte') }}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('vendor/sweetalert2') }}/sweetalert2.all.min.js"></script>

    <script>
      $('#datatable').DataTable({
          responsive: true,
          processing: false,
          serverSide: false,
          searching: false,
          lengthChange: false,
      });
    </script>
    
@endpush

  