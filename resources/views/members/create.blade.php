@extends('layouts.master')

@section('title', 'Create Member')
@section('name', 'Create Member')

@section('content')


    <div class="card-header w-100">
        <!-- form start -->
        <form action="{{ route('members.store') }}" method="POST">
            @csrf


            <div class="card-body row">
                <div class="form-group col-3">
                    <label for="exampleInputname1">Name</label>
                    <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter name" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <span style="color: red;">{{ $message }}</span> <br>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputbio1">Email</label>
                    <input type="email" class="form-control" id="exampleInputbio1" placeholder="Enter email" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <span style="color: red;">{{ $message }}</span> <br>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputbio1">Phone</label>
                    <input type="text" class="form-control" id="exampleInputbio1" placeholder="Enter phone" name="phone"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <span style="color: red;">{{ $message }}</span> <br>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputbio1">Email</label>
                    <input type="email" class="form-control" id="exampleInputbio1" placeholder="Enter email" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <span style="color: red;">{{ $message }}</span> <br>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputbio1">Joined At</label>
                    <input type="date" class="form-control" id="exampleInputbio1" placeholder="Enter joined at" name="joined_at"
                        value="{{ old('joined_at') }}">
                    @error('joined_at')
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
