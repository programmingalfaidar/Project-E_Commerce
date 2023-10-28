@extends('layouts.dashboard')

@section('title')
    Dashboard Page
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle"> Look what you have made today!</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Revenue
                                </div>
                                <div class="dashboard-card-subtitle">
                                    ${{ number_format($revenue) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Transactions
                                </div>
                                <div class="dashboard-card-subtitle">
                                    ${{ number_format($transaksi_count) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Customer
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ number_format($customer) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 mt-2">
                        <h5 class="mb-3">Recet Transactios</h5>
                        @foreach ($transaksi_data as $transaksi)
                            <a href="{{ route('detail-transaksi', $transaksi->id) }}" class=" card card-list d-block">
                                <div class="card-body">
                                    <div class="row mt-3">
                                        <div class="col-md-1">
                                            <img src="{{ Storage::url($transaksi->product->galleries->first()->photos ?? '') }}"
                                                alt="" class="w-75">
                                        </div>
                                        <div class="col-md-4">
                                            {{ $transaksi->product->namaProduct ?? '' }}
                                        </div>
                                        <div class="col-md-3">
                                            {{ $transaksi->product->user->name ?? '' }}
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
@endsection
