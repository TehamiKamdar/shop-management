@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                        <!-- Alert trigger  -->
                    <div style="min-width: 185.125px;">
                        @if (session('success'))
                            <div class="alert alert-sm alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            + New Supplier
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">New Supplier</h1>
                                    <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('suppliers.create') }}" id="supplierForm" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Company</label>
                                                <input type="text" class="form-control" name="company_name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Phone</label>
                                                <input type="tel" class="form-control" name="phone">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="address">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Opening Balance</label>
                                                <input type="number" value="0" class="form-control" name="opening_balance"
                                                    disabled>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <table class="table table-dark table-striped-rows table-responsive" id="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Balance</th>
                                <th>Address</th>
                                <th>Last Payment Update</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {
    $('#table').DataTable({
        processing: true,
        serverSide: false, // agar pagination server pe chahiye to true kardena
        ajax: {
            url: "{{ route('suppliers.list') }}",
            type: "GET",
            dataSrc: "data.data"  // because your response: { data: [...] }
        },
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "phone" },
            { data: "company_name" },
            {
                data: "opening_balance",
                render: function(value) {
                    return value ?? 0;
                }
            },
            { data: "address" },
            {
                data: "updated_at",
                render: function(value) {
                    const d = new Date(value);
                    return d.getDate().toString().padStart(2, '0') + '-' +
                        (d.getMonth() + 1).toString().padStart(2, '0') + '-' +
                        d.getFullYear();
                }
            }
        ]
    });
});
</script>

@endsection