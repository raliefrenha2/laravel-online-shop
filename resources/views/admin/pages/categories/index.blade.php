@extends('admin.layouts.app')

@section('title', 'Kategori')

@section('card-title', 'Daftar Kategori')

@section('content')
  
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
                {data: 'name', name: 'name'},
                {data: 'slug', name: 'slug'},
                {data: 'sort', name: 'sort'},
                {data: 'action', name: 'action'}
            ]
        });
    </script>
@endpush

  