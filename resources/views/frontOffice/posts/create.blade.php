@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <div class="post-project-fields">
        <h3 class="text-center mb-5 fw-bold ">Add Post </h3>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <input type="text" name="title" placeholder="Title">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <select name="category" id="category" class="form-control">
                            <option>Category</option>
                            <option>Career Advice</option>
                            <option>Success Stories</option>
                            <option>Mentorship</option>
                            <option>Entrepreneurship</option>
                        </select>
                    </div>
                    @error('category')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea class="form-control" name="content" placeholder="Content"></textarea>
                        @error('content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <input class="form-control" name="photo" type="file" id="photo">
                        @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <ul class="d-flex  justify-content-center">
                        <li><button class="active" type="submit" value="post">Post</button></li>
                        <li><a href="{{ route('posts.index') }}" title="">Back</a></li>
                    </ul>
                </div>
            </div>
        </form>

    </div>
@endsection
