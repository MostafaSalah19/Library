@extends('layouts.master')

@section('title', 'Books')
@section('name', 'Books Table')

@section('content')

    <a href="{{ route('books.create') }}" class="btn btn-block btn-primary btn-lg">Create Book</a>


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

            <!-- /.card-header w-100 -->
            <div class="card-body table-responsive p-0" style="height: 300px;">

                @if (@isset($data) and !@empty($data))
                    <table class="table table-head">
                        <thead>
                            <tr style="flex">
                                <th>Author</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>ISBN</th>
                                <th>Published Year</th>
                                <th>Pages</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach ($data as $info)
                            <tbody>
                                <tr>
                                    <td>{{ $info->author_name }}</td>
                                    <td>{{ $info->category_name }}</td>
                                    <td>{{ $info->title }}</td>
                                    <td>{{ $info->isbn }}</td>
                                    <td>{{ $info->published_year }}</td>
                                    <td>{{ $info->pages }}</td>
                                    <td style="display: flex">
                                        <a href="{{ route('books.edit', $info->id) }}" class="btn btn-info">Update</a>
                                        <a href="{{ route('books.delete', $info->id) }}" class="btn btn-danger">Delete</a>
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
