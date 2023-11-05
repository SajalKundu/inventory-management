@extends('admin.master')
@section('title')
  Gallery
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

                                Gallery </h3>
                            <div class="card-tools">
                                <a href="{{ route('a_gallery.Add') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">SL</th>
                                        <th style="width: 10%">Numeric Name</th>
                                        <th style="width: 30%">Title</th>
                                        <th style="text-align: center; width: 20%">Image</th>
                                        <th style="text-align: center; width: 10%">Status</th>
                                        <th style="text-align: center;width: 10%">Edit</th>
                                        <th style="text-align: center;width: 10%">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gallery as $result)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $result->rank }}</td>
							            <td>{{ $result->title }}</td>


                                        <td style="text-align: center;">@if($result->image)
                                            <a href="{{ asset($result->image_path.$result->image) }}" target="_blank"><img src="{{ asset($result->image_path.$result->image) }}" width="50px" height="25px"></a>
                                            @endif
                                        </td>


                                        <td style="text-align: center;">@if($result->status)
                                            <a
                                            href="JavaScript:status('{{ route('a_gallery.Status',['id' => $result->id, 'value' => $result->status, 'status' => 'status' ]) }}')"> <img src="{{ asset('backend/images/yes.gif') }}"></a>
                                            @else
                                            <a
                                            href="JavaScript:status('{{ route('a_gallery.Status',['id' => $result->id, 'value' => $result->status, 'status' => 'status']) }}')"> <img src="{{ asset('backend/images/no.gif') }}"></a>
                                            @endif
                                        </td>

                                        <td style="text-align: center;">
                                            <a href="{{ route('a_gallery.edit', ['id' => $result->id]) }}">
                                                <img src="{{ asset('backend/images/edit.gif') }}">
                                            </a>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="JavaScript:status('{{ route('a_gallery.destroy', ['id' => $result->id]) }}')">
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
