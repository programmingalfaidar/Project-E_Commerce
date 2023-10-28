@extends('layouts.dashboard')

@section('title')
    Detail Transaksi Page
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">{{ $transaksi->code }}</h2>
                <p class="dashboard-subtitle">Transaksi / Details</p>
            </div>
            <div class="dashboard-content" id="transactionsDetails">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <img src="{{ Storage::url($transaksi->product->galleries->first()->photos ?? '') }}"
                                            alt="" class="w-100 mb-3">
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Customer Name</div>
                                                <div class="product-subtitle">{{ $transaksi->transaksi->user->name }}</div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Product Name</div>
                                                <div class="product-subtitle">
                                                    {{ $transaksi->product->namaProduct }}</div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Date of Transaction</div>
                                                <div class="product-subtitle">{{ $transaksi->created_at }}</div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Payment</div>
                                                <div class="product-subtitle text-danger" v-model="status">
                                                    {{ $transaksi->transaksi->status_transaksi }}</div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Total Amount</div>
                                                <div class="product-subtitle">
                                                    {{ number_format($transaksi->transaksi->total_harga) }}</div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="product-title">Mobile</div>
                                                <div class="product-subtitle">{{ $transaksi->transaksi->user->nohp }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('update-transaksi', $transaksi->id) }}" method="Post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <h5>Transactions</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Addres 1</div>
                                            <div class="product-subtitle">{{ $transaksi->transaksi->user->alamat1 }}</div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Addres 2</div>
                                            <div class="product-subtitle">{{ $transaksi->transaksi->user->alamat2 }}</div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Province</div>
                                            <div class="product-subtitle">
                                                {{ App\Models\Province::find($transaksi->transaksi->user->province_id)->name }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">City</div>
                                            <div class="product-subtitle">
                                                {{ App\Models\Regency::find($transaksi->transaksi->user->regency_id)->name }}
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Country</div>
                                            <div class="product-subtitle">{{ $transaksi->transaksi->user->negara }}</div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="product-title">Postal Code</div>
                                            <div class="product-subtitle">{{ $transaksi->transaksi->user->kode_pos }}</div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="product-title">Shipping Price</div>
                                                    <select name="status_transaksi" id="status" class="form-control"
                                                        v-model="status">

                                                        <option value="PENDING">Pending</option>
                                                        <option value="SHIPPING">Shipping</option>
                                                        <option value="SUCCESS">Success</option>
                                                    </select>
                                                </div>
                                                <template v-if="status == 'SHIPPING'">
                                                    <div class="col-md-3">
                                                        <div class="product-title">
                                                            Input Resi
                                                        </div>
                                                        <input class="form-control" type="text" name="resi"
                                                            id="openStoreTrue" v-model="resi" />
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" class="btn btn-success mt-4">Update
                                                            Resi</button>
                                                    </div>
                                                </template>
                                            </div>




                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-success btn-lg">Save Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('addon-script')
    <script src="{{ url('vendor/vue/vue.js') }}"></script>
    <script>
        var Transaksi = new Vue({
            el: '#transactionsDetails',
            data: {
                status: "{{ $transaksi->status_transaksi }}",
                resi: "{{ $transaksi->resi }}"
            }
        })
    </script>
@endpush
