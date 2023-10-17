@extends('admin.master')
@section('title')
    User Add
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
                                    <a href="{{ route('a_userlist') }}" class="btn btn-warning btn-sm mr-2">
                                        <i class="fas fa-arrow-left"></i>
                                        Back
                                    </a>
                                    Add New USER
                                </h3>
                            </div>
                            <div class="card-body">

                                <form class="form-horizontal" method="post" action="{{ route('a_userAdd') }}"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="box-body">

                                        <div class="form-group row">
                                            <label for="title" class="col-sm-2 control-label text-lg-right">Name</label>
                                            <div class="col-sm-6">
                                                <input type=text name="name" required value="{{ old('name') }}"
                                                    maxlength="50" size=50 class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="title" class="col-sm-2 control-label text-lg-right">Email</label>
                                            <div class="col-sm-6">
                                                <input type=text name="email" required value="{{ old('email') }}"
                                                    maxlength="250" size=86 class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="title"
                                                class="col-sm-2 control-label text-lg-right">Password</label>
                                            <div class="col-sm-4">
                                                <input type="password" name="password" required value=""
                                                    maxlength="15" minlength="6" size=50 class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="title" class="col-sm-2 control-label text-lg-right">Confirm
                                                Password</label>
                                            <div class="col-sm-4">
                                                <input id="password-confirm" type="password" maxlength="250" size=50
                                                    class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputPassword3"
                                                class="col-sm-2 control-label text-lg-right">Image</label>
                                            <div class="col-sm-4">
                                                <input type="file" size=50 class="form-control" name="image">
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="inputPassword3"
                                                class="col-sm-2 control-label text-lg-right">Status</label>
                                            <div class="col-sm-2">
                                                <select class="form-control select2 select2-hidden-accessible"
                                                    style="width: 100%;" tabindex="-1" aria-hidden="true" name="status">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="home_status" class="col-sm-2 col-form-label text-lg-right"></label>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                    <br>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
