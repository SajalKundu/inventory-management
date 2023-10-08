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
                                <h3 class="card-title">Sale Data</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.sale.create') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus"></i>
                                        Add New
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
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Invoice No</th>
                                            <th>Customer Name</th>
                                            <th>Total Amount</th>
                                            <th>Payable Amount</th>
                                            <th>Due Amount</th>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $sale)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{ route('admin.sale.print', ['id' => $sale->invoice_id]) }}">
                                                        {{ $sale->invoice_id }}
                                                    </a>
                                                </td>
                                                <td>{{ $sale->customer->name }}</td>
                                                <td>{{ $sale->grand_total_amount }}</td>
                                                <td>{{ $sale->advanced_amount }}</td>
                                                <td>{{ ($sale->due_amount == null) ? 0 : $sale->due_amount }}</td>

                                                <td style="text-align: center;">
                                                    <a href="{{ route('admin.sale.show', ['id' => $sale->id]) }}">
                                                        <img src="{{ asset('backend/images/details.gif') }}">
                                                    </a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a
                                                        href="JavaScript:status('{{ route('admin.sale.destroy', ['id' => $sale->id]) }}')">
                                                        <img src="{{ asset('backend/images/del.gif') }}">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    </script>
@endsection
