@extends('backOffice.backoffice_layout')

@section('backoffice')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="userList">
                            <div class="card-header border-0">
                                <div class="row align-items-center gy-3">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">Users</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body pt-0">
                                <div>
                                    <div class="table-responsive table-card mb-1">
                                        <table class="table table-nowrap align-middle" id="userTable">
                                            <thead class="text-muted table-light">
                                            <tr class="text-uppercase">
                                                <th scope="col" style="width: 25px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                               value="option">
                                                    </div>
                                                </th>
                                                <th class="sort" data-sort="id">Name</th>
                                                <th class="sort" data-sort="username">Username</th>
                                                <th class="sort" data-sort="email">Email</th>
                                                <th class="sort" data-sort="usertype">User Type</th>
                                                <th class="sort" data-sort="actions">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                            @if (count($users) > 0)
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                       name="checkAll" value="option1">
                                                            </div>
                                                        </th>
                                                        <td class="name">{{ $user->name }}</td>
                                                        <td class="username">{{ $user->username }}</td>
                                                        <td class="email">{{ $user->email }}</td>
                                                        <td class="usertype">{{ $user->usertype }}</td>
                                                        <td class="actions">
                                                            <button type="button" class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteUserModal-{{ $user->id }}">
                                                                <i class="ri-delete-bin-5-fill fs-16"></i>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <!-- Delete User Modal -->
                                                    <div class="modal fade" id="deleteUserModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel-{{ $user->id }}" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteUserModalLabel-{{ $user->id }}">Confirm Deletion</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this user?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="fw-bold text-center py-5">
                                                    Nothing to display
                                                </div>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Pagination Links -->
                                {{ $users->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
