@extends('layouts.app')

@section('title')
    Cart Page
@endsection

@section('content')
    {{-- page content --}}
    <div class="page-content page-cart">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="/GambarBwa/projectBwa1/detail.html">Cart</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-cart">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class=" table table-borderless table-cart">
                            <thead>
                                <td>Image</td>
                                <td>Name &amp; Seller</td>
                                <td>Harga</td>
                                <td>Menu</td>
                            </thead>
                            <tbody>
                                @php
                                    $TotalPrice = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                    <tr>
                                        @if ($cart->product->galleries)
                                            <td style="width: 25%;"><img
                                                    src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                                                    alt="" class="cart-image"></td>
                                        @else
                                            <p class="text-muted">Anda Belum Melakukan Add To Cart</p>
                                        @endif
                                        <td style="width: 35%;">
                                            <div class="product-title">{{ $cart->product->namaProduct }}</div>
                                            <div class="product-subtitle">By {{ $cart->user->store_name }}</div>
                                        </td>
                                        <td style="width: 35%;">
                                            <div class="product-title">$ {{ number_format($cart->product->price) }}</div>
                                            <div class="product-subtitle">USD</div>
                                        </td>
                                        <td style="width: 20%;">
                                            <form action="{{ route('delete-cart', $cart->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-remove-cart">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $TotalPrice += $cart->product->price;
                                    @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-4">Shipping Price</h2>
                    </div>
                </div>
                <form action="{{ route('chekout') }}" id="lokasi" method="Post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="total_harga" value="{{ $TotalPrice }}">
                    <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat1">Address 1</label>
                                <input type="text" class="form-control" id="alamat1" name="alamat1"
                                    value="Setra Duta Cemara">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat2">Address 2</label>
                                <input type="text" class="form-control" id="alamat2" name="alamat2"
                                    value="Setra Duta Cemara">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="province">Province</label>
                                <select class="form-select" name="province_id" v-if="provinces" v-model="province_id">
                                    <option v-for="province in provinces" :value="province.id">@{{ province.name }}
                                    </option>

                                </select>
                                <select v-else class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="regency_id">Kabupaten</label>
                                <select class="form-select" name="regency_id" id="regency_id" v-if="regencies"
                                    v-model="regency_id">
                                    <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}
                                    </option>

                                </select>
                                <select v-else class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode_pos">Postal Code</label>
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="48592">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="negara">negara</label>
                                <input type="text" class="form-control" id="negara" name="negara"
                                    value="Setra Duta Cemara">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nohp">Mobile</label>
                                <input type="text" class="form-control" id="nohp" name="nohp"
                                    value="+624178192937">
                            </div>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12">
                            <h2 class="mb-2">Payment Informations</h2>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-4 col-md-2">
                            <div class="product-title">$10</div>
                            <div class="product-subtitle">Country Tax</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title">$289</div>
                            <div class="product-subtitle">Product Insuncare</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title">$101</div>
                            <div class="product-subtitle">Ship To Jakarta</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title text-success">${{ number_format($TotalPrice ?? 0) }}</div>
                            <div class="product-subtitle">Total</div>
                        </div>
                        <div class="col-8 col-md-3">
                            <button type="submit" class="btn btn-success mt-4 btn-block px-4">Chekout
                                Now</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>

    </section>
    </div>
@endsection
@push('addon-script')
    <script src="{{ url('vendor/vue/vue.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var lokasi = new Vue({
            el: '#lokasi',
            mounted() {
                AOS.init();
                this.getDataProvinsi();

            },
            data: {
                provinces: null,
                regencies: null,
                province_id: null,
                regency_id: null
            },
            methods: {
                getDataProvinsi() {
                    var self = this;
                    axios.get('{{ route('api-province') }}')
                        .then(function(response) {
                            self.provinces = response.data;
                        })
                },
                getDataKabupaten() {
                    var self = this;
                    axios.get('{{ url('api/api/regencies') }}/' + self.province_id)
                        .then(function(response) {
                            self.regencies = response.data;
                        })
                },
            },
            // ngeliat data perubahan sesuatu
            watch: {
                province_id: function(val, oldVal) {
                    this.regency_id = null;
                    this.getDataKabupaten();
                }
            }
        });
    </script>
@endpush
