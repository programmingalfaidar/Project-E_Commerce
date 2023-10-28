@extends('layouts.dashboard')

@section('title')
    Dashboard Account Page
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle"> Look what you have made today!</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('dashboard-account-redirect', 'dashboard-account') }}" method="Post"
                            enctype="multipart/form-data" id="lokasi">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Your Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Your Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ $user->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="addresOne">Address 1</label>
                                                <input type="text" class="form-control" id="alamat1" name="alamat1"
                                                    value="{{ $user->alamat1 }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alamat2">Address 2</label>
                                                <input type="text" class="form-control" id="alamat2" name="alamat2"
                                                    value="{{ $user->alamat2 }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="province">Province</label>
                                                <select class="form-select" name="province_id" v-if="provinces"
                                                    v-model="province_id">
                                                    <option v-for="province in provinces" :value="province.id">
                                                        @{{ province.name }}
                                                    </option>

                                                </select>
                                                <select v-else class="form-control"></select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="regency_id">Kabupaten</label>
                                                <select class="form-select" name="regency_id" id="regency_id"
                                                    v-if="regencies" v-model="regency_id">
                                                    <option v-for="regency in regencies" :value="regency.id">
                                                        @{{ regency.name }}
                                                    </option>

                                                </select>
                                                <select v-else class="form-control"></select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="postalCode">Postal Code</label>
                                                <input type="text" class="form-control" id="postalCode" name="kode_pos"
                                                    value="48592">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" id="country" name="negara"
                                                    value="Setra Duta Cemara">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile">Mobile</label>
                                                <input type="text" class="form-control" id="mobile" name="mobile"
                                                    value="+624178192937">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-4">Save Now</button>
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
