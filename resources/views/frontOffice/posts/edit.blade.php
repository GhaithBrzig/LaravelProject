@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="post-project">
                        <h3>Edit Post</h3>
                        <div class="post-project-fields">
                            <form id="jobEditForm" action="{{ route('posts.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input type="text" name="title" placeholder="Title" value="{{ $post->title }}" required>
                                                @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <select name="category" id="category" class="form-control">
                                                        <option value="Career Advice" @if($post->category === 'Career Advice') selected @endif>Career Advice</option>
                                                        <option value="Success Stories" @if($post->category === 'Success Stories') selected @endif>Success Stories</option>
                                                        <option value="Mentorship" @if($post->category === 'Mentorship') selected @endif>Mentorship</option>
                                                        <option value="Entrepreneurship" @if($post->category === 'Entrepreneurship') selected @endif>Entrepreneurship</option>
                                                    </select>
                                                    @error('category')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="content" placeholder="Content" required>{{ $post->content }}</textarea>
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
                                                <ul class="d-flex justify-content-center">
                                                    <li><button class="active" type="submit" value="post">Edit</button></li>
                                                    <li><a href="{{ route('posts.index') }}" title="">Back</a></li>
                                                </ul>
                                            </div>
                                        </div>
                            </form>

                        </div><!--post-project-fields end-->
                    </div><!--post-project end-->
                </div>
            </div>
        </div>
    </main>
@endsection
