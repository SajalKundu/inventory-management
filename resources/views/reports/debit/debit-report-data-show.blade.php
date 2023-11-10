@extends('admin.master')
@section('title')
    Debtors Report
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
                                <h3 class="card-title">
                                    <a href="{{ route('admin.report.debtor.index') }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-angle-left"></i>
                                        Back
                                    </a>
                                    Debtors Report
                                </h3>
                                <div class="card-tools">
                                    @if(count($debtors) > 0)
                                    <a href="{{ route('admin.report.debtor.debtor-report-download', ['start_date' => $start_date, 'end_date' =>$end_date]) }}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-download"></i>
                                    </a>
                                    @endif
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
                                @if(count($debtors) > 0)
                                <div class="table-responsive">
                                    <h3>Debtors Reports</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sl.</th>
                                                <th>Name</th>
                                                <th>Company</th>
                                                <th>Amount</th>
                                                <th>Items</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                                <th>Deal Date</th>
                                                <th>Recovery Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($debtors as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->company }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>{!! $item->details !!}</td>
                                                <td>{{ $item->mobile }}</td>
                                                <td>{!! $item->address !!}</td>
                                                <td>
                                                    @if($item->deal_date)
                                                        {{ Carbon\Carbon::parse($item->deal_date)->format('Y-m-d') }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($item->recovery_date)
                                                        {{ Carbon\Carbon::parse($item->recovery_date)->format('Y-m-d') }}
                                                    @endif
                                                </td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                    <div class="alert alert-danger" role="alert">
                                        <h2 class="text-center">No Data Found</h2>
                                    </div>
                                @endif
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
                "format": 'yyyy-mm-dd',
                'autoclose': true,
                'clearBtn': true,
                'theme': 'bootstrap4',
                'todayHighlight': true,

            });

            $('#reservationdate1').datepicker({
                "format": 'yyyy-mm-dd',
                'autoclose': true,
                'clearBtn': true,
                'theme': 'bootstrap4',
                'todayHighlight': true,
            });
        });
    </script>
@endsection
