@extends('admin.layouts.app')

@section('title', 'Produk')

@section('card-title', 'Daftar Produk')

@section('content')
  
  <a href="{{ route('product.create') }}" class="btn btn-primary ml-2" title="Tambah Produk Baru"><i class="fa fa-plus"></i> Tambah</a>
  <a href="{{ route('product.export') }}" class="btn btn-success ml-2" title="Export to Excel File"><i class="fa fa-file-excel-o"></i> Export</a>
  
  <table id="datatable" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Nama Produk</th>
        <th>Kategori</th>
        <th>Tag</th>
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
        <th>Tag</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </tfoot>
  </table>
       
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
            ajax: "{{ route('table.product') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'image', name: 'image', 
                render: function( data, type, row, meta){
                  return '<img src="{{asset('uploads/product/')}}/'+data+'" class ="img img-responsive img-thumbnail" alt="'+data+'" width="60">'
                }},
                {data: 'name', name: 'name'},
                {data: 'category', name: 'category',
                render: function(data, type, row, meta){
                  return '<span class="badge badge-primary">'+data+'</span>'
                }},
                {data: 'tag', name: 'tag'},
                {data: 'price', name: 'price', render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp ' )},
                {data: 'stock', name: 'stock', render: $.fn.dataTable.render.number( '.', '.', 0, '' )},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action'}
            ]
        });
    </script>
@endpush

  