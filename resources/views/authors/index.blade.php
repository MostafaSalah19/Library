@extends('layouts.master')

@section('title', 'Authors')
@section('name', 'Authors Table')

@section('content')

    @if (auth()->user()->role == 1)
        <a href="{{ route('authors.create') }}" class="btn btn-block btn-primary btn-lg">Create Author</a>
    @endif


    <div class="col-12">
        <div class="card">
            <div class="card-header w-100">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">

                @if (@isset($data) and !@empty($data))
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Biography</th>
                                @if (auth()->user()->role == 1)
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        @foreach ($data as $info)
                            <tbody>
                                <tr>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->bio }}</td>

                                    @if (auth()->user()->role == 1)
                                        <td style="display: flex; gap: 5px;">
                                            <a href="{{ route('authors.edit', $info->id) }}" class="btn btn-info">Update</a>
                                            <a href="{{ route('authors.delete', $info->id) }}"
                                                class="btn btn-danger">Delete</a>
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
                    <br>
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
