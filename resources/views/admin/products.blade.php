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
                            + New Product
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">New Product</h1>
                                    <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('products.create') }}" id="supplierForm" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">SKU</label>
                                                <input type="text" class="form-control" name="sku">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Purchasing Price</label>
                                                <input type="text" class="form-control" name="purchase_price">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Selling Price</label>
                                                <input type="text" class="form-control" name="sale_price">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Quantity</label>
                                                <input type="text" class="form-control" name="quantity">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Unit (Measuring)</label>
                                                <select name="unit" id="" class="form-select">
                                                    <option value="pcs">Pcs</option>
                                                    <option value="dozen">Dozen</option>
                                                    <option value="kg">KG</option>
                                                </select>
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
                                <th>SKU</th>
                                <th>Purchasing Price</th>
                                <th>Selling Price</th>
                                <th>Quantity Left</th>
                                <th>Unit (Measuring)</th>
                                <th>Last Update Date</th>
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
            url: "{{ route('products.list') }}",
            type: "GET",
            dataSrc: "data.data"  // because your response: { data: [...] }
        },
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "sku" },
            { data: "purchase_price" },
            { data: "sale_price" },
            { data: "quantity" },
            { data: "unit" },
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