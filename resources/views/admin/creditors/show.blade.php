@extends('admin.master')
@section('title')
   Creditor Details
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
                            <h3 class="card-title"><a href="{{ route('creditors.index') }}" class="btn btn-warning btn-sm mr-2">
                                <i class="fas fa-arrow-left"></i>
                                Back
                            </a>
                            Creditor Details</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $result->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Company</th>
                                        <td>{{ $result->company }}</td>
                                    </tr>
                                    <tr>
                                        <th>Amount</th>
                                        <td>{{ $result->amount }}</td>
                                    </tr>
                                @if($result->email)
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $result->email }}</td>
                                    </tr>
                                @endif
                                @if($result->phone)
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $result->phone }}</td>
                                    </tr>
                                @endif
                                @if($result->mobile)
                                    <tr>
                                        <th>Mobile</th>
                                        <td>{{ $result->mobile }}</td>
                                    </tr>
                                @endif
                                @if($result->address)
                                    <tr>
                                        <th>Address</th>
                                        <td>{!! $result->address !!}</td>
                                    </tr>
                                @endif
                                @if($result->details)
                                    <tr>
                                        <th>Details</th>
                                        <td>{!! $result->details !!}</td>
                                    </tr>
                                 @endif

                                @if (in_array(pathinfo($result->file, PATHINFO_EXTENSION), ['jpg', 'png', 'jpeg', 'gif', 'svg', 'webp','JPG', 'PNG', 'JPEG', 'GIF', 'SVG', 'WEBP']))
                                    <tr>
                                        <th>Image</th>
                                        <td>
                                           <a href="{{ asset($result->path.$result->file) }}" target="_blank"> <img src="{{ asset($result->path.$result->file) }}" width="100px"></a>
                                        </td>
                                    </tr>
                                    @elseif($result->file)
                                    <tr>
                                        <th>File</th>
                                        <td>
                                            <a href="{{ asset($result->path.$result->file) }}" target="_blank">View</a>
                                        </td>
                                    </tr>
                                @endif
                                @if($result->deal_date)
                                    <tr>
                                        <th>Deal Date</th>
                                        <td>{{ \Carbon\Carbon::parse($result->deal_date)->format('d F Y') }}</td>
                                    </tr>
                                @endif
                                @if($result->payment_date)
                                    <tr>
                                        <th>Payment Date</th>
                                        <td>{{ \Carbon\Carbon::parse($result->payment_date)->format('d F Y') }}</td>
                                    </tr>
                                @endif


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

