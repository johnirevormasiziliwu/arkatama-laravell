@extends('layouts.main')

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
@endsection
