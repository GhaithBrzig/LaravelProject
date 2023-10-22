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
                                        <h5 class="card-title mb-0">List of Posts</h5>

                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body border border-dashed border-end-0 border-start-0">
                            <div class="row g-3">
                                <div class="col-xxl-1 col-sm-4">
                                    <a class="btn btn-primary w-100" href="/postsBack" title="">Clear all filters</a>
                                </div>
                               
                                   <form>
                                    <div class="row g-3">
                                        <div class="col-xxl-5 col-sm-6">
                                            <div class="search-box">
                                            <form>
                                            
                                        
                                                    <input type="text" class="form-control search"
                                                        name="search"  placeholder="Search by title ,content or category ...">
                                                   </form>
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                           
                                        </div>
                                        <!--end col-->
                                       
                                        <div class="card">
                                    <div class="card-header border-0 align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Filter by Category</h4>
                                        <div>
                                            <a href="/postsBack/?category=Success Stories"   class="btn btn-soft-secondary btn-sm">
                                            SUCCESS STORIES
                                            </a>
                                            <a  href="/postsBack/?category=Entrepreneurship"  class="btn btn-soft-secondary btn-sm">
                                            ENTREPRENEURSHIP
                                            </a>
                                            <a href="/postsBack/?category=Mentorship"  class="btn btn-soft-secondary btn-sm">
                                            MENTORSHIP
                                            </a>
                                            <a href="/postsBack/?category=Career Advice"   class="btn btn-soft-secondary btn-sm">
                                            Career Advice
                                            </a>
                                        </div>
                                        </div>
                                        <!--end col-->
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
                                                    <th class="sort" data-sort="id">title </th>
                                                    <th class="sort" data-sort="customer_name">Owner</th>
                                                    <th class="sort" data-sort="product_name">content</th>
                                                    <th class="sort" data-sort="date">category</th>
                                                    <th class="sort" data-sort="amount">added at</th>

                                                    <th class="sort" data-sort="city">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @if (count($posts) > 0)
                                                    @foreach ($posts as $post)
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="checkAll" value="option1">
                                                                </div>
                                                            </th>

                                                            <td class="id"><a href="apps-ecommerce-order-details.html"
                                                                    class="fw-medium link-primary">{{ $post->title }}</a>
                                                            </td>
                                            
                                                            
                                                            <td class="product_name">{{ $post->content }}</td>

                                                            <td class="status">
                                                                <span
                                                                    class="badge bg-warning-subtle text-warning text-uppercase">{{ $post->category }}</span>
                                                            </td>
                                                            <td class="date">
                                                                {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}
                                                                <!-- Display the date -->
                                                                
                                                            </td>


                                                            <td>
                                                                <form action="{{ route('postsBack.destroy', $post->id) }}"
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
