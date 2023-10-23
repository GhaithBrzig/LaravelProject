@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
<main>
    <section class="profile-account-setting">
    <div class="container">
        <div class="account-tabs-setting">
            <div class="row">
                    <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                        {{-- left bar --}}
                        @include('frontOffice.shared.feedLeftSidebar')
                </div>
                <div class="col-lg-9">
                    <h3>Edit Profile</h3>

                            <div class="login-sec">

                                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <label for="username">Username</label>
                                                <input type="text" name="username" id="username" value="{{ $user->username }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <label for="profileImage">Profile Image</label>
                                                <input type="file" name="profileImage" id="profileImage" class="form-control-file">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <label for="coverImage">Cover Image</label>
                                                <input type="file" name="coverImage" id="coverImage" class="form-control-file">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>

                            </div><!--acc-setting end-->
                        </div>

            </div>
        </div><!--account-tabs-setting end-->
    </div>
</section>

</main>
@endsection
