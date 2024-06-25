@extends('layouts.admin-master')

@section('title')
Error Section
@endsection

@section('content')
<section class="section">
    <div class="container mt-5">
        <div class="page-error">
            <div class="page-inner">
                <h1>404</h1>
                <div class="page-description">
                    Mohon maaf, halaman yang anda cari tidak ada.
                </div>
                <div class="page-search">
                    <div class="mt-3">
                        <a href="{{ route('dashboard') }}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection