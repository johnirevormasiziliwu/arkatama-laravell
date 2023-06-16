{{-- @extends('layouts.main')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-primary mb-3 m-auto" style="width: 32rem;" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @error('email')
        <div class="alert alert-primary mb-3 m-auto" style="width: 32rem;" role="alert">
            {{ $errors }}
        </div>
    @enderror

    <div class="card m-auto" style="width: 32rem;">
        <div class="card-body">
            <h4 class="card-title">Login</h4>
            <form action="{{ url('/login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        value="{{ old('email') }}" aria-describedby="emailHelp" autofocus>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-link btn-sm float-end" href="{{ url('register') }}">Register</a>
            </form>
        </div>
    </div>
@endsection --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Serba Ada</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        @if (session()->has('success'))
            <div class="alert alert-primary mb-3 m-auto" style="width: 32rem;" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @error('email')
            <div class="alert alert-primary mb-3 m-auto" style="width: 32rem;" role="alert">
                {{ $errors }}
            </div>
        @enderror
        <div class="card m-auto" style="width: 32rem;">
            <div class="card-body">
                <h4 class="card-title">Login</h4>
                <form action="{{ url('/login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            value="{{ old('email') }}" aria-describedby="emailHelp" autofocus>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-link btn-sm float-end" href="{{ url('register') }}">Register</a>
                </form>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
</body>

</html>
