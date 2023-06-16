@extends('template.start')
@section('contenct')
    <h1>Data Produk</h1>

    @php
        $data = 'Data Produk di Gudang A';
    @endphp

    <h5>Lokasi Barang : {{ $data }}</h5>

    <a href="{{ url('/produk-create') }}" class="btn btn-primary btn-sm">Tambah Data</a>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col" class="text-center">Gambar</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk as $n)
                    <tr class="">
                        <td scope="row">{{ $loop->iteration }}.</td>
                        <td>{{ $n->nama }}</td>
                        <td class="text-center"><img style="height: 50px; width: 50px;"
                                src="{{ asset('storage/gambar/' . $n->file) }}" alt=""></td>
                        <td class="text-center">
                            <a href="/produk-edit/{{ $n->id }}" class="btn btn-primary">Edit</a>
                            <a href="/produk-delete/{{ $n->id }}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="4">Data Tidak Ada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <p>
        Keterangan : <br>
    <p class="fst-italic">
        @if (count($produk) == 1)
            Saya Memiliki 1 Produk
        @elseif (count($produk) > 1)
            Saya Memiliki banyak Produk
        @else
            Saya Tidak Memiliki Produk
        @endif
    </p>
    </p>
@endsection
