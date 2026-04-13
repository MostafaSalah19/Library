@extends('layouts.master')

@section('title', 'Borrow Book')
@section('name', 'Borrow Book')

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
        <form action="{{ route('loans.store') }}" method="POST">
            @csrf

            <div class="card-body row">
                <div class="form-group col-3">
                    <label for="exampleInputname1">Member</label>
                    <select class="form-control" id="exampleInputname1" name="member_id">
                        <option value="">Select Member</option>
                        @foreach ($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputbio1">Book Copy</label>
                    <select class="form-control" id="exampleInputbio1" name="book_copy_id">
                        <option value="">Select Book Copy</option>
                        @foreach ($book_copies as $copy)
                            <option value="{{ $copy->id }}">{{ $copy->book->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputbio1">Due At</label>
                    <input type="date" class="form-control" id="exampleInputbio1" placeholder="Enter due at"
                        name="due_at" value="{{ old('due_at') }}">
                    @error('due_at')
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
