@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="post-project">
                        <h3>Edit Job</h3>
                        <div class="post-project-fields">
                            <form id="jobEditForm" action="{{ route('jobs.update', ['job' => $job->id]) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="text" name="title" placeholder="Title" value="{{ $job->title }}" required>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            @foreach($tags as $tag)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input form-check-input-sm" type="checkbox" name="skills[]" value="{{ $tag->id }}" id="tag{{ $tag->id }}" @if(in_array($tag->id, $job->tags->pluck('id')->toArray())) checked @endif>
                                                    <label class="form-check-label" for="tag{{ $tag->id }}">
                                                        {{ $tag->tagName }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="price-br">
                                            <input type="text" name="price1" placeholder="Price" value="{{ $job->salary }}" required>
                                            <i class="fa fa-dollar"></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="inp-field">
                                            <select name="location" required>
                                                <option value="Tunis" @if($job->location === 'Tunis') selected @endif>Tunis</option>
                                                <option value="Bizerte" @if($job->location === 'Bizerte') selected @endif>Bizerte</option>
                                                <option value="Aryanah" @if($job->location === 'Aryanah') selected @endif>Aryanah</option>
                                                <option value="Sousse" @if($job->location === 'Sousse') selected @endif>Sousse</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <textarea name="description" placeholder="Description" required>{{ $job->description }}</textarea>
                                    </div>

                                    <div class="col-lg-12">
                                        <ul>
                                            <li><button class="active" type="submit">Save Changes</button></li>
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
    </main>
@endsection
