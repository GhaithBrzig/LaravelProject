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
                                    <h5 class="card-title mb-0">List of Events</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border border-dashed border-end-0 border-start-0">
                            <!-- Add your search and filter form here if needed -->
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <div class="table-responsive table-card mb-1">
                                    <table class="table table-nowrap align-middle" id="orderTable">
                                        <thead class="text-muted table-light">
                                            <tr class="text-uppercase">
                                                <th scope="col" style="width: 25px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>
                                                <th class="sort" data-sort="id">Title</th>
                                                <th class="sort" data-sort="customer_name">Owner</th>
                                                <th class="sort" data-sort="product_name">Content</th>
                                                <th class="sort" data-sort="date">Type</th>
                                                <th class="sort" data-sort="amount">Added At</th>
                                                <th class="sort" data-sort="city">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @if (count($eventData) > 0)
                                                @foreach ($eventData as $event)
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                                            </div>
                                                        </th>
                                                        <td class="id">
                                                           {{ $event['event']->title }}
                                                        </td>
                                                        <td class="customer_name">{{ $event['user']->username }}</td>
                                                        <td class="product_name">{{ $event['event']->description }}</td>
                                                        <td class="status">
                                                            <span
                                                                class="badge bg-warning-subtle text-warning text-uppercase">{{ $event['event']->type }}</span>
                                                        </td>
                                                        <td class="date">
                                                            {{ \Carbon\Carbon::parse($event['event']->created_at)->format('Y-m-d') }}
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('eventsBack.destroy', $event['event']->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @else
                                                <div class="fw-bold text-center py-5">
                                                    Nothing to display
                                                </div>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">Previous</a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#">Next</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
