@extends('layouts.main')

@section('content')
    <h1>Data Produk</h1>

    @if ($errors->any())
        <div class="alert alert-primary mb-3 m-auto" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    <form action="{{ url('/produk-store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label for="">Nama</label>
            <input type="text" name="nama"
                class="form-control {{ isset($errors->messages()['nama']) ? 'is-invalid' : '' }}"
                value="{{ old('nama') }}">
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
            <label for="">Deskripsi</label>
            <input type="text" name="deskripsi"
                class="form-control {{ isset($errors->messages()['deskripsi']) ? 'is-invalid' : '' }}"
                value="{{ old('deskripsi') }}">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <ol>
                    @if (isset($errors->messages()['deskripsi']))
                        @foreach ($errors->messages()['deskripsi'] as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
        <div class="mb-2">
            <label for="">Harga</label>
            <input type="number" name="harga"
                class="form-control {{ isset($errors->messages()['harga']) ? 'is-invalid' : '' }}"
                value="{{ old('harga') }}">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <ol>
                    @if (isset($errors->messages()['harga']))
                        @foreach ($errors->messages()['harga'] as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
        <div class="mb-2">
            <label for="">Gambar</label>
            <input type="file" name="file"
                class="form-control {{ isset($errors->messages()['file']) ? 'is-invalid' : '' }}">
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                <ol>
                    @if (isset($errors->messages()['file']))
                        @foreach ($errors->messages()['file'] as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="simpan">
    </form>
@endsection
