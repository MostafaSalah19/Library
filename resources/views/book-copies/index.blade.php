@extends('layouts.master')

@section('title', 'Books Copies Table')
@section('name', 'Books Copies Table')

@section('content')

    <a href="{{ route('book-copies.create') }}" class="btn btn-block btn-primary btn-lg">Create Book Copy</a>


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
                                <th>Book</th>
                                <th>Barcode</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @foreach ($data as $info)
                            <tbody>
                                <tr>
                                    <td>{{ $info->book_name }}</td>
                                    <td>{{ $info->barcode }}</td>
                                    <td>{{ $info->status }}</td>
                                    <td style="display: flex">
                                        <a href="{{ route('book-copies.edit', $info->id) }}" class="btn btn-info">Update</a>
                                        <a href="{{ route('book-copies.delete', $info->id) }}"class="btn btn-danger">Delete</a>
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
