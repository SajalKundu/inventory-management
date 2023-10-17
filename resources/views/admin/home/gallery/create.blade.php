@extends('admin.master')
@section('title')
    Gallery Create
@endsection
@section('additional_admin_css')
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container">
            @if ($errors->any())
			<div class="col-sm-12 text-center">
				<br>
				@foreach ($errors->all() as $error)
				<div style="color: red;">{{ $error }}</div>
				@endforeach
				<br>
			</div>
			@endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-2">
                        <div class="card-header">

                            <h3 class="card-title">
                                <a href="{{ route('a_gallery.index') }}" class="btn btn-warning btn-sm mr-2">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>
                                Create Gallery
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('a_gallery.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="rank" class="col-sm-2 control-label text-lg-right">Rank</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="rank" placeholder="" name="rank" required
                                            value="{{ old('rank') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label text-lg-right">Title</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="title" class="form-control" id="title" placeholder="title" required>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 control-label text-lg-right">Image <br> <span  style="color: red; font-size: 12px;">Image size 600*400</span></label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" id="" name="image">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 control-label text-lg-right">Status</label>
                                    <div class="col-sm-2">
                                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                            tabindex="-1" aria-hidden="true" name="status">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
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
