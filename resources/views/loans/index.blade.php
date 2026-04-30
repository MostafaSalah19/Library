@extends('layouts.master')

@section('title', 'Loans Table')
@section('name', 'Loans Table')

@section('content')

    @if (auth()->user()->role == 1)
        <a href="{{ route('loans.borrow') }}" class="btn btn-block btn-primary btn-lg">Borrow Book</a>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-headerw-100">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card-header w-100 -->
            <div class="card-body table-responsive p-0" style="height: 300px;">

                @if (@isset($data) and !@empty($data))
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th>Member</th>
                                <th>Book</th>
                                <th>Borrowed At</th>
                                <th>Due At</th>
                                <th>Return At</th>
                                <th>Fine</th>
                                @if (auth()->user()->role == 1)
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        @foreach ($data as $info)
                            <tbody>
                                <tr>
                                    <td>{{ $info->member_name }}</td>
                                    <td>{{ $info->book_title }}</td>
                                    <td>{{ $info->borrowed_at }}</td>
                                    <td>{{ $info->due_at }}</td>
                                    <td>{{ $info->returned_at }}</td>
                                    <td>{{ $info->fine }}</td>
                                    @if (auth()->user()->role == 1)
                                        <td style="display: flex ; gap: 5px;">
                                            <a href="{{ route('loans.returnBook', $info->id) }}"
                                                class="btn btn-danger">Return</a>
                                            <a href="{{ route('loans.edit', $info->id) }}"
                                                class="btn btn-warning">Update</a>
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
