<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ $invoice_info->invoice_id  }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/dist/css/print.css') }}">
</head>
<body>
<div id="printcontent">
  <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="company_info">
          <p id="company_name">Company Name</p>
          <p id="company_address">Company Address</p>
          <p id="company_mobile_email">Company Mobile & Company Email</p>
        </div>
      </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-3 col-xs-3">
        <label>Invoice No</label>
        <div class="input-group">
            <input name="" class="form-control" value="{{ $invoice_info->invoice_id }}" readonly>
        </div>
      </div>
      <div class="col-md-3 col-xs-3">

      </div>
      <div class="col-md-3 col-xs-3">

      </div>
      <div class="col-md-3 col-xs-3">
        <label>Date</label>
        <div class="input-group date" data-date-format="dd.mm.yyyy">
          <input  type="text" class="form-control" placeholder="dd.mm.yyyy" value="{{ Carbon\Carbon::now()->format('d.m.Y') }}">
          <div class="input-group-addon" >
            <span class="glyphicon glyphicon-th"></span>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td style="width: 10px;">Name</td>
          <td>{{ $invoice_info->customer_name }}</td>
        </tr>
        <tr>
          <td style="width: 10px;">Address</td>
          <td>{!! $invoice_info->customer_address !!}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="container">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>SL.</th>
          <th>Item Description</th>
          <th>Buy Price</th>
          <th>Sale Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
        </tr>
      </thead>
      <tbody>
        @foreach($invoice_info->saleProducts as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->buy_price_price }}</td>
            <td>{{ $item->sale_price }}</td>
            <td>{{ $item->sale_quantity }}</td>
            <td>{{ $item->total_price }}</td>
          </tr>
        @endforeach
        <tr>
          <td colspan="5" style="text-align: right;">Total</td>
          <td>{{ $invoice_info->grand_total_amount }}</td>
        </tr>
        <tr>
          <td colspan="5" style="text-align: right;">Advanced</td>
          <td>{{ $invoice_info->advanced_amount }}</td>
        </tr>

        <tr>
          <td colspan="5" style="text-align: right;">Due</td>
          <td>{{ $invoice_info->due_amount }}</td>
        </tr>

      </tbody>
    </table>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 quote">
        <p class="text-center">
          This is demo text.This is demo text.This is demo text.This is demo text.This is demo text.
        </p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="customers_sign">
            <hr style="border: 1px solid black;" />
            <h4>Customer Signature</h4>
        </div>
      </div>
      <div class="col-md-6"></div>
      <div class="col-md-3">
        <div class="owners_sign">
            <hr style="border: 1px solid black;"/>
            <h4>Oweners Signature</h4>
        </div>
      </div>
    </div>
  </div>

</div>


<button type="button" class="btn btn-primary print_btn" onclick="printDiv('printcontent');"><i class="fa fa-print"></i> Print</button>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script>
   $('.input-group.date').datepicker({format: "dd.mm.yyyy"});

   function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>
