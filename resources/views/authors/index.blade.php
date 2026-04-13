@extends('layouts.master')

@section('title', 'Authors')
@section('name', 'Authors Table')

@section('content')

    <a href="{{ route('authors.create') }}" class="btn btn-block btn-primary btn-lg">Create Author</a>


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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach ($data as $info)
                            <tbody>
                                <tr>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->bio }}</td>
                                    <td style="display: flex">
                                        <a href="{{ route('authors.edit', $info->id) }}" class="btn btn-info">Update</a>
                                        <a href="{{ route('authors.delete', $info->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    @else
                        <p style="text-align: center;">There No Data To Show</p>
                @endif



                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
