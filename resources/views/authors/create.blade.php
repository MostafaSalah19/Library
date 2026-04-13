@extends('layouts.master')

@section('title', 'Create Author')
@section('name', 'Create Author')

@section('content')


    <div class="card-header">
        <!-- form start -->
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf

            
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputname1">Name</label>
                    <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter name" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <span style="color: red;">{{ $message }}</span> <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputbio1">Bio</label>
                    <input type="text" class="form-control" id="exampleInputbio1" placeholder="Enter bio" name="bio"
                        value="{{ old('bio') }}">
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
