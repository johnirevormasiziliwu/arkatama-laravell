@extends('layouts.main')

@section('content')
    <h1>Data Customer</h1>

    @if ($errors->any())
        <div class="alert alert-primary mb-3 m-auto" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    <form action="{{ url('/customer-store') }}" method="post">
        @csrf
        <div class="mb-2">
            <label for="">Nama</label>
            <input type="text" name="nama"
                class="form-control {{ isset($errors->messages()['nama']) ? 'is-invalid' : '' }}">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <ol>
                    @if (isset($errors->messages()['nama']))
                        @foreach ($errors->messages()['nama'] as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
        <div class="mb-2">
            <label for="">Email</label>
            <input type="text" name="email"
                class="form-control {{ isset($errors->messages()['email']) ? 'is-invalid' : '' }}">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <ol>
                    @if (isset($errors->messages()['email']))
                        @foreach ($errors->messages()['email'] as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
        <div class="mb-2">
            <label for="">Alamat</label>
            <input type="text" name="alamat"
                class="form-control {{ isset($errors->messages()['alamat']) ? 'is-invalid' : '' }}">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <ol>
                    @if (isset($errors->messages()['alamat']))
                        @foreach ($errors->messages()['alamat'] as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="simpan">
    </form>
@endsection
