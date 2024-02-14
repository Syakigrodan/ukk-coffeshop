@extends('layouts.main')

@section('content')
    <div id="app">
        @include('layouts.components.sidebar')
        @include('layouts.components.navbar')
        <div id="main">
            <div class="page-heading">
                <h3>Form Tambah Kategori Produk</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Kategori Produk</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="/dashboard/manager/categoryProduct" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="category_product_name">Kategori Produk</label>
                                            <input type="text" id="category_product_name"
                                                class="form-control @error('category_product_name') is-invalid @enderror"
                                                name="category_product_name" placeholder="Kategori Produk" required
                                                autofocus>
                                            @error('category_product_name')
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
                                        <div class="d-flex justify-content-end mt-4">
                                            <button type="submit" class="btn btn-primary me-1 mb-1 font-bold">
                                               Tambah Kategori Produk
                                            </button>
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
