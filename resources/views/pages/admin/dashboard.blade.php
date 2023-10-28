@extends('layouts.dashboard-admin')

@section('title')
    Admin Page
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard Admin</h2>
                <p class="dashboard-subtitle"> Halaman Admin Store!</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Customer
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ $customer }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Total Harga
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ $totalharga }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Total Transaksi
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ $totalTransaksi }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
