@extends('admin.master')
@section('title')
    Product Edit
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
                                <a href="{{ route('admin.product.index') }}" class="btn btn-warning btn-sm mr-2">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>
                                Edit Product
                            </h3>
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
                            <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="category_id" class="col-sm-2 col-form-label text-lg-right">Category</label>
                                    <div class="col-sm-4">
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="sub_category_id" class="col-sm-2 col-form-label text-lg-right">Sub Category</label>
                                    <div class="col-sm-4">
                                        <select name="sub_category_id" id="sub_category_id" class="form-control" required></select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label text-lg-right">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Product Name" value="{{ $product->name }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="details" class="col-sm-2 col-form-label text-lg-right">Details</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="details" id="details" cols="15" rows="5">{{ $product->details }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-sm-2 col-form-label text-lg-right">Price</label>
                                    <div class="col-sm-6">
                                        <input type="number" name="price" class="form-control" id="price" placeholder="Product price" required value="{{ $product->price }}">
                                    </div>
                                </div>

                                {{--  <div class="form-group row">
                                    <label for="available_quantity" class="col-sm-2 col-form-label text-lg-right">Quantity</label>
                                    <div class="col-sm-6">
                                        <input type="number" name="available_quantity" class="form-control" id="available_quantity" placeholder="Quantity" required value="{{ $product->available_quantity }}">
                                    </div>
                                </div>  --}}

                                <div class="form-group row">
                                    <label for="image" class="col-sm-2 col-form-label text-lg-right">Image</label>
                                    <div class="col-sm-4">
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>
                                </div>
                                @if($product->image != null)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="checkbox" name="del_image" id="del_image" value="1">
                                            <label for="del_image">Delete Image</label>
                                            &nbsp;&nbsp;&nbsp;
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ asset($product->image_path.$product->image) }}" target="_blank">
                                                <img src="{{ asset($product->image_path.$product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                @endif


                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label text-lg-right">Status</label>
                                    <div class="col-sm-2">
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="active" @if($product->status == 'active') selected @endif>Active</option>
                                            <option value="inactive" @if($product->status == 'inactive') selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="home_status" class="col-sm-2 col-form-label text-lg-right"></label>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
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

    var category_id = '{{ $product->category_id }}';
    var sub_category_id = '{{ $product->sub_category_id }}';
    var url = '{{ route("sub-category-list") }}';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            category_id: category_id
        },
        success: function(response){
            if(response.status == 'success'){
                var html = '';
                $.each(response.sub_categories, function(key, value){
                    if(sub_category_id == value.id){
                        html += '<option value="'+value.id+'" selected>'+value.name+'</option>';
                    }else{
                        html += '<option value="'+value.id+'">'+value.name+'</option>';
                    }
                });
                $('#sub_category_id').html(html);
            }
        }
    });


    $(document).ready(function(){
        $('#category_id').change(function(){
            var category_id = $(this).val();
            var url = '{{ route("sub-category-list") }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    category_id: category_id
                },
                success: function(response){
                    if(response.status == 'success'){
                        var html = '';
                        $.each(response.sub_categories, function(key, value){
                            html += '<option value="'+value.id+'">'+value.name+'</option>';
                        });
                        $('#sub_category_id').html(html);
                    }
                }
            });
        });
    });
</script>
@endsection
