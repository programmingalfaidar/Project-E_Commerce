@extends('layouts.dashboard')

@section('title')
    Product Page
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard Product</h2>
                <p class="dashboard-subtitle"> Manage weet To all Money</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('product-create') }}" class="btn btn-success">Add New
                            Product</a>
                    </div>
                </div>
                <div class="row mt-4">
                    @foreach ($products as $product)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ route('product-detail', $product->id) }}"
                                class="card card-dashboard-product d-block">
                                <div class="card-body">
                                    <img src="{{ Storage::url($product->galleries->first()->photos ?? '') }}" alt=""
                                        class="w-100 mb-2">
                                    <div class="product-title">{{ $product->namaProduct }}</div>
                                    <div class="product-category">{{ $product->category->namaCategory }}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach



                </div>
            </div>

        </div>

    </div>
@endsection
