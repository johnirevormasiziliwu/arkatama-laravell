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

    <form action="{{ url('/produk-update') }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-2">
            <label for="">Nama</label>
            <input type="hidden" name="id" value="{{ $produk->id }}" class="form-control">
            <input type="text" name="nama" value="{{ $produk->nama }}"
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
            <label for="">Deskripsi</label>
            <input type="text" name="deskripsi" value="{{ $produk->deskripsi }}"
                class="form-control {{ isset($errors->messages()['deskripsi']) ? 'is-invalid' : '' }}">
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
            <input type="text" name="harga" value="{{ $produk->harga }}"
                class="form-control {{ isset($errors->messages()['harga']) ? 'is-invalid' : '' }}">
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
            <label class="form-label d-block" for="">Gambar</label>
            @if ($produk->file)
                <img src="{{ asset('storage/gambar/' . $produk->file) }}" class="rounded-top mb-3"
                    style="width: 150px; height: 150px;" alt="">
            @endif
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
