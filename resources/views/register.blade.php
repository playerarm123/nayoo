@extends('layout')
@section('title')
    Register
@endsection
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card">
            <div class="card-title text-center border-bottom">
                <h2 class="p-3">Register</h2>
            </div>
            <div class="card-body">
                <form action="{{url('register')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" />
                        @error('name') <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" />
                        @error('email') <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" />
                        @error('password') <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" />
                        @error('password_confirmation') <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>
                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection