@extends('admin.master')
@section('title')
Sale Data
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
                                    <a href="{{ route('admin.sale.index') }}" class="btn btn-primary btn-sm">
                                        Back
                                    </a>
                                    Sale Data
                                </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <h3>Invoice Info</h3>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <th>Invoice No</th>
                                                <td>
                                                    <a href="{{ route('admin.sale.print', ['id' => $sale->invoice_id]) }}">
                                                        {{ $sale->invoice_id }}
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Customer Name</th>
                                                <td>{{ $sale->customer->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total Amount</th>
                                                <td>{{ $sale->grand_total_amount }}</td>
                                            </tr>
                                            <tr>
                                                <th>Payable Amount</th>
                                                <td>{{ $sale->advanced_amount }}</td>
                                            </tr>
                                            <tr>
                                                <th>Due Amount</th>
                                                <td>{{ ($sale->due_amount == null) ? 0 : $sale->due_amount}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-body">
                                <div class="table-responsive">
                                    <h3>Products Info</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>SL.</th>
                                            <th>Description</th>
                                            <th>Buy Price</th>
                                            <th>Sale Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($sale->saleProducts as $item)
                                            <tr>
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $item->product_name }}</td>
                                              <td>{{ $item->buy_price_price }}</td>
                                              <td>{{ $item->sale_price }}</td>
                                              <td>{{ $item->sale_quantity }}</td>
                                              <td>{{ $item->total_price }}</td>
                                            </tr>
                                          @endforeach
                                          <tr>
                                            <td colspan="2" style="text-align: right;">Total</td>
                                            <td>{{ $sale->saleProducts->sum('buy_price_price') }}</td>
                                            <td>
                                                {{ $sale->saleProducts->sum('sale_price') }}
                                            </td>
                                            <td></td>
                                            <td>
                                                {{ $sale->grand_total_amount }}
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="5" style="text-align: right;">Advanced</td>
                                            <td>{{ $sale->advanced_amount }}</td>
                                          </tr>

                                          <tr>
                                            <td colspan="5" style="text-align: right;">Due</td>
                                            <td>{{ ($sale->due_amount == null) ? 0 : $sale->due_amount  }}</td>
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
@endsection
