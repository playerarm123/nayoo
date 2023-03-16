<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="app-url" content="{{config('app.url')}}">
    <title>{{config('app.name')}} - @yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{asset('assets/bootstrap-5/css/bootstrap.css')}}">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">{{config('app.name')}}</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @if(auth()->check())
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/friends">My friend</a>
                        </li>
                        @endif
                </ul>
                    
                @if(auth()->check())
                    <form action="{{url('logout')}}" method="POST">
                        @csrf
                        <button class="btn btn-danger">Logout</button>
                    </form>
                @else
                    <a href="{{route('login')}}" class="btn btn-outline-secondary me-2">Login</a>
                    <a href="{{route('register')}}" class="btn btn-outline-secondary">Register</a>
                @endif
            </div>
        </div>
    </nav>
    <div class="container p-3">
        @yield('content')
    </div>
    <script src="{{asset('jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js" integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="{{asset('assets/bootstrap-5/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('main.js')}}"></script>
    @yield('script')
</body>

</html>