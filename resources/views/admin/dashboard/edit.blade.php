@extends('layouts.admin-master')

@section('title')
<?php echo (isset($financeSelected) ? 'Edit Finance (' . $financeSelected->trans_name . ')' : 'Add Finance') ?>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1> <?php echo (isset($financeSelected) ? 'Edit Finance' : 'Add Finance') ?></h1>
    </div>
    <div class="section-body">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('dashboard.save') }}">
                    <div class="card">
                        <div class="card-body pb-0">
                            @csrf
                            <div class="form-group">
                                <label for="trans_name">Nama Transaksi</label>
                                <input type="text" class="form-control" id="trans_name" name="trans_name" aria-label="Transaksi Name" value="<?php echo (isset($financeSelected) ? $financeSelected->trans_name : '') ?>">
                            </div>
                            @error('trans_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="amount">Jumlah</label>
                                <input type="text" class="form-control" id="amount" name="amount" aria-label="Amount" value="<?php echo (isset($financeSelected) ? $financeSelected->amount : '') ?>">
                            </div>
                            @error('amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control status" id="status" name="status" aria-label="Status select">
                                    <?php if (isset($financeSelected) && ($financeSelected->status == "Debit")) : ?>
                                        <option value="Debit" selected>
                                            Debit
                                        </option>
                                        <option value="Kredit">
                                            Kredit
                                        </option>
                                    <?php else : ?>
                                        <option value="Debit">
                                            Debit
                                        </option>
                                        <option value="Kredit" selected>
                                            Kredit
                                        </option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" value="<?php echo (isset($financeSelected) ? $financeSelected->id : '') ?>" />
                            <button class="btn btn-primary btn-lg" type="submit">Simpan</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg ml-1">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
<style>
    .select2-container {
        width: 100% !important;
    }
</style>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".status").select2();
    });
</script>
@endsection