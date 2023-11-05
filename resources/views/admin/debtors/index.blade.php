@extends('admin.master')
@section('title')
    Debtors
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
                            <h3 class="card-title">Debtors</h3>
                            <div class="card-tools">
                                <a href="{{ route('debtors.Add') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th width="25%">Name</th>
                                        <th width="25%">Company</th>
                                        <th width="10%">Due Amount</th>
                                        <th width="10%" style="text-align: center;">Image/File</th>
                                        <th width="10%" style="text-align: center;">Recovery Date</th>
                                        <th width="5%" style="text-align: center;">View</th>
                                        <th width="5%" style="text-align: center;">Edit</th>
                                        <th width="5%" style="text-align: center;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($results as $result)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $result->name }}</td>
							            <td>{{ $result->company }}</td>
							            <td>{{ $result->amount }}</td>

                                        <td style="text-align: center;">@if($result->file)
                                            <a href="{{ asset($result->path.$result->file) }}" target="_blank">View</a>
                                            @endif
                                        </td>
                                        <td style="text-align: center;">{{ \Carbon\Carbon::parse($result->recovery_date)->format('d-m-Y') }}</td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('debtors.show', ['id' => $result->id]) }}">
                                                <img src="{{ asset('backend/images/details.gif') }}">
                                            </a>
                                        </td>


                                        <td style="text-align: center;">
                                            <a href="{{ route('debtors.edit', ['id' => $result->id]) }}">
                                                <img src="{{ asset('backend/images/edit.gif') }}">
                                            </a>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="JavaScript:status('{{ route('debtors.destroy', ['id' => $result->id]) }}')">
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
