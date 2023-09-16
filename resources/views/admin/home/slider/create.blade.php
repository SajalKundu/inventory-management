@extends('admin.master')
@section('title')
    Slider Create
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
                                <a href="{{ route('a_slider.index') }}" class="btn btn-warning btn-sm mr-2">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>
                                Create Slider
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('a_slider.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                                    <label for="morelink" class="col-sm-2 col-form-label text-lg-right">Know More</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="morelink" class="form-control" id="morelink" placeholder="morelink">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="details" class="col-sm-2 col-form-label text-lg-right">Details</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="details" name="details"></textarea>
                                        <script type="text/javascript">
                                            CKEDITOR.replace("details",
                                            {
                                                height:"200",
                                                width:"100%",
                                                allowedContent: true,
                                            });
                                        </script>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 control-label text-lg-right">Desktop Banner</label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" id="" name="image">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 control-label text-lg-right">Mobile Banner
                                        <br>
                                        <span  style="color: red; font-size: 12px;">Banner size 700*450</span></label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" id="" name="mobile_images">
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
