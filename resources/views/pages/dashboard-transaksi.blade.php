@extends('layouts.dashboard')

@section('title')
    Dashboard Transaksi Page
@endsection

@section('content')
    <!-- section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Transactions</h2>
                <p class="dashboard-subtitle"> Look what you have made today!</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="row mt-3">
                            <div class="col-12 mt-2">
                                <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home"
                                            type="button" role="tab" aria-controls="home"
                                            aria-selected="true">Self</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile"
                                            type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">Buy</button>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        @foreach ($selTransaksi as $transaksi)
                                            <a href="{{ route('detail-transaksi', $transaksi->id) }}"
                                                class=" card card-list d-block">
                                                <div class="card-body">
                                                    <div class="row mt-3">
                                                        <div class="col-md-1">
                                                            <img src="{{ Storage::url($transaksi->product->galleries->first()->photos) }}"
                                                                alt="" class="w-50">
                                                        </div>
                                                        <div class="col-md-4">
                                                            {{ $transaksi->product->namaProduct }}
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{ $transaksi->product->user->store_name }}
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{ $transaksi->created_at }}
                                                        </div>
                                                        <div class="col-md-1 d-none d-md-block">
                                                            <img src="images/dashboard-arrow-right.svg" alt="">
                                                        </div>
                                                    </div>

                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        @foreach ($buytransaksi as $transaksi)
                                            <a href="{{ route('detail-transaksi', $transaksi->id) }}"
                                                class=" card card-list d-block">
                                                <div class="card-body">
                                                    <div class="row mt-3">
                                                        <div class="col-md-1">
                                                            <img src="{{ Storage::url($transaksi->product->galleries->first()->photos) }}"
                                                                alt="" class="w-50">
                                                        </div>
                                                        <div class="col-md-4">
                                                            {{ $transaksi->product->namaProduct }}
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{ $transaksi->product->user->store_name }}
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{ $transaksi->created_at }}
                                                        </div>
                                                        <div class="col-md-1 d-none d-md-block">
                                                            <img src="images/dashboard-arrow-right.svg" alt="">
                                                        </div>
                                                    </div>

                                                </div>
                                            </a>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
