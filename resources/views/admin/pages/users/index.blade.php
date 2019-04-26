{{-- <form action="{{ route('users.search') }}" method="POST">
@csrf
<div class="form-group">
<input id="user_id" class="form-control" name="user_id" type="text" value="{{ old('user_id') }}" placeholder="User ID">
</div>
<input class="btn btn-info" type="submit" value="Search">
</form> --}}

@extends('admin.layouts.app')


@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
          <h3 class="card-title">User Search</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body">
			<h3 class="page-title text-center">Search for user by ID</h3>

        	@if (session('error'))
				<div class="alert alert-danger">{{ session('error') }}</div>
			@endif
			  
			{!! Form::open(['route' => ['users.search'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}

				<div class="form-group">
					{!!Form::text('user_id', null, ['class' => 'form-control form-control-lg'. ( $errors->has('user_id') ? ' is-invalid' : '' ), 'id' => 'user_id', 'placeholder' => 'User ID', 'value' => old('user_id')]) !!}
				</div>

				{!! Form::button('Search', array('class' => 'btn btn-success btn-lg mr-2', 'type' => 'submit')); !!}

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