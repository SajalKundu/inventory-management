@extends('admin.master')
@section('title')
    Slider Edit
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
                                <a href="{{ route('a_slider.index') }}" class="btn btn-warning btn-sm mr-2">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>
                                Edit Slider
                            </h3>
                        </div>
                        @if ($errors->any())
                        <div class="col-sm-12 text-center">
                            <br>
                            @foreach ($errors->all() as $error)
                            <div style="color: red;">{{ $error }}</div>
                            @endforeach
                            <br>
                        </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('a_slider.update', ['id' => $slider->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="rank" class="col-sm-2 control-label text-lg-right">Rank</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="rank" placeholder="" name="rank" required value="{{ $slider->rank }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 control-label text-lg-right">Title</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="" required value="{{ $slider->title }}">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 control-label text-lg-right">Details</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" id="details" name="details">{{ $slider->details }}</textarea>
                                        {{-- <script type="text/javascript">
                                            CKEDITOR.replace("details", {height:"200", width:"100%"});
                                        </script> --}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 control-label text-lg-right text-lg-right">Desktop Banner</label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" id="" name="image" >
                                        <input type="hidden" name="old_image" value="{{ $slider->image }}">
                                        @if($slider->image)


                                        <div class="col-sm-12">
                                            <div class="col-sm-6">
                                                <input type="checkbox" class="flat-blue" name="del_image" value="1">&nbsp;Delete Current  Image
                                            </div>
                                            <div class="col-sm-4">
                                                <img class="img img-responsive" src="{{ asset($slider->image_path.$slider->image) }}" width="100" >
                                            </div>
                                        </div>


                                        @endif

                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 control-label text-lg-right">Status</label>
                                    <div class="col-sm-2">
                                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status">
                                            <option value="1" @if($slider->status==1) {{ 'selected' }} @endif>Yes</option>
                                            <option value="0" @if($slider->status==0) {{ 'selected' }} @endif>No</option>
                                        </select>
                                    </div>
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
