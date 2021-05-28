@extends('layouts.app')

@section('content')
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                   placeholder="Enter email" value="{{ old('email') }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                   placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation"
                   placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
