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
				<h3 class="box-title ">Comapny Details</h3>
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
			<form class="form-horizontal" method="post" action="{{ route('contacts.company-details.update', ['id' => $company_details->id ]) }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="row">
                    <div class="col-md-10 offset-md-1  fw-bold">
                        <div class="box-body">

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 control-label text-lg-right">Company Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{ $company_details->title }}">
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 control-label text-lg-right">Company Address:</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control " id="address" name="address"  rows="5" cols="30">{{ $company_details->address }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-sm-2 control-label text-lg-right">Phone:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{ $company_details->phone }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="mobile" class="col-sm-2 control-label text-lg-right">Mobile:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="" value="{{ $company_details->mobile }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 control-label text-lg-right">Email:</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{ $company_details->email }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="label" class="col-sm-2 control-label text-lg-right">label :</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control " id="label" name="label"  rows="5" cols="30">{{ $company_details->label }}</textarea>
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
