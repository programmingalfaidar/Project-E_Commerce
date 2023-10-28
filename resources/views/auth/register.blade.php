@extends('layouts.auth')
@section('title')
    Page Register
@endsection

@section('content')
    <div class="page-content page-auth" id="register">
        <div class="section-store-auth">
            <div class="container">
                <div class="row align-items-center justify-content-center row-login">
                    <div class="col-lg-4">
                        <h2> Memulai untuk jual beli <br />
                            dengan cara terbaru</h2>
                        <form method="POST" action="{{ route('register') }}" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input id="name"
                                    class="form-control @error('name') is-invalid
                                @enderror "
                                    v-model="name" type="text" name="name" required autofocus autocomplete />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}
                                        </strong> </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input id="email" v-model="email" @change="cekEmail()" name="email"
                                    class="form-control
                                    @error('email') is-invalid
                                     @enderror"
                                    :class="{ 'is-invalid': this_email_unvialable }" type="email" required autocomplete
                                    autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}
                                        </strong> </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <x-text-input id="password" class="form-control @error('password') is-invalid @enderror"
                                    type="password" name="password" required autocomplete autofocus />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}
                                        </strong> </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""> Konfirmasi Password</label>
                                <x-text-input id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    type="password" name="password_confirmation" required autocomplete autofocus />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}
                                        </strong> </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <p class="text-muted"> Apakah anda juga ingin membuka toko?</p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="is_store_open"
                                        id="openStoreTrue" v-model="is_store_open" :value="true" />
                                    <label for="openStoreTrue" class="custom-control-label">Iya, Boleh</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="is_store_open"
                                        id="openStoreFalse" v-model="is_store_open" :value="false" />
                                    <label for="openStoreFalse" class="custom-control-label">Nggak, Makasih</label>
                                </div>
                            </div>
                            <div class="form-group" v-if="is_store_open">
                                <label for="">Nama Tokoh</label>
                                <input type="text" v-model="store_name" id="store_name"
                                    class="form-control @error('store_name') is-invalid @enderror
                                "
                                    name="store_name" required autocomplete autofocus>
                            </div>
                            <div class="form-group" v-if="is_store_open">
                                <label for="">Kategori</label>
                                <select name="categories_id" class="form-control">
                                    <option value="" disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->namaCategory }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success" :disabled="this_email_unvialable">Sign
                                Up</button>
                            <a href="{{ route('login') }}" class="btn btn-signup mt-3">Back To Sig in</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="{{ url('vendor/vue/vue.js') }}"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        Vue.use(Toasted);
        var register = new Vue({
            el: '#register',
            mounted() {
                AOS.init();

            },
            methods: {
                cekEmail: function() {
                    var self = this;
                    axios.get('{{ route('register-check') }}', {
                            params: {
                                email: this.email
                            }
                        })
                        .then(function(response) {
                            if (response.data == 'Available') {
                                this.$toasted.show(
                                    "Email anda Tersedia? Silahkan lanjutkan langkah anda.", {
                                        position: "top-center",
                                        className: "rounded",
                                        duration: 1000
                                    }
                                );
                                self.email_unvialable = false;
                            } else {
                                this.$toasted.error(
                                    "Maaf, Tampaknya Email Anda Sudah Terdaftar Di Sistem Ini.", {
                                        position: "top-center",
                                        className: "rounded",
                                        duration: 1000
                                    }
                                );
                                self.email_unvialable = true;
                            }
                            console.log(response);
                        })
                }
            },
            data() {
                return {
                    name: "Alfaidar Amir",
                    email: "idarfullstack@gmail.com",
                    is_store_open: true,
                    store_name: "",
                    email_unvialable: false
                }
            }
        });
    </script>
@endpush

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
