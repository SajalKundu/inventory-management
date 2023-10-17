@extends('admin.master')
@section('title')
    User List
@endsection
@section('additional_admin_css')
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-2">
                            <div class="card-header">
                                <h3 class="card-title">

                                    User List
                                </h3>
                                <div class="card-tools">
                                    <a href="{{ route('a_userAdd') }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-plus"></i> Add New</a>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            {{-- {{ Request::getClientIp(true) }} --}}
                            <div class="box-body">
                                <table id="" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>username</th>
                                            <th style="text-align: center;">email</th>
                                            <th style="text-align: center;">Image</th>
                                            <th style="text-align: center;">Status</th>
                                            <th style="text-align: center;">Edit</th>
                                            <th style="text-align: center;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = $user->perPage() * ($user->currentPage()-1); @endphp
                                        @foreach ($user as $user_data)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $user_data->name }}</td>
                                                <td style="text-align: center;">{{ $user_data->email }}</td>

                                                <td style="text-align: center;">
                                                    @if ($user_data->image)
                                                        <a target="_blank"
                                                            href="{{ asset($user_data->image_path . $user_data->image) }}">
                                                            <img src="{{ asset($user_data->image_path . $user_data->image) }}"
                                                                class="img-circle" width="30px" height="30px"></a>
                                                    @endif
                                                </td>

                                                <td style="text-align: center;">
                                                    @if ($user_data->status)
                                                        <a
                                                            href="JavaScript:status('{{ route('a_userStatus', ['id' => $user_data->id, 'value' => $user_data->status, 'status' => 'status']) }}')"><img
                                                                src="{{ asset('backend/images/yes.gif') }}"></a>
                                                    @else
                                                        <a
                                                            href="JavaScript:status('{{ route('a_userStatus', ['id' => $user_data->id, 'value' => $user_data->status, 'status' => 'status']) }}')"><img
                                                                src="{{ asset('backend/images/no.gif') }}"></a>
                                                    @endif
                                                </td>

                                                <td style="text-align: center;"><a
                                                        href="{{ route('a_userEdit', ['id' => $user_data->id]) }}"> <img
                                                            src="{{ asset('backend/images/edit.gif') }}"></a>
                                                </td>

                                                <td style="text-align: center;"><a
                                                        href="JavaScript:del('{{ route('a_userDelete', ['id' => $user_data->id]) }}')"><img
                                                            src="{{ asset('backend/images/del.gif') }}"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                                {{ $user->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endsection
