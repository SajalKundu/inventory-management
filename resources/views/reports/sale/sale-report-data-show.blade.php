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
                                <h3 class="card-title">
                                    <a href="{{ route('admin.report.sale.index') }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-angle-left"></i>
                                        Back
                                    </a>
                                    Sale Report
                                </h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.report.sale.sale-report-download',['start_date' => $start_date, 'end_date' => $end_date]) }}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-download"></i>
                                    </a>
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
                                @if(count($sales) > 0)
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
                                            <th>Sale Date</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($sales as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->sale->customer_name ?? '' }}</td>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->buy_price_price }}</td>
                                                <td>{{ $item->sale_price }}</td>
                                                <td>{{ $item->sale_quantity }}</td>
                                                <td>{{ $item->total_price }}</td>
                                                <td>
                                                    @if($item->created_at != null)
                                                        {{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                                                    @endif
                                                </td>
                                            </tr>
                                          @endforeach
                                          <tr>
                                            <td colspan="3" style="text-align: right;">Total</td>
                                            <td>{{ $sales->sum('buy_price_price') }}</td>
                                            <td>
                                                {{ $sales->sum('sale_price') }}
                                            </td>
                                            <td></td>
                                            <td>
                                                {{ $sales->sum('total_price') }}
                                            </td>
                                            <td></td>
                                          </tr>

                                        </tbody>
                                    </table>
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
