@extends('layouts.admin-master')

@section('title')
Dashboard Finance
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Finance Management</h1>
        <div class="ml-auto">
            <a class="btn btn-primary" href="{{ route('dashboard.add') }}">
                <i class="fas fa-plus"></i>
                Add Finance
            </a>
        </div>
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
        <div class="table-responsive">
            <table id="financeDataTable" class="table table-striped table-md">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Transaction Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($finance as $item) : ?>
                        <tr>
                            <th scope="row"><?php echo $item->id; ?></th>
                            <td><?php echo $item->trans_name; ?></td>
                            <td><?php echo 'Rp. ' . $item->amount; ?></td>
                            <td><?php echo $item->status; ?></td>
                            <td><?php echo $item->created_at; ?></td>
                            <td>
                                <a class="btn btn-primary mr-1 btn-sm" href="{{ route('dashboard.edit', $item->id) }}">
                                    Edit
                                </a>
                                <a class="btn btn-danger deleteItem btn-sm" href="#modalDelete" data-toggle="modal" data-href="{{ route('dashboard.delete', $item->id) }}">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div id="modalDelete" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus data finance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Apa anda yakin ingin hapus data finance?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                <a href="" class="btn btn-danger deleteModal">Delete</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>

<script>
$(document).ready(function() {
    $('#financeDataTable').DataTable({
        "columnDefs": [
            { "sortable": false, "targets": [3,4] }
        ]
    });

    $('.deleteItem').click(function() {
        var href = $(this).data('href');
        $('.deleteModal').attr('href', href);
    });
});
</script>
@endsection