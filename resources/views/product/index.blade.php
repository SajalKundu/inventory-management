@extends('admin.master')
@section('title')
    Stocks
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
                                <h3 class="card-title"> Stocks</h3>
                                <div class="card-tools">
                                    <h2 class="btn btn-success">Total Buy Price: {{ $total_buy_price }}</h2>
                                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-sm">
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
                                            <th width="5%">SL.</th>
                                            <th width="20%">Items</th>
                                            <th width="10%">Buy Price</th>
                                            <th width="10%">Sale Price</th>
                                            <th width="10%">In Stock</th>
                                            <th width="15%">Add Qty.</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">Edit</th>
                                            <th width="10%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->sale_price }}</td>
                                                <td>{{ $product->available_quantity }}</td>
                                                <td style="text-align: center;">
                                                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal-{{ $product->id }}">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                    <div class="modal fade" id="myModal-{{ $product->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Add Stock</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <form action="{{ route('admin.product.add-stock') }}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                        <div class="form-group row">
                                                                            <label for="buy_price">Total Buy Price</label>
                                                                            <input type="number" class="form-control" name="buy_price" id="buy_price" required>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="available_quantity">Quantity</label>
                                                                            <input type="number" class="form-control" name="available_quantity" id="available_quantity" required>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="button"></label>
                                                                            <button type="submit" class="btn btn-success btn-block btn-sm">Add</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModalMinus-{{ $product->id }}">
                                                        <i class="fas fa-minus"></i>
                                                    </a>
                                                    <div class="modal fade" id="myModalMinus-{{ $product->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Sub Stock</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">&times;</button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <form action="{{ route('admin.product.sub-stock') }}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                        <div class="form-group row">
                                                                            <label for="available_quantity">Quantity</label>
                                                                            <input type="number" class="form-control" name="available_quantity" id="available_quantity" required>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="button"></label>
                                                                            <button type="submit" class="btn btn-success btn-block btn-sm">Sub</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('admin.product.view-stock', ['id' => $product->id]) }}" class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($product->status == 'active')
                                                        <a
                                                            href="Javascript:status('{{ route('admin.product.change-status', ['id' => $product->id, 'status' => 'inactive']) }}')">
                                                            <img src="{{ asset('backend/images/yes.gif') }}">
                                                        </a>
                                                    @else
                                                        <a
                                                            href="Javascript:status('{{ route('admin.product.change-status', ['id' => $product->id, 'status' => 'active']) }}')"">
                                                            <img src="{{ asset('backend/images/no.gif') }}">
                                                        </a>
                                                    @endif
                                                </td>

                                                <td style="text-align: center;">
                                                    <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}">
                                                        <img src="{{ asset('backend/images/edit.gif') }}">
                                                    </a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a
                                                        href="JavaScript:status('{{ route('admin.product.destroy', ['id' => $product->id]) }}')">
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
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    </script>
@endsection
