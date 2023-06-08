@extends('layouts.main')

@section('content')
    <div id="carouselExampleControls" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            @forelse ($product as $p)
                <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                    <img src="{{ asset('storage/gambar/' . $p->file) }}" class="d-block" style="height: 600px;" alt="...">
                </div>
            @empty
                <div class="carousel-item active">
                    <img src="https://seon.co.id/wp-content/uploads/2020/07/4-Cara-Membuat-Toko-Online-Gratis-untuk-Pemula.jpg"
                        class="d-block w-100" alt="...">
                </div>
            @endforelse
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h3 class="mb-3">Produk Unggulan</h3>

    <div class="row gap-3 mb-3">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="https://picsum.photos/640/360" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="https://picsum.photos/640/360" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="https://picsum.photos/640/360" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="https://picsum.photos/640/360" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
            </div>
        </footer>
    </div>
@endsection
