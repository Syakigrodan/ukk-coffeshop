@extends('layouts.main')

@section('content')
    <div id="app">
        @include('layouts.components.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>Tambah Produk</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Produk</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="/dashboard/manager/products" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="image" class="form-label">Gambar Produk</label>
                                            <div>
                                                <img src="" class="img-preview img-fluid mb-3" id="frame"
                                                    style="max-height: 150px; overflow:hidden">
                                            </div>
                                            <input class="form-control @error('image') is-invalid @enderror" type="file"
                                                id="image" name="image" onchange="preview()">
                                            <div class="invalid-feedback">
                                                @error('image')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Nama Produk</label>
                                            <input type="text" id="product_name"
                                                class="form-control @error('product_name') is-invalid @enderror"
                                                name="product_name" placeholder="Nama Produk" required autofocus>
                                            @error('product_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Deskripsi</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" style="resize: none; height: 100px;"
                                                placeholder="Deskripsi" id="description" name="description" style="height: 87px;"></textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="position">Kategori Produk</label>
                                            <select class="form-select @error('category_product') is-invalid @enderror"
                                                id="category_product_id" name="category_product_id" required>
                                                <option value="">Pilih Kategori Produk</option>
                                                @foreach ($category_products as $category_product)
                                                    <option value="{{ $category_product->id }}">
                                                        {{ $category_product->category_product_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('position')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="stock">Stock</label>
                                                    <input type="number" id="stock"
                                                        class="form-control @error('stock') is-invalid @enderror"
                                                        name="stock" placeholder="Stock" required>
                                                    @error('stock')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price">Harga</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="number" id="price"
                                                            class="form-control @error('price') is-invalid @enderror"
                                                            name="price" placeholder="Harga" required>
                                                    </div>
                                                    @error('price')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <div class="d-flex justify-content-end mt-4">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1 font-bold">
                                                        Tambah Produk
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
