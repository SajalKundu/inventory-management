@extends('admin.master')
@section('title')
   Sub Category Edit
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
                                Edit Sub Category
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('admin.sub-category.update', ['id' => $subcategory->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label text-lg-right">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Category name"  value="{{ $subcategory->name }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label text-lg-right">Status</label>
                                    <div class="col-sm-4">
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="active" @if($subcategory->status == 'active') selected @endif>Active</option>
                                            <option value="inactive" @if($subcategory->status == 'inactive') selected @endif>Inactive</option>
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
