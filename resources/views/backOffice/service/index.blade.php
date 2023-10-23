@extends('backOffice.backoffice_layout')

@section('backoffice')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="orderList">
                            <div class="card-header border-0">
                                <div class="row align-items-center gy-3">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">Services available</h5>
                                    </div>
                                </div>
                            </div>


                            <a style="margin-right: 10px;" class="btn btn-primary mr-2" href="/services" title=""> Clear Search</a>







                            <div class="card-body border border-dashed border-end-0 border-start-0">
                                <form>
                                    <div class="row g-3">
                                        <div class="col-xxl-5 col-sm-6">
                                            <div class="search-box">
                                                <form>


                                                        <input type="text" class="form-control search"
                                                            name="search"  placeholder="Search by title , type...">
                                                       </form>
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <div class="table-responsive table-card mb-1">
                                        <table class="table table-nowrap align-middle" id="orderTable">
                                            <thead class="text-muted table-light">
                                                <tr class="text-uppercase">
                                                    <th scope="col" style="width: 25px;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkAll"
                                                                value="option">
                                                        </div>
                                                    </th>
                                                    <th class="sort" data-sort="id">Service </th>
                                                    <th class="sort" data-sort="customer_name">Price per hour</th>
                                                    <th class="sort" data-sort="product_name">Description</th>
                                                    <th class="sort" data-sort="date">Type</th>
                                                    <th class="sort" data-sort="amount">added at</th>

                                                    <th class="sort" data-sort="city">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @if (count($data) > 0)
                                                    @foreach ($data as $row)
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="checkAll" value="option1">
                                                                </div>
                                                            </th>

                                                            <td class="id"><a href="apps-ecommerce-order-details.html"
                                                                    class="fw-medium link-primary">{{ $row->serviceName }}</a>
                                                            </td>
                                                            <td class="customer_name">$ {{ $row->pricePerHour }}</td>
                                                            <td class="product_name">{{ $row->description }}</td>

                                                            <td class="status">
                                                                <span
                                                                    class="badge bg-warning-subtle text-warning text-uppercase">{{ $row->type }}</span>
                                                            </td>
                                                            <td class="date">
                                                                {{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}
                                                                <!-- Display the date -->
                                                                <small class="text-muted">
                                                                    {{ \Carbon\Carbon::parse($row->created_at)->format('h:i A') }}
                                                                    <!-- Display the time -->
                                                                </small>
                                                            </td>


                                                            <td>
                                                                <ul class="list-inline hstack gap-2 mb-0">


                                                                    <li class="list-inline-item" data-bs-toggle="tooltip"
                                                                        data-bs-trigger="hover" data-bs-placement="top"
                                                                        title="Remove">
                                                                        <a class="text-danger d-inline-block remove-item-btn"
                                                                            data-bs-toggle="modal" href="#deleteOrder">
                                                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <div class="fw-bold text-center py-5   ">
                                                        nothing to display
                                                    </div>
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="noresult" style="display: none">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                    colors="primary:#405189,secondary:#0ab39c"
                                                    style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                <p class="text-muted">We've searched more than 150+ Orders We did not find
                                                    any orders for you search.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="pagination-wrap hstack gap-2">
                                            <a class="page-item pagination-prev disabled" href="#">
                                                Previous
                                            </a>
                                            <ul class="pagination listjs-pagination mb-0"></ul>
                                            <a class="page-item pagination-next" href="#">
                                                Next
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light p-3">
                                                <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <form class="tablelist-form" autocomplete="off">
                                                <div class="modal-body">
                                                    <input type="hidden" id="id-field" />

                                                    <div class="mb-3" id="modal-id">
                                                        <label for="orderId" class="form-label">ID</label>
                                                        <input type="text" id="orderId" class="form-control"
                                                            placeholder="ID" readonly />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="customername-field" class="form-label">Customer
                                                            Name</label>
                                                        <input type="text" id="customername-field"
                                                            class="form-control" placeholder="Enter name" required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="productname-field" class="form-label">Product</label>
                                                        <select class="form-control" data-trigger name="productname-field"
                                                            id="productname-field" required />
                                                        <option value="">Product</option>
                                                        <option value="Puma Tshirt">Puma Tshirt</option>
                                                        <option value="Adidas Sneakers">Adidas Sneakers</option>
                                                        <option value="350 ml Glass Grocery Container">350 ml Glass Grocery
                                                            Container</option>
                                                        <option value="American egale outfitters Shirt">American egale
                                                            outfitters Shirt</option>
                                                        <option value="Galaxy Watch4">Galaxy Watch4</option>
                                                        <option value="Apple iPhone 12">Apple iPhone 12</option>
                                                        <option value="Funky Prints T-shirt">Funky Prints T-shirt</option>
                                                        <option value="USB Flash Drive Personalized with 3D Print">USB
                                                            Flash Drive Personalized with 3D Print</option>
                                                        <option value="Oxford Button-Down Shirt">Oxford Button-Down Shirt
                                                        </option>
                                                        <option value="Classic Short Sleeve Shirt">Classic Short Sleeve
                                                            Shirt</option>
                                                        <option value="Half Sleeve T-Shirts (Blue)">Half Sleeve T-Shirts
                                                            (Blue)</option>
                                                        <option value="Noise Evolve Smartwatch">Noise Evolve Smartwatch
                                                        </option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="date-field" class="form-label">Order Date</label>
                                                        <input type="date" id="date-field" class="form-control"
                                                            data-provider="flatpickr" required data-date-format="d M, Y"
                                                            data-enable-time required placeholder="Select date" />
                                                    </div>

                                                    <div class="row gy-4 mb-3">
                                                        <div class="col-md-6">
                                                            <div>
                                                                <label for="amount-field"
                                                                    class="form-label">Amount</label>
                                                                <input type="text" id="amount-field"
                                                                    class="form-control" placeholder="Total amount"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div>
                                                                <label for="payment-field" class="form-label">Payment
                                                                    Method</label>
                                                                <select class="form-control" data-trigger
                                                                    name="payment-method" required id="payment-field">
                                                                    <option value="">Payment Method</option>
                                                                    <option value="Mastercard">Mastercard</option>
                                                                    <option value="Visa">Visa</option>
                                                                    <option value="COD">COD</option>
                                                                    <option value="Paypal">Paypal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <label for="delivered-status" class="form-label">Delivery
                                                            Status</label>
                                                        <select class="form-control" data-trigger name="delivered-status"
                                                            required id="delivered-status">
                                                            <option value="">Delivery Status</option>
                                                            <option value="Pending">Pending</option>
                                                            <option value="Inprogress">Inprogress</option>
                                                            <option value="Cancelled">Cancelled</option>
                                                            <option value="Pickups">Pickups</option>
                                                            <option value="Delivered">Delivered</option>
                                                            <option value="Returns">Returns</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="add-btn">Add
                                                            Order</button>
                                                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body p-5 text-center">
                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                    colors="primary:#405189,secondary:#f06548"
                                                    style="width:90px;height:90px"></lord-icon>
                                                <div class="mt-4 text-center">
                                                    <h4>You are about to delete a order ?</h4>
                                                    <p class="text-muted fs-15 mb-4">Deleting your order will remove all of
                                                        your information from our database.</p>
                                                    <div class="hstack gap-2 justify-content-center remove">
                                                        <button
                                                            class="btn btn-link link-success fw-medium text-decoration-none"
                                                            id="deleteRecord-close" data-bs-dismiss="modal"><i
                                                                class="ri-close-line me-1 align-middle"></i> Close</button>
                                                        <button class="btn btn-danger" id="delete-record">Yes, Delete
                                                            It</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end modal -->
                            </div>
                        </div>

                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
