@extends('frontoffice.frontoffice_layout')

@section('frontoffice')
    <style>
        /* Override Bootstrap primary color */
        .badge-orange {
            background-color: #e34d3a;
            color: white;
        }

        .bg-orange {
            background-color: #e34d3a;
        }

        .text-orange {
            color: #e34d3a;
        }
        /* Custom button style */
        .custom-btn {
            background-color: #e34d3a; /* Orange color */
            color: white; /* White text */
            padding: 10px 20px; /* Adjust padding as needed */
            border: none; /* Remove default border */
            border-radius: 5px; /* Add some border radius for rounded corners */
            font-size: 16px; /* Adjust font size as needed */
            cursor: pointer; /* Add pointer cursor on hover */
        }

    </style>

    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header bg-orange text-white">
                            <h2>{{ $job->title }}</h2>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Details : </h4>
                                    <br>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Location
                                            <span class="badge badge-orange badge-pill">{{ $job->location }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Salary
                                            <span class="badge badge-orange badge-pill">${{ $job->salary }}/month</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h4>Skills Required : </h4>
                                    <br>
                                    <ul class="list-group">
                                        @foreach($job->tags as $tag)
                                            <li class="list-group-item">{{ $tag->tagName }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Description</h4>
                                    <p>{{ $job->description }}</p>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <a href="{{ url('/jobs') }}" class="custom-btn">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
