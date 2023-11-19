@extends('admin.master')
@section('title')
   Slider
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
                            <h3 class="card-title">Slider</h3>
                            <div class="card-tools">
                                <a href="{{ route('a_slider.Add') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        {{-- <th>SL</th> --}}
                                        <th width="5%">Rank</th>
                                        <th width="50%">Title</th>
                                        <th width="15%" style="text-align: center;">Image</th>
                                        <th width="10%" style="text-align: center;">Status</th>
                                        <th width="10%" style="text-align: center;">Edit</th>
                                        <th  width="10%"style="text-align: center;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                    <tr>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        <td>{{ $slider->rank }}</td>
							            <td>{{ $slider->title }}</td>


                                        <td style="text-align: center;">@if($slider->image)
                                            <a href="{{ asset($slider->image_path.$slider->image) }}" target="_blank"><img src="{{ asset($slider->image_path.$slider->thumb) }}" width="50px" height="25px"></a>
                                            @endif
                                        </td>


                                        <td style="text-align: center;">@if($slider->status)
                                            <a
                                            href="JavaScript:status('{{ route('a_slider.Status',['id' => $slider->id, 'value' => $slider->status, 'status' => 'status' ]) }}')"> <img src="{{ asset('backend/images/yes.gif') }}"></a>
                                            @else
                                            <a
                                            href="JavaScript:status('{{ route('a_slider.Status',['id' => $slider->id, 'value' => $slider->status, 'status' => 'status']) }}')"> <img src="{{ asset('backend/images/no.gif') }}"></a>
                                            @endif
                                        </td>

                                        <td style="text-align: center;">
                                            <a href="{{ route('a_slider.edit', ['id' => $slider->id]) }}">
                                                <img src="{{ asset('backend/images/edit.gif') }}">
                                            </a>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="JavaScript:status('{{ route('a_slider.destroy', ['id' => $slider->id]) }}')">
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
