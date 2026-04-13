@extends('layouts.master')

@section('title', 'Create Author')
@section('name', 'Edit Author')

@section('content')


    <div class="card-header">
        <!-- form start -->
        <form action="{{ route('authors.update', $author->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputname1">Name</label>
                    <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter name"
                        value="{{ $author->name }}" name="name">
                    @error('name')
                        <span style="color: red;">{{ $message }}</span> <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputbio1">Bio</label>
                    <input type="text" class="form-control" id="exampleInputbio1" placeholder="Enter bio"
                        value="{{ $author->bio }}" name="bio">
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
