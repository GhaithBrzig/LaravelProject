@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <main>
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-8">
    <div class="post-project">
        <h3>Post a job</h3>
        <div class="post-project-fields">
            <form id="jobPostForm" action="{{ route('jobs.store') }}" method="post">
                @csrf <!-- CSRF token for security -->

                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" name="title" placeholder="Title" required>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            @foreach($tags as $tag)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input form-check-input-sm" type="checkbox" name="skills[]" value="{{ $tag->id }}" id="tag{{ $tag->id }}">
                                    <label class="form-check-label" for="tag{{ $tag->id }}">
                                        {{ $tag->tagName }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <br>
                    <br>
                    <br>

                    <div class="col-lg-6">
                        <div class="price-br">
                            <input type="text" name="price1" placeholder="Price" required>
                            <i class="fa fa-dollar"></i>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inp-field">
                            <select name="location" required>
                                <option value="Tunis">Tunis</option>
                                <option value="Bizerte">Bizerte</option>
                                <option value="Aryanah">Aryanah</option>
                                <option value="Sousse">Sousse</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="description" placeholder="Description" required></textarea>
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" type="submit">Post</button></li>
                            <li><a  href="{{ url('/') }}" title="">Cancel</a></li>
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
