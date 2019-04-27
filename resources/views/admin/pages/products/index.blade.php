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
          <h3 class="card-title">Daftar Produk</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <a href="{{ route('product.create') }}" class="btn btn-primary ml-2" title="Tambah Produk Baru"><i class="fa fa-plus"></i> Tambah</a>
          <a href="{{ route('product.create') }}" class="btn btn-success ml-2 modal-show" title="Export to Excel File"><i class="fa fa-file-excel-o"></i> Export</a>
          
          <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Status</th>
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
            ajax: "{{ route('table.product') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'image', name: 'image', 
                render: function( data, type, row, meta){
                  return '<img src="{{asset('uploads/product/')}}/'+data+'" alt="" width="60">'
                }},
                {data: 'product_name', name: 'product_name'},
                {data: 'category', name: 'category'},
                {data: 'price', name: 'price', render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp ' )},
                {data: 'stock', name: 'stock', render: $.fn.dataTable.render.number( '.', '.', 0, '' )},
                {data: 'product_status', name: 'product_status'},
                {data: 'action', name: 'action'}
            ]
        });

        $( window ).on('load', function() {
            $('table').find('a').removeClass('modal-show');
        });
        
    </script>
@endpush

  