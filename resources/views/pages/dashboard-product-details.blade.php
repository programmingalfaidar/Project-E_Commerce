@extends('layouts.dashboard')

@section('title')
    Product Detail Page
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Shirup Marzan</h2>
                <p class="dashboard-subtitle">Product Details</p>
            </div>
            <div class="dashboard-content">

                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('dashboard-product-update', $product->id) }}" method="Post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" v-if="is_store_open">
                                                <label for="">Product Name</label>
                                                <input type="text" class="form-control" name="namaProduct"
                                                    value="{{ old('namaProduct', $product->namaProduct) }}" required
                                                    autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" v-if="is_store_open">
                                                <label for="">Price</label>
                                                <input type="number" class="form-control" name="price"
                                                    value="{{ old('price', $product->price) }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Kategori</label>

                                                <select name="categories_id" id="" class="form-control">
                                                    <option value="{{ $product->categories_id }}">Tidak Diganti
                                                        {{ $product->category->namaCategory }}</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->namaCategory }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Deskripsi</label>
                                                <textarea name="deskripsi" value="{{ $product->deskripsi }}" id="editor">{!! $product->deskripsi !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-success btn-block">Update Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($product->galleries as $gallery)
                                        <div class="col-md-4">
                                            <div class="gallery-container">
                                                <img src="{{ Storage::url($gallery->photos ?? '') }}" alt=""
                                                    class="w-100">
                                                <a class="delete-gallery"
                                                    href="{{ route('delete-product-gallery', $gallery->id) }}"">
                                                    <img src="/images/icon-delete.svg" alt="" />
                                                </a>
                                                {{-- <a class="delete-gallery">
                                                    <img src="images/icon-delete.svg" alt="" class="d-block">
                                                </a> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                    <form action="{{ route('upload-product-gallery') }}" method="Post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="products_id" value="{{ $product->id }}">
                                        <div class="col-12">
                                            <input type="file" name="photo" id="file" style="display: none;"
                                                onchange="form.submit()">
                                            <button type="button" class="btn btn-secondary btn-block mt-3"
                                                onclick="tambahFoto()">Add
                                                Photo</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        function tambahFoto() {
            document.getElementById('file').click()
        }
    </script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush
