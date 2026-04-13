@extends('layouts.master')

@section('title', 'Categories Table')
@section('name', 'Categories Table')

@section('content')

    <a href="{{ route('categories.create') }}" class="btn btn-block btn-primary btn-lg">Create Category</a>


    <div class="col-12">
        <div class="card">
            <div class="card-header">
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
                                <th>id</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($data as $info)
                            <tbody>
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td>{{ $info->name }}</td>
                                    <td style="display: flex">
                                        <a href="{{ route('categories.delete', $info->id) }}" class="btn btn-danger">Delete</a>
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
