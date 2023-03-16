@extends('layout')
@section('title')
    Login
@endsection
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card">
            <div class="card-title text-center border-bottom">
                <h2 class="p-3">Login</h2>
            </div>
            <div class="card-body">
                <form action="{{url('login')}}" method="POST">
                    @csrf
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
                        <input type="checkbox" class="form-check-input" id="remember" name="remember" />
                        <label for="remember" class="form-label">Remember Me</label>
                    </div>
                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                {{-- <div class="text-center mt-3">
                    <small>Or</small>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="{{url('auth/facebook')}}"  class="btn btn-primary">Login with Facebook</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection