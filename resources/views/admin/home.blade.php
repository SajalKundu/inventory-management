@extends('admin.master')
@section('title')
    Dashboard
@endsection
@section('additional_admin_css')
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-2">
    <!-- Main content -->
    <section class="content">

        <div class="table-responsive">

            <table CELLSPACING=0 CELLPADDING=0 BORDER=0 align="center" class="table table-striped">
                @if (Session::has('msg'))
                    <tr>
                        <td align=center>
                            <span style="color: blue">{!! ucwords(session('msg')) !!}</span>
                        </td>
                    </tr>
                @endif

                <tr>
                    <td align=center style="color:#1fa337; " height="100"></td>
                </tr>
                <tr>
                    <td align=center class="text-custom">
                        <h1>WELCOME </h1>
                    </td>
                </tr>
                <tr>
                    <td align=center class="text-custom">
                        <h2> To </h2>
                    </td>
                </tr>
                <tr>
                    <td align=center class="text-custom">
                        <img src="{{ asset('backend/images/inventory-logo.png') }}" alt="Inventory System" class="img-responsive" width="100">
                    </td>

                </tr>
                <tr>
                    <td align=center style="color:#1fa337" height="100">
                        <h2>{{ $contact->about_company }}</h2>
                    </td>
                </tr>

            </table>
        </div>

    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
@endsection
@section('additional_admin_js')
@endsection
