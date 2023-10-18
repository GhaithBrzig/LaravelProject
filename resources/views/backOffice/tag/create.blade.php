@extends('backOffice.backoffice_layout')

@section('backoffice')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div>
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                            </div>
                            <form action="{{ route('tags.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3" id="modal-id">
                                        <label for="orderId" class="form-label">Tag name</label>
                                        <input type="text" class="form-control"name="tagName" placeholder="tag name" />
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">

                                        <button type="submit" value="post" class="btn btn-success" >Add tag</button>
                                        <a href="{{ route('tags.index') }}" class="btn btn-light">back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    </div>
@endsection
