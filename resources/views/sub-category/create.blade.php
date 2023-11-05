@extends('admin.master')
@section('title')
    Sub Category Create
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
                                <a href="{{ route('admin.sub-category.index', ['id' => $category->id]) }}" class="btn btn-warning btn-sm mr-2">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>
                                Create Sub Category
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
                            <form action="{{ route('admin.sub-category.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="category_id" value="{{ $category->id }}">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label text-lg-right">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Sub Category Name" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="model_name" class="col-sm-2 col-form-label text-lg-right">Model Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="model_name" class="form-control" id="model_name" placeholder="Model Name" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="part_number" class="col-sm-2 col-form-label text-lg-right">Part No</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="part_number" class="form-control" id="part_number" placeholder="Part No" >
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label text-lg-right">Status</label>
                                    <div class="col-sm-2">
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="home_status" class="col-sm-2 col-form-label text-lg-right"></label>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-success">Save</button>
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
