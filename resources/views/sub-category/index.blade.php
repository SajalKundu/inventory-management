@extends('admin.master')
@section('title')
   Sub Category
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
                                <a href="{{ route('admin.category.index') }}">
                                    {{ $category->name }}
                                </a>
                                >
                                Sub Category
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.sub-category.create', ['id' => $category->id]) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i>
                                    Add New
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subCategories as $subcategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td style="text-align: center;">
                                            @if ($subcategory->status == 'active')
                                                <a href="Javascript:status('{{ route('admin.sub-category.change-status', ['id' => $subcategory->id, 'status' => 'inactive']) }}')">
                                                    <img src="{{ asset('backend/images/yes.gif') }}">
                                                </a>
                                            @else
                                                <a href="Javascript:status('{{ route('admin.sub-category.change-status', ['id' => $subcategory->id, 'status' => 'active']) }}')"">
                                                    <img src="{{ asset('backend/images/no.gif') }}">
                                                </a>
                                            @endif
                                        </td>

                                        <td style="text-align: center;">
                                            <a href="{{ route('admin.sub-category.edit', ['id' => $subcategory->id]) }}">
                                                <img src="{{ asset('backend/images/edit.gif') }}">
                                            </a>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="JavaScript:status('{{ route('admin.sub-category.destroy', ['id' => $subcategory->id]) }}')">
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
