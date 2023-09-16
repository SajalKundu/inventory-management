@extends('admin.master')
@section('title')
   Creditors
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
                            <h3 class="card-title">Creditors</h3>
                            <div class="card-tools">
                                <a href="{{ route('creditors.Add') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th style="text-align: center;">Image/File</th>
                                        <th style="text-align: center;">Payment Date</th>
                                        <th style="text-align: center;">View</th>
                                        <th style="text-align: center;">Edit</th>
                                        <th style="text-align: center;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($results as $result)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $result->name }}</td>
							            <td>{{ $result->company }}</td>

                                        <td style="text-align: center;">@if($result->file)
                                            <a href="{{ asset($result->path.$result->file) }}" target="_blank">View</a>
                                            @endif
                                        </td>
                                        <td style="text-align: center;">{{ \Carbon\Carbon::parse($result->payment_date)->format('d F Y') }}</td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('creditors.show', ['id' => $result->id]) }}">
                                                <img src="{{ asset('backend/images/details.gif') }}">
                                            </a>
                                        </td>


                                        <td style="text-align: center;">
                                            <a href="{{ route('creditors.edit', ['id' => $result->id]) }}">
                                                <img src="{{ asset('backend/images/edit.gif') }}">
                                            </a>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="JavaScript:status('{{ route('creditors.destroy', ['id' => $result->id]) }}')">
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
