@extends('admin.layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
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
          <h3 class="card-title">Daftar Kategori</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <a href="{{ route('category.create') }}" class="btn btn-primary ml-2 modal-show" title="Tambah Kategori Baru"><i class="fa fa-plus"></i> Tambah</a>
          <a href="{{ route('category.create') }}" class="btn btn-success ml-2 modal-show" title="Export to Excel File"><i class="fa fa-file-excel-o"></i> Export</a>
          
          <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Slug Kategori</th>
                  <th>Urutan</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Slug Kategori</th>
                  <th>Urutan</th>
                  <th></th>
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
            processing: true,
            serverSide: true,
            searching: false,
            lengthChange: false,
            ajax: "{{ route('table.category') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'category_name', name: 'category_name'},
                {data: 'category_slug', name: 'category_slug'},
                {data: 'sort', name: 'sort'},
                {data: 'action', name: 'action'}
            ]
        });
    </script>
@endpush

  