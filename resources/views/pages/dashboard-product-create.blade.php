@extends('layouts.dashboard')

@section('title')
    Product Create Page
@endsection

@section('content')
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
            <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                &laquo; Menu
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Sekstop Menu -->
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <img src="images/icon-user.png" alt="" class="rounded-circle mr-2 profile-picture">Hi
                            Alfaidar
                        </a>
                        <div class="dropdown-menu">
                            <a href="/GambarBwa/projectBwa1/dashboard.html" class="dropdown-item">Back TO
                                Store</a>
                            <a href="{{ route('dashboard-setting') }}" class="dropdown-item">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a href="/" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link d-inline-block d-flex mt-2">
                            <img src="images/icon-cart-filled.svg" alt="">
                            <div class="card-badge btn btn-success btn-sm rounded-circle">3</div>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav d-block d-lg-none">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            Hi' Idar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link d-inline-block">
                            Cart
                        </a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- section Content -->
        <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">Dashboard Create</h2>
                    <p class="dashboard-subtitle"> Create Your Own Product</p>
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
                            <form action="{{ route('product-store') }}" method="Post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" v-if="is_store_open">
                                                    <label for="">Product Name</label>
                                                    <input type="text" class="form-control" name="namaProduct">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" v-if="is_store_open">
                                                    <label for="">Price</label>
                                                    <input type="number" class="form-control" name="price">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nama Kategori</label>
                                                    <select name="categories_id" id="" class="form-control">
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
                                                    <textarea name="deskripsi" id="editor"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Thumbnail</label>
                                                    <input type="file" name="photo" class="form-control">
                                                    <p class="text-muted">Kamu Dapat Memilih Beberapa File</p>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-12 text-right">
                                                    <button type="submit" class="btn btn-success btn-lg">Save
                                                        Now</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
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
        CKEDITOR.replace('editor');
    </script>
@endpush
