@extends('admin.master')
@section('title')
    Sale Create
@endsection
@section('additional_admin_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" />
<link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<style>
    .removebtn{
        margin-top: 32px;
    }
</style>
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
                                <a href="{{ route('admin.sale.index') }}" class="btn btn-warning btn-sm mr-2">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>
                                <a href="javascript:void(0)" class="btn btn-info btn-sm mr-2"  data-toggle="modal" data-target="#customer-add">
                                    <i class="fas fa-plus"></i>
                                    Add Customer
                                </a>


                                <div class="modal fade" id="customer-add">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Create Customer</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="{{ route('admin.customer.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                                    @csrf

                                                    <input type="hidden" name="from_coming" value="sale">

                                                    <div class="form-group row">
                                                        <label for="name" class="col-sm-2 col-form-label text-lg-right">Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="email" class="col-sm-2 col-form-label text-lg-right">Email</label>
                                                        <div class="col-sm-8">
                                                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="mobile" class="col-sm-2 col-form-label text-lg-right">Mobile</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Mobile">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="address" class="col-sm-2 col-form-label text-lg-right">Address</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" class="form-control" id="address" name="address"></textarea>

                                                        </div>
                                                    </div>



                                                    <div class="form-group row">
                                                        <label for="status" class="col-sm-2 col-form-label text-lg-right">Status</label>
                                                        <div class="col-sm-2">
                                                            <select name="status" id="status" class="form-control" required>
                                                                <option value="active">Active</option>
                                                                <option value="inactive">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="home_status" class="col-sm-2 col-form-label text-lg-right"></label>
                                                        <div class="col-sm-4">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                Create Sale
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
                            <form action="{{ route('admin.sale.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="invoice_id">Invoice No</label>
                                            <input type="text" name="invoice_id" class="form-control" id="invoice_id" placeholder="Invoice No" value="{{ $sale_no }}" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="invoice_id">Invoice Date</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="invoice_date" required autofocus="off" autocomplete="off" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="invoice_id">Customer</label>
                                            <select name="customer_id" id="customer_id" class="select2 form-control" required>
                                                <option value="">Select Customer</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="mobile">Mobile No</label>
                                            <input type="text" name="mobile" class="form-control" id="customer_mobile" placeholder="Mobile No" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="customer_address">Customer Address</label>
                                            <textarea class="form-control" name="customer_address" id="customer_address" cols="15" rows="5" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-success btn-sm" id="addBtn" onclick="addMoreRows(this.form);">
                                            <i class="fas fa-plus"></i> Add New Row
                                        </button>
                                    </div>
                                </div>


                                <div class="row" id="registration1">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="product_id">Product</label>
                                            <select name="product_id[]" id="product_id" serial="1" class="product_id form-control" required>
                                                <option value="">Select Product</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="sale_price">Sale Price</label>
                                            <input type="number" name="sale_price[]" serial="1" class="form-control sale_price" id="sale_price_1" placeholder="Sale Price" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" name="quantity[]" serial="1" class="av_quantity form-control" id="quantity_1" placeholder="Quantity" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="sale_quantity">Sale Quantity</label>
                                            <input type="number" name="sale_quantity[]" serial="1" class="sale_quantity form-control" id="sale_quantity_1" placeholder="Sale Quantity">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="total_price">Total Price</label>
                                            <input type="number" name="total_price[]" serial="1" class="form-control product_total_price" id="total_price_1" placeholder="Total Price" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button type="button" class="removebtn btn btn-danger btn-sm" id="removeBtn" serial="1">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="addedRows"></div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="total_amount">Total Amount</label>
                                            <input type="number" name="grand_total_amount" class="total_amount form-control" id="total_amount" placeholder="Total Amount" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="advanced_amount">Payable Amount</label>
                                            <input type="number" name="advanced_amount" class="form-control" id="advanced_amount" placeholder="Advanced  Amount">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="due_amount">Due Amount</label>
                                            <input type="number" name="due_amount" class="form-control" id="due_amount" placeholder="Due Amount">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="home_status"></label>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-success">Sale</button>
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
<!-- Select2 -->
<script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function () {
            $('#reservationdate').datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                autoClose: true,
            });

            $('.select2').select2({
                theme: 'bootstrap4'
            });
        });

        $('#customer_id').change(function(){
            var customer_id = $(this).val();
            var url = '{{ route("admin.sale.customer-detail") }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    customer_id: customer_id
                },
                success: function(response){
                    if(response.status == 'success'){
                        $('#customer_mobile').val(response.customer.mobile);
                        $('#customer_address').val(response.customer.address);
                    }
                }
            });
        });

        $(document).on('change','.product_id',function(){

            var product_id = $(this).val();

            var serial = $(this).attr('serial');
              $.ajax({
                  headers:{
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                   type:"POST",
                   url:"{{ route('admin.sale.get-product-detail') }}",
                   data: {
                      product_id : product_id
                   },
                   success : function(results) {
                      $("#sale_price_"+serial).val(results.product.sale_price);
                      $("#quantity_"+serial).val(results.product.available_quantity);
                   }
              });
         });

        var rowCount = 1;
        function addMoreRows(frm) {
            var cures = <?php echo json_encode( $products) ?>;
            rowCount ++;
            var html = '<div class="row" id="registration'+rowCount+'"><div class="col-md-2"><div class="form-group "><label for="product_id[]" class="control-label">Product</label><select class="form-control product_id" serial="'+rowCount+'" id="product_id[]" name="product_id[]"><option value="">Select Product</option><?php foreach($products as $key=>$value){ ?><option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option> <?php } ?></select></div></div><div class="col-md-2"><div class="form-group "><label for="sale_price[]" class="control-label">Sale Price</label><input class="form-control sale_price" id="sale_price_'+rowCount+'" name="sale_price[]" type="text"  placeholder="Sale Price"></div></div><div class="col-md-2"><div class="form-group "><label for="quantity" class="control-label">Quantity</label><input class="form-control quantity" serial="'+rowCount+'" name="quantity[]" type="text" id="quantity_'+rowCount+'" placeholder="Quantity" readonly></div></div><div class="col-md-2"><div class="form-group"><label for="sale_quantity">Sale Quantity</label><input type="number" name="sale_quantity[]" serial="'+rowCount+'" class="sale_quantity form-control" id="sale_quantity_'+rowCount+'" placeholder="Sale Quantity"></div></div><div class="col-md-3"><div class="form-group "><label for="total_price[]" class="control-label">Total Price</label><input class="form-control product_total_price" readonly name="total_price[]" type="text" id="total_price_'+rowCount+'"></div></div><div class="col-md-1"><button type="button" class="removebtn btn btn-danger btn-sm" serial="'+rowCount+'" title="'+rowCount+'"> <i class="fas fa-minus"></i></button></div></div>';

            $('#addedRows').append(html);
        }

        $(document).on('click','.removebtn',function(){
            var deleteRowSerial = $(this).attr('serial');
            $("#registration"+deleteRowSerial).remove();
            total_cal();
         });

        var sum = 0;
        $(document).on('keyup', '.sale_quantity', function(){
            var serial = $(this).attr('serial');
            var sale_price =  $('#sale_price_'+serial).val();
            if(sale_price == '' || sale_price == null){
                alert('Please enter sale price first');
                $("#sale_price_"+serial).focus();
                return false;
            }
            var sale_quantity = $(this).val();
            var total_amount = sale_price*sale_quantity;
             $("#total_price_"+serial).val(total_amount);
             total_cal();
        });

        $(document).on('keyup', '.sale_price', function(){

            var serial = $(this).attr('serial');
            var sale_quantity = $("#sale_quantity_"+serial).val();
            var sale_price =  $(this).val();


            var total_amount = sale_price*sale_quantity;
             $("#total_price_"+serial).val(total_amount);
             total_cal();
        });

        $(document).on('keyup', '#advanced_amount', function(){
            cal_due_amount();
       });


       function cal_due_amount()
         {
            var grand_price = $('#total_amount').val();
            var advanced = $("#advanced_amount").val();
            var due = grand_price-advanced;
            $("#due_amount").val(due);
         }

         function total_cal(){
            sum = 0;
            $(".product_total_price").each(function() {
                sum += Number($(this).val());
            });
            $('.total_amount').val(sum);
            cal_due_amount();
        }
    </script>
@endsection
