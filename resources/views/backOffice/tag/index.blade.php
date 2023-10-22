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
                                        <h5 class="card-title mb-0">Tags</h5>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="d-flex gap-1 flex-wrap">
                                            <a href="{{ route('tags.create') }}" class="btn btn-success add-btn"><i
                                                    class="ri-add-line align-bottom me-1"></i> Create tag</a>

                                        </div>
                                    </div>
                                </div>
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
                                                    <th class="sort" data-sort="id">tag name</th>
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
                                                                    class="fw-medium link-primary">{{ $row->tagName }}</a>
                                                            </td>

                                                            <td>
                                                                <form action="{{ route('tags.destroy', $row->id) }}"
                                                                    method="Post">
                                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <li class="list-inline-item"
                                                                            data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                            data-bs-placement="top" title="Remove">
                                                                            <button type="submit"
                                                                                class="text-danger d-inline-block remove-item-btn"
                                                                                data-bs-toggle="modal" href="#deleteOrder">
                                                                                <i class="ri-delete-bin-5-fill fs-16"></i>
                                                                            </button>
                                                                        </li>
                                                                    </ul>
                                                                </form>
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
                                    </div>
                                </div>
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
