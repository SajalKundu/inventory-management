@extends('admin.master')
@section('title')
    Customer
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
                            <h3 class="card-title">Customer > <a href="{{ route('creditors.index') }}">Creditors</a> > <a href="{{ route('debtors.index') }}">Debtors</a></h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.customer.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="10%">SL.</th>
                                        <th width="40%">Name</th>
                                        <th width="20%">Mobile</th>
                                        <th width="10%">Status</th>
                                        <th width="10%">Edit</th>
                                        <th width="10%">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>
                                            {{ $customer->mobile }}
                                        </td>
                                        <td style="text-align: center;">
                                            @if ($customer->status == 'active')
                                                <a href="Javascript:status('{{ route('admin.customer.change-status', ['id' => $customer->id, 'status' => 'inactive']) }}')">
                                                    <img src="{{ asset('backend/images/yes.gif') }}">
                                                </a>
                                            @else
                                                <a href="Javascript:status('{{ route('admin.customer.change-status', ['id' => $customer->id, 'status' => 'active']) }}')">
                                                    <img src="{{ asset('backend/images/no.gif') }}">
                                                </a>
                                            @endif
                                        </td>

                                        <td style="text-align: center;">
                                            <a href="{{ route('admin.customer.edit', ['id' => $customer->id]) }}">
                                                <img src="{{ asset('backend/images/edit.gif') }}">
                                            </a>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="JavaScript:status('{{ route('admin.customer.destroy', ['id' => $customer->id]) }}')">
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
