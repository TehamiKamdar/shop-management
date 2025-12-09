@extends('layouts.admin')

{{-- Extra Styles --}}
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
@endsection

{{-- Main Content --}}
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#purchaseModal">
                            + New Purchase
                        </button>
                    </div>

                    <!-- Modal -->
                    <!-- Bootstrap 5 Modal -->
                    <div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="purchaseModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                            <!-- half-screen width is good with xl -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="purchaseModalLabel">New Purchase Order</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <!-- Product Input Fields -->
                                    <div class="row g-2">
                                        <div class="col-md-3">
                                            <input type="text" id="productName" class="form-control"
                                                placeholder="Product Name">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="sku" class="form-control" placeholder="SKU">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="quantity" class="form-control" placeholder="Quantity"
                                                min="1">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="unitPrice" class="form-control"
                                                placeholder="Unit Price" min="0">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="total" class="form-control" placeholder="Total"
                                                readonly>
                                        </div>
                                        <div class="col-md-1 d-grid">
                                            <button type="button" id="addProduct" class="btn btn-primary">Add</button>
                                        </div>
                                    </div>

                                    <hr>

                                    <!-- Supplier + Purchase Info -->
                                    <div class="row g-2 mb-2">
                                        <div class="col-md-4">
                                            <select id="supplierName" class="form-control">
                                                <option value="">Select Supplier</option>
                                                <!-- options will be populated dynamically -->
                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <input type="date" id="purchaseDate" class="form-control"
                                                placeholder="Purchase Date">
                                        </div>
                                    </div>

                                    <!-- Purchase Items Table -->
                                    <table class="table table-bordered table-sm" id="purchaseItemsTable">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>SKU</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- rows added dynamically here -->
                                        </tbody>
                                    </table>

                                    <!-- Totals -->
                                    <div class="row g-2 mt-3">
                                        <div class="col-md-2">
                                            <input type="number" id="subTotal" class="form-control" placeholder="Sub Total"
                                                readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="discount" class="form-control" placeholder="Discount">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="tax" class="form-control" placeholder="Tax">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="deliveryCost" class="form-control"
                                                placeholder="Delivery Cost">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" id="grandTotal" class="form-control"
                                                placeholder="Grand Total" readonly>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer d-flex justify-content-between">
                                    <div>
                                        <strong>Total: </strong> $<span id="footerTotal">0</span>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" id="savePurchase">Save Purchase</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <table class="table table-dark table-striped-rows table-responsive" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice No</th>
                                <th>Supplier</th>
                                <th>Purchase Date</th>
                                <th>Due Date</th>
                                <th>Grand Total</th>
                                <th>Paid</th>
                                <th>Balance</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Extra Scripts --}}
@section('scripts')
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                processing: true,
                serverSide: false, // agar pagination server pe chahiye to true kardena
                ajax: {
                    url: "{{ route('purchases.list') }}",
                    type: "GET",
                    dataSrc: "data"  // because your response: { data: [...] }
                },
                columns: [
                    { data: 'id' },
                    { data: 'invoice_no' },
                    { data: 'supplier.name' },
                    { data: 'purchase_date' },
                    { data: 'due_date' },
                    { data: 'grand_total' },
                    { data: 'paid' },
                    { data: 'balance' },
                    { data: 'status' },
                    { data: 'actions', orderable: false, searchable: false }
                ],
                language: {
                    emptyTable: "No purchases found"
                }
            });
            $('#supplierName').select2({
                placeholder: "Select Supplier",
                allowClear: true,
                width: '100%',
                tags: true,
                dropdownParent: $('#purchaseModal'),
                ajax: {
                    url: "{{ route('suppliers.select') }}", // Your endpoint returning JSON of suppliers
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            page: params.page || 1
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.results,
                            pagination: { more: data.pagination.more }
                        };
                    },
                    cache: true
                },

                createTag: function (params) {
                    return {
                        id: 'new:' + params.term, // 👈 identify new supplier
                        text: params.term,
                        newOption: true
                    };
                },

                templateResult: function (data) {
                    if (data.newOption) {
                        return $('<span>➕ Add "<b>' + data.text + '</b>"</span>');
                    }
                    return data.text;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const quantityInput = document.getElementById('quantity');
            const unitPriceInput = document.getElementById('unitPrice');
            const totalInput = document.getElementById('total');
            const addProductBtn = document.getElementById('addProduct');
            const purchaseItemsTable = document.querySelector('#purchaseItemsTable tbody');
            const subTotalInput = document.getElementById('subTotal');
            const discountInput = document.getElementById('discount');
            const taxInput = document.getElementById('tax');
            const deliveryCostInput = document.getElementById('deliveryCost');
            const grandTotalInput = document.getElementById('grandTotal');
            const footerTotal = document.getElementById('footerTotal');

            // Calculate row total automatically
            function calculateRowTotal() {
                const qty = parseFloat(quantityInput.value) || 0;
                const price = parseFloat(unitPriceInput.value) || 0;
                totalInput.value = (qty * price).toFixed(2);
            }

            quantityInput.addEventListener('input', calculateRowTotal);
            unitPriceInput.addEventListener('input', calculateRowTotal);

            // Add product to table
            addProductBtn.addEventListener('click', function () {
                const productName = document.getElementById('productName').value.trim();
                const sku = document.getElementById('sku').value.trim();
                const quantity = parseFloat(quantityInput.value) || 0;
                const unitPrice = parseFloat(unitPriceInput.value) || 0;
                const total = parseFloat(totalInput.value) || 0;

                if (!productName || quantity <= 0 || unitPrice < 0) {
                    alert('Please fill valid product details');
                    return;
                }

                const row = document.createElement('tr');
                row.innerHTML = `
              <td>${productName}</td>
              <td>${sku}</td>
              <td>${quantity}</td>
              <td>${unitPrice.toFixed(2)}</td>
              <td>${total.toFixed(2)}</td>
              <td><button type="button" class="btn btn-sm btn-danger btn-remove">Remove</button></td>
            `;
                purchaseItemsTable.appendChild(row);

                // Clear input fields
                document.getElementById('productName').value = '';
                document.getElementById('sku').value = '';
                quantityInput.value = '';
                unitPriceInput.value = '';
                totalInput.value = '';

                updateTotals();
            });

            // Remove product row
            purchaseItemsTable.addEventListener('click', function (e) {
                if (e.target.classList.contains('btn-remove')) {
                    e.target.closest('tr').remove();
                    updateTotals();
                }
            });

            function updateTotals() {
                let subtotal = 0;
                purchaseItemsTable.querySelectorAll('tr').forEach(tr => {
                    subtotal += parseFloat(tr.children[4].textContent) || 0;
                });
                subTotalInput.value = subtotal.toFixed(2);

                const discount = parseFloat(discountInput.value) || 0;
                const tax = parseFloat(taxInput.value) || 0;
                const delivery = parseFloat(deliveryCostInput.value) || 0;

                const grandTotal = subtotal - discount + tax + delivery;
                grandTotalInput.value = grandTotal.toFixed(2);
                footerTotal.textContent = grandTotal.toFixed(2);
            }

            // Recalculate grand total when discount, tax, or delivery changes
            [discountInput, taxInput, deliveryCostInput].forEach(el => {
                el.addEventListener('input', updateTotals);
            });

        });
    </script>
@endsection