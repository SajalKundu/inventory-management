@extends('admin.master')
@section('title')
   Debtors Create
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
                                    <a href="{{ route('debtors.index') }}" class="btn btn-warning btn-sm mr-2">
                                        <i class="fas fa-arrow-left"></i>
                                        Back
                                    </a>
                                    Create Debtor
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('debtors.store') }}" method="POST" class="form-horizontal"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label text-lg-right">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="company" class="col-sm-2 col-form-label text-lg-right">Company</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="company" class="form-control" id="company"
                                                placeholder="company" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="amount" class="col-sm-2 col-form-label text-lg-right">Amount</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="amount" class="form-control" id="amount"
                                                placeholder="amount" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label text-lg-right">Email</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="email" class="form-control" id="email"
                                                placeholder="email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label text-lg-right">Phone</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="phone" class="form-control" id="phone"
                                                placeholder="phone">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="mobile" class="col-sm-2 col-form-label text-lg-right">Mobile</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="mobile" class="form-control" id="mobile"
                                                placeholder="mobile">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="details" class="col-sm-2 col-form-label text-lg-right">Details</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" id="details" name="details"></textarea>
                                            <script type="text/javascript">
                                                CKEDITOR.replace("details", {
                                                    height: "300",
                                                    width: "100%",
                                                    allowedContent: true,
                                                });
                                            </script>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label text-lg-right">Address</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" id="address" name="address"></textarea>
                                            <script type="text/javascript">
                                                CKEDITOR.replace("address", {
                                                    height: "300",
                                                    width: "100%",
                                                    allowedContent: true,
                                                });
                                            </script>
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 control-label text-lg-right">File /
                                            Image</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="file" name="file">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-lg-right">Deal Date</label>
                                        <div class="col-sm-6">
                                            <input type="date" name="deal_date" class="form-control" id="deal_date"
                                                placeholder="Deal Date" value="{{ date('Y-m-d') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="recovery_date" class="col-sm-2 col-form-label text-lg-right">Recovery Date</label>
                                        <div class="col-sm-6">
                                            <input type="date" name="recovery_date" class="form-control"
                                                id="recovery_date" placeholder="Recovery Date" required>
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
