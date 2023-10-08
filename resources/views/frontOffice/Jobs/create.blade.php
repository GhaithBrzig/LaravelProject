@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <style>
        .error-message {
            color: #e34d3a;
            font-size: 0.875rem; /* 14px */
            margin-top: 0.25rem;
            display: block;
        }
    </style>

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
                                        <input type="text" name="title" placeholder="Title">
                                        <span class="error-message" id="titleError"></span>
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
                                            <span class="error-message" id="tagsError"></span>
                                        </div>
                                    </div>

                                    <br>
                                    <br>
                                    <br>

                                    <div class="col-lg-6">
                                        <div class="price-br">
                                            <input type="number" name="price1" placeholder="Price">
                                            <i class="fa fa-dollar"></i>
                                            <span class="error-message" id="priceError"></span>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="inp-field">
                                            <select name="location">
                                                <option value="Tunis">Tunis</option>
                                                <option value="Bizerte">Bizerte</option>
                                                <option value="Aryanah">Aryanah</option>
                                                <option value="Sousse">Sousse</option>
                                            </select>
                                            <span class="error-message" id="locationError"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="description" placeholder="Description"></textarea>
                                        <span class="error-message" id="descriptionError"></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <ul>
                                            <li><button class="active" type="button" onclick="validateForm()">Post</button></li>
                                            <li><a href="{{ url('/') }}" title="">Cancel</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div><!--post-project-fields end-->

                    </div><!--post-project end-->
                </div>
            </div>
        </div>

        <script>
            function validateForm() {
                const title = document.querySelector('input[name="title"]').value;
                const selectedTags = document.querySelectorAll('input[name="skills[]"]:checked');
                const price = document.querySelector('input[name="price1"]').value;
                const location = document.querySelector('select[name="location"]').value;
                const description = document.querySelector('textarea[name="description"]').value;

                const titleError = document.getElementById('titleError');
                const tagsError = document.getElementById('tagsError');
                const priceError = document.getElementById('priceError');
                const locationError = document.getElementById('locationError');
                const descriptionError = document.getElementById('descriptionError');

                titleError.innerText =  !title ? 'Please enter a title.' : '';
                tagsError.innerText = selectedTags.length < 1 ? 'Please select at least one tag.' : '';
                priceError.innerText = !price ? 'Please enter a price.' : '';
                locationError.innerText = !location ? 'Please select a location.' : '';
                descriptionError.innerText = !description ? 'Please enter a description.' : '';

                if (title && selectedTags.length > 0 && price && location && description) {
                    // All fields are valid, submit the form
                    document.getElementById('jobPostForm').submit();
                }
            }
        </script>
    </main>
@endsection
