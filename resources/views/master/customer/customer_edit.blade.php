@extends('layouts.main')

@section('content')
    <h1>Data Customer</h1>

    <form action="{{ url('/customer-update') }}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="">Nama</label>
            <input type="hidden" name="id" value="{{ $customer->id }}" class="form-control">
            <input type="text" name="nama" value="{{ $customer->nama }}"
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
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" value="{{ $customer->email }}"
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
        <div class="mb-3">
            <label for="">Alamat</label>
            <input type="text" name="alamat" value="{{ $customer->alamat }}"
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
