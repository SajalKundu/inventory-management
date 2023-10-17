@extends('admin.master')
@section('title')
   Gallery Edit
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
                                <a href="{{ route('a_userlist') }}" class="btn btn-warning btn-sm mr-2">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>
                                Password Change
                            </h3>
                        </div>
                        @if ($errors->any())
                        <div class="col-sm-12 text-center">
                            <br>
                            @foreach ($errors->all() as $error)
                            <div style="color: red;">{{ $error }}</div>
                            @endforeach
                            <br>
                        </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">

                        <form class="form-horizontal" method="post" action="{{ route('a_userPassword') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="title" class="col-sm-3 control-label">New Password</label>
                                    <div class="col-sm-4">
                                        <input id="password" type="password" name="password" value="" maxlength="250" size=50 class="form-control" required="required">
                                    </div>
                                </div>

                                <div class="form-group" id="confirm">
                                    <label for="title" class="col-sm-3 control-label">Confirm New Password</label>
                                    <div class="col-sm-4">
                                        <input id="password-confirm" type="password" maxlength="250" size=50 class="form-control" name="password_confirmation" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <div class="col-sm-12">
                                    <div class="col-sm-4 col-md-offset-3">
                                        <button id="update" type="submit" class="btn btn-info"> Update </button>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
		</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function() {
		$('#password-confirm').keyup(function(){
			var value1 = $('#password').val();
			var value2 = $('#password-confirm').val();
			if(!value2 || value1 != value2){
				console.log('danger');
				$('#confirm').addClass('has-error');
				$('#confirm').removeClass('has-success');
				$('#update').attr('disabled','disabled');
			}else{
				console.log('success');
				$('#confirm').addClass('has-success');
				$('#confirm').removeClass('has-error');
				$('#update').removeAttr('disabled');
			}
		});
	});

</script>
@endsection
