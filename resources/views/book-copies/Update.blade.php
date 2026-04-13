@extends('layouts.master')

@section('title', 'Update Book Copy')
@section('name', 'Update Book Copy')

@section('content')


    <div class="card-header">

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

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputname1">Book</label>
                    <select class="form-control" id="exampleInputname1" name="book_id">
                        <option value="">Select Book</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                {{ $book->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputbio1">Barcode</label>
                    <input type="text" class="form-control" id="exampleInputbio1" placeholder="Enter barcode"
                        name="barcode" value="{{ old('barcode') }}">
                    @error('barcode')
                        <span style="color: red;">{{ $message }}</span> <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputbio1">Status</label>
                    <select class="form-control" id="exampleInputbio1" name="status">
                        <option value="">Select Status</option>
                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="loaned" {{ old('status') == 'loaned' ? 'selected' : '' }}>Loaned</option>
                        <option value="repair" {{ old('status') == 'repair' ? 'selected' : '' }}>Repair</option>
                        <option value="lost" {{ old('status') == 'lost' ? 'selected' : '' }}>Lost</option>
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
