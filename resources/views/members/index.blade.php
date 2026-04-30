@extends('layouts.master')

@section('title', 'Members')
@section('name', 'Members Table')

@section('content')

    @if (auth()->user()->role == 1)
        <a href="{{ route('members.create') }}" class="btn btn-block btn-primary btn-lg">Create Member</a>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-header w-100">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="name" name="table_search" class="form-control float-right" placeholder="Search">

                    </div>
                </div>
            </div>

            <!-- /.card-header w-100 -->
            <div class="card-body table-responsive p-0" style="height: 300px;">

                @if (@isset($data) and !@empty($data))
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Joined At</th>
                                @if (auth()->user()->role == 1)
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        @foreach ($data as $info)
                            <tbody>
                                <tr>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->email }}</td>
                                    <td>{{ $info->phone }}</td>
                                    <td>{{ $info->joined_at }}</td>
                                    @if (auth()->user()->role == 1)
                                        <td><a href="{{ route('members.edit', $info->id) }}" class="btn btn-info">Update</a>
                                            <a href="{{ route('members.delete', $info->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this member?')">Delete</a>
                                        </td>
                                    @endif
                                </tr>
                            </tbody>
                        @endforeach
                    @else
                        <p style="text-align: center;">There No Data To Show</p>
                @endif



                </table>
                <div class="col-md-12">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('input', '#table_search', function(e) {
                alert();
            });
            jquery.ajax({
                type: 'post',
                'dataType': 'html',
                cache: false,
            })
        });
    </script>

@endsection
