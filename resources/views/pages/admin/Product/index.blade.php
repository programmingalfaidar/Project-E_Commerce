@extends('layouts.dashboard-admin')

@section('title')
    Dashboard Product Page
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Product</h2>
                <p class="dashboard-subtitle"> List Of Product!</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Create Data</a>
                                <div class="table-responsive">
                                    <table class=" table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Pemilik</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
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
    <script>
        var datatable = $('#crudTable').dataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'namaProduct',
                    name: 'namaProduct'
                },
                {
                    data: 'user.name',
                    name: 'user.name'
                },
                {
                    data: 'category.namaCategory',
                    name: 'category.namaCategory'
                },
                {
                    data: 'price',
                    name: 'price'
                },

                {
                    data: 'action',
                    nama: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                },
            ],
        })
    </script>
@endpush
