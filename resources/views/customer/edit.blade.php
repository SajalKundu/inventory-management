@extends('admin.master')
@section('title')
    Customer Edit
@endsection
@section('additional_admin_css')
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-2">
                        <div class="card-header">

                            <h3 class="card-title">
                                <a href="{{ route('admin.customer.index') }}" class="btn btn-warning btn-sm mr-2">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>
                                Edit Customer
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ $error }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                            <form action="{{ route('admin.customer.update', ['id' => $customer->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label text-lg-right">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name"  value="{{ $customer->name }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label text-lg-right">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email"  value="{{ $customer->email }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mobile" class="col-sm-2 col-form-label text-lg-right">Mobile</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" value="{{ $customer->mobile }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label text-lg-right">Address</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control" id="address" name="address" rows="3">{{ $customer->address }}</textarea>
                                        {{-- <script type="text/javascript">
                                            CKEDITOR.replace("address",
                                            {
                                                height:"200",
                                                width:"100%",
                                                allowedContent: true,
                                            });
                                        </script> --}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label text-lg-right">Status</label>
                                    <div class="col-sm-2">
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="active" @if($customer->status == 'active') selected @endif>Active</option>
                                            <option value="inactive" @if($customer->status == 'inactive') selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="home_status" class="col-sm-2 col-form-label text-lg-right"></label>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
@endsection
@section('additional_admin_js')
@endsection
