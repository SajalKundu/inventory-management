@extends('admin.master')
@section('title')
    Sale Report
@endsection
@section('additional_admin_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" />
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
                                <h3 class="card-title">Sale Report</h3>
                                <div class="card-tools">
                                    <form action="{{ route('admin.report.sale.sale-report-show') }}" method="POST" autocomplete="off">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="start_date" required autofocus="off" autocomplete="off" value="{{ $start_date }}" />
                                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ml-2">
                                                <div class="form-group">
                                                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" name="end_date" required autofocus="off" autocomplete="off" value="{{ $end_date }}"  />
                                                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary btn-sm" id="search">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
                                <div class="table-responsive">
                                    <h3>Products Info</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>SL.</th>
                                            <th>Customer</th>
                                            <th>Description</th>
                                            <th>Buy Price</th>
                                            <th>Sale Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td colspan="6" class="text-center"><strong>No Data Found</strong></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
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
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $(function () {
            $('#reservationdate').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                autoClose: true,
            });

            $('#reservationdate1').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                autoClose: true,
            });
        });
    </script>
@endsection
