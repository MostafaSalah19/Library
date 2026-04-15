@extends('layouts.master')

@section('title', 'Update Book Copy')
@section('name', 'Update Book Copy')

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
        <form action="{{ route('book-copies.store') }}" method="POST">
            @csrf

            <div class="card-body row">
                <div class="form-group col-3">
                    <label for="exampleInputname1">Book</label>
                    <select class="form-control" id="exampleInputname1" name="book_id">
                        <option value="">Select Book</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}" {{ $book_copy->book_id == $book->id ? 'selected' : '' }}>
                                {{ $book->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputbio1">Barcode</label>
                    <input type="text" class="form-control" id="exampleInputbio1" placeholder="Enter barcode"
                        name="barcode" value="{{ $book_copy->barcode }}">
                    @error('barcode')
                        <span style="color: red;">{{ $message }}</span> <br>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputbio1">Status</label>
                    <select class="form-control" id="exampleInputbio1" name="status">
                        <option value="{{ $book_copy->status }}">Select Status</option>
                        <option value="{{ $book_copy->status }}" {{ $book_copy->status == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="{{ $book_copy->status }}" {{ $book_copy->status == 'loaned' ? 'selected' : '' }}>Loaned</option>
                        <option value="{{ $book_copy->status }}" {{ $book_copy->status == 'repair' ? 'selected' : '' }}>Repair</option>
                        <option value="{{ $book_copy->status }}" {{ $book_copy->status == 'lost' ? 'selected' : '' }}>Lost</option>
                    </select>
                    @error('status')
                        <span style="color: red;">{{ $message }}</span> <br>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
