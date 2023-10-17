@extends('admin.master')
@section('title')
    Contact Us
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
				<h3 class="box-title ">Contact Us</h3>
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
            <div class="card-body">
			<form class="form-horizontal" method="post" action="{{ route('contacts.contact-us.update', ['id' => $contact_us->id ]) }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="row">
                    <div class="col-md-10 offset-md-1  fw-bold">
                        <div class="box-body">

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 control-label text-lg-right">Title:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{ $contact_us->title }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="about_company" class="col-sm-2 control-label text-lg-right">About Company:</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" id="about_company" name="about_company" rows="5" cols="30">{{ $contact_us->about_company }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 control-label text-lg-right">Company Address:</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control " id="address" name="address"  rows="5" cols="30">{{ $contact_us->address }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-sm-2 control-label text-lg-right">Phone:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{ $contact_us->phone }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="mobile" class="col-sm-2 control-label text-lg-right">Mobile:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="" value="{{ $contact_us->mobile }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 control-label text-lg-right">Email:</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{ $contact_us->email }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="fax" class="col-sm-2 control-label text-lg-right">Fax:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="fax" name="fax" placeholder="" value="{{ $contact_us->fax }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="details" class="col-sm-2 control-label text-lg-right">Details:</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="details" name="details">{{ $contact_us->details }}</textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace("details", {height:"200", width:"100%",allowedContent:true});
                                    </script>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="map" class="col-sm-2 control-label text-lg-right">Map:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="map" id="map" cols="10" rows="5">{{ $contact_us->map }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 control-label text-lg-right">Image:</label>
                                <div class="col-sm-5 pl-0">
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" id="banner" name="banner" >
                                         &nbsp; &nbsp; &nbsp;
                                    </div>
                                    @if($contact_us->banner)
                                        <div class="col-sm-12">
                                            <div class="col-sm-8">
                                                <input type="checkbox" class="flat-blue" name="del_banner" value="1">&nbsp;Delete Current Image
                                            </div>
                                            <div class="col-sm-4">
                                                <a href="{{ url($contact_us->banner_path.$contact_us->banner) }}" target="_blank">
                                                    <img class="img img-responsive" src="{{ asset($contact_us->banner_path.$contact_us->banner) }}" style="height: 100px; width: 100px;" >
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="box-footer">
                            <div class="col-sm-12">
                                <div class="col-sm-4 offset-md-2">
                                    <button type="submit" class="btn btn-info text-light"> Update </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<br>
			</form>
            </div>

		</div>
	</div>
</div>
@endsection
@section('scripts')
@endsection
