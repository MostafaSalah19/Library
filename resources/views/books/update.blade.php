@extends('layouts.master')

@section('title', 'Edit Book')
@section('name', 'Edit Book')

@section('content')


    <div class="card-header w-100">

        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

        <!-- form start -->
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf

            <div class="card-body row">
                <div class="form-group col-3">
                    <label for="exampleInputname1">Author</label>
                    <select class="form-control" id="exampleInputname1" name="author_id">
                        <option value="">Select Author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputbio1">Category</label>
                    <select class="form-control" id="exampleInputbio1" name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputbio1">Title</label>
                    <input type="text" class="form-control" id="exampleInputbio1" placeholder="Enter title"
                        name="title" value="{{ $book->title }}">
                    @error('title')
                        <span style="color: red;">{{ $messages }}</span> <br>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputbio1">ISBN</label>
                    <input type="text" class="form-control" id="exampleInputbio1" placeholder="Enter ISBN" name="isbn"
                        value="{{ $book->isbn }}">
                    @error('isbn')
                        <span style="color: red;">{{ $messages }}</span> <br>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputbio1">Published Year</label>
                    <input type="text" class="form-control" id="exampleInputbio1" placeholder="Enter published year"
                        name="published_year" value="{{ $book->published_year }}">
                    @error('published_year')
                        <span style="color: red;">{{ $messages }}</span> <br>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputbio1">Pages</label>
                    <input type="text" class="form-control" id="exampleInputbio1" placeholder="Enter pages"
                        name="pages" value="{{ $book->pages }}">
                    @error('pages')
                        <span style="color: red;">{{ $messages }}</span> <br>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
