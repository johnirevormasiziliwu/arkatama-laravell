@extends('layouts.main')

@section('content')
    <h1>Data Customer</h1>

    @if (session()->has('sukses'))
        <div class="alert alert-primary mb-3" role="alert">
            {{ session('sukses') }}
        </div>
    @endif

    <div class="table-responsive">
        <a class="btn btn-primary" href="/customer-create">Tambah Data</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customer as $c)
                    <tr class="">
                        <td scope="row">{{ $loop->iteration }}.</td>
                        <td>
                            {{ $c->nama }} <br>
                            @if ($c->order != 'null')
                                @foreach ($c->order as $o)
                                    Tanggal Order : {{ $o->tanggal_order }}
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/customer-edit/{{ $c->id }}" class="btn btn-primary">Edit</a>
                            <a href="/customer-delete/{{ $c->id }}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="3">Data Tidak Ada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <p>
        Keterangan : <br>
    <p class="fst-italic">
        {{-- @if (count($nama) == 1)
            Saya Memiliki 1 Produk
        @elseif (count($nama) > 1)
            Saya Memiliki banyak Produk
        @else
            Saya Tidak Memiliki Produk
        @endif --}}
    </p>
    </p>
@endsection
