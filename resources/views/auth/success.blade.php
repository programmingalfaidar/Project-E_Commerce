@extends('layouts.success')

@section('title')
    Register Success
@endsection
@section('content')
    <div class="page-content page-success">
        <div class="section-success" data-aos="zoom-in">
            <div class="container">
                <div class="row align-items-center row-login justify-content-center">
                    <div class="col-lg-6 text-center">
                        <img src="images/success.svg" alt="" class="mb-4">
                        <h2>Registrasi Success</h2>
                        <p>
                            Akun Anda Sudah terdaftar <br />
                            Bersama Kami, Let's Grow Up!
                        </p>
                        </p>
                        <div>
                            <a class="btn btn-success w-50 mt-4" href="/dashboard.html">
                                My Dashboard
                            </a>
                            <a class="btn btn-signup w-50 mt-2" href="/index.html">
                                Go To Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
