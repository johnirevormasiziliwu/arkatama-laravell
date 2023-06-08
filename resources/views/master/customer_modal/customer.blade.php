@extends('layouts.main')

@section('content')
    <h1>Data Customer</h1>

    <div class="table-responsive">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create">Tambah
            Data</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody">
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
                            <button type="button" class="btn btn-primary" data-id="{{ $c->id }}"
                                data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</button>
                            <a href="{{ url('/modal/customer-delete', $c->id) }}" class="btn btn-danger">Delete</a>
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

    {{-- Modal Tambah Data --}}
    <div class="modal fade" id="modal-create" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Modal Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="container mt-2" id="alert-store"></div>
                <form id="form-tambah">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="hidden" name="id" class="form-control">
                            <input type="text" name="nama" id="store_nama" class="form-control">
                            <span class="invalid-feedback">
                                <strong id="nama_msg_store"></strong>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" id="store_email" class="form-control">
                            <span class="invalid-feedback">
                                <strong id="email_msg_store"></strong>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" id="store_alamat" class="form-control">
                            <span class="invalid-feedback">
                                <strong id="alamat_msg_store"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade" id="modal-edit" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Modal Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="container mt-2" id="alert-edit"></div>
                <form id="form-edit">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="hidden" name="id" id="id" class="form-control">
                            <input type="text" name="nama" id="nama" class="form-control">
                            <span class="invalid-feedback">
                                <strong id="nama_msg"></strong>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                            <span class="invalid-feedback">
                                <strong id="email_msg"></strong>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control">
                            <span class="invalid-feedback">
                                <strong id="alamat_msg"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            function reloadTable() {
                $.ajax({
                    url: "{{ url('/modal/customer') }}",
                    method: 'GET',
                    beforeSend: function(param) {
                        $('#tableBody').empty();
                    },
                    success: function(response) {
                        $.each(response.data, function(i, v) {
                            // select row
                            var newRow = $('<tr>');
                            // tambah kolom table
                            newRow.append($('<td>').text(i + 1));
                            newRow.append($('<td>').text(v.nama));
                            newRow.append($('<td class="text-center">').html(`
                                <button type="button" class="btn btn-primary" data-id="${v.id}"
                                data-bs-toggle="modal" data-bs-target="#modal-edit">Edit</button>
                                <a href="/modal/customer-delete/${v.id}" class="btn btn-danger">Delete</a>
                            `));
                            $('#tableBody').append(newRow);
                        });
                    }
                });
            }
            // load data di modal edit
            $('#modal-edit').on('show.bs.modal', function(event) {
                // Mengambil data dari button yang diklik, cek data-id
                var button = $(event.relatedTarget);
                var id = button.data('id');
                // Fetch data menggunakan ajax
                $.ajax({
                    type: "GET",
                    url: `/modal/customer-edit/${id}`,
                    dataType: "JSON",
                    success: function(response) {
                        $('#id').val(response.data.id);
                        $('#nama').val(response.data.nama);
                        $('#email').val(response.data.email);
                        $('#alamat').val(response.data.alamat);
                    }
                });
            });
            // store data
            $('#form-tambah').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ url('/modal/customer-store') }}",
                    data: $(this).serialize(),
                    dataType: "JSON",
                    success: function(response) {
                        reloadTable()
                        $('#form-tambah')[0].reset()
                        $('#modal-create').modal('hide')
                    },
                    error: function(xhr, status, error) {
                        $.each(xhr.responseJSON.errors, function(i, v) {
                            // menambahkan notifikasi alert dibagian atas 
                            $('#alert-store').append(`
                            <div class="alert alert-danger" role="alert" id="store-text">
                                ${v}
                            </div>`);
                            // notifikasi error di setiap inputan
                            $("#" + i + "_msg_store").html(v);
                            $("[id='store_" + i + "']").addClass("is-invalid");
                        });
                    }
                });
            });
            // edit data
            $('#form-edit').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: "PUT",
                    url: "{{ url('/modal/customer-update') }}",
                    data: $(this).serialize(),
                    dataType: "JSON",
                    success: function(response) {
                        reloadTable()
                        $('#form-edit')[0].reset()
                        $('#modal-edit').modal('hide')
                    },
                    error: function(xhr, status, error) {
                        $.each(xhr.responseJSON.errors, function(i, v) {
                            // menambahkan notifikasi alert dibagian atas 
                            $('#alert-edit').append(`
                            <div class="alert alert-danger" role="alert" id="store-text">
                                ${v}
                            </div>`);
                            // notifikasi error di setiap inputan
                            $("#" + i + "_msg").html(v);
                            $("[id='" + i + "']").addClass("is-invalid");
                        });
                    }
                });
            });
        });
    </script>
@endsection
