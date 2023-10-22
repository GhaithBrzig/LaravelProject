@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    @if (session('success'))
                        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <script>
                        // Function to remove the alert after 3 seconds
                        setTimeout(function() {
                            document.getElementById('success-alert').style.display = 'none';
                        }, 3000); // 3000 milliseconds = 3 seconds
                    </script>

                    <div class="row" style="height: 730px">
                        <div class="col-lg-3">
                            <div class="widget widget-about">
                                <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/wd-logo.png') }}"
                                    alt="">
                                <h3>Your Professional Journey Starts Here.</h3>
                                <div class="sign_link">
                                    <a href="sign-in.html" title="">Sign Up Now ! </a>
                                </div>
                            </div><!--widget-about end-->
                            <div class="filter-secs">
                                <div class="filter-heading">
                                    <h3>Filters</h3>
                                    <a href="#" title="">Clear all filters</a>
                                </div><!--filter-heading end-->
                                <div class="paddy">
                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Title</h3>
                                            <a href="#" title="">Clear</a>
                                        </div>
                                        <form>
                                            <input type="text" name="search-by-title" placeholder="Search by title">
                                        </form>
                                    </div>

                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Job Type</h3>
                                            <a href="#" title="">Clear</a>
                                        </div>
                                        <form class="Event-tp">
                                            <select>
                                                <option>Webinar</option>
                                                <option>Seminar</option>
                                                <option>Competition</option>
                                            </select>
                                        </form>
                                    </div>

                                </div>
                            </div><!--filter-secs end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec">
                                <div class="posts-section">
                                    @foreach ($eventData as $data)
                                        <div class="post-bar event-container" id="event-{{ $data['event']->id }}">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img
                                                        src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/us-pic.png') }}">
                                                    <div class="usy-name">
                                                        <h3> {{ $data['user'] ? $data['user']->username : 'N/A' }}</h3>
                                                        <span> <img
                                                                src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/clock.png') }}">3
                                                            min ago</span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="#" title="" class="ed-opts-open">
                                                        <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/menu.png') }}"
                                                            alt="Ellipsis Image">
                                                    </a>
                                                    <ul class="ed-options">
                                                        <li><a href="{{ route('events.edit', ['event' => $data['event']->id]) }}"
                                                                class="text-success">Edit event</a></li>
                                                        <li><a href="{{ route('events.show', ['event' => $data['event']->id]) }}"
                                                                class="text-info">Details</a></li>
                                                                <li>                        <form method="POST" action="{{ route('events.destroy', ['event' => $data['event']->id]) }}" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                                </form></li>

                                                        <li>
                                                            <form method="POST"
                                                                action="{{ route('events.attachUserToEvent') }}">
                                                                @csrf
                                                                <input type="hidden" name="event_id"
                                                                    value="{{ $data['event']->id }}">
                                                                <button type="submit">Attach User to Event</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="epi-sec">
                                                <ul class="descp">
                                                    <li>
                                                        <img
                                                            src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/icon8.png') }}"><span>
                                                            {{ $data['user'] ? $data['user']->name : 'N/A' }}</span>
                                                    </li>
                                                    <li>
                                                        <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/icon9.png') }}"
                                                            alt=""><span>{{ $data['event']->type }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="event_desc">
                                                <h3 style="font-size: 24px; font-weight: bold;">{{ $data['event']->title }}
                                                </h3>
                                                @php
                                                    $badgeClass = '';
                                                    switch ($data['event']->type) {
                                                        case 'Webinar':
                                                            $badgeClass = 'badge-primary';
                                                            break;
                                                        case 'Workshop':
                                                            $badgeClass = 'badge-success';
                                                            break;
                                                        case 'Fair':
                                                            $badgeClass = 'badge-warning';
                                                            break;
                                                        case 'Competition':
                                                            $badgeClass = 'badge-danger';
                                                            break;
                                                        case 'Seminar':
                                                            $badgeClass = 'badge-info';
                                                            break;
                                                        case 'Program':
                                                            $badgeClass = 'badge-secondary';
                                                            break;
                                                        case 'Virtual chat':
                                                            $badgeClass = 'badge-dark';
                                                            break;
                                                        default:
                                                            $badgeClass = 'badge-info'; // Default badge style
                                                    }
                                                @endphp
                                                <span class="badge {{ $badgeClass }}"
                                                    style="margin-top: 10px;">{{ $data['event']->type }}</span>
                                                <br>
                                                <br>
                                                <ul class="job-dt" style="margin-top: 10px; font-size: 12px;">
                                                    <li><strong>Date:</strong>
                                                        {{ date('d M Y H:i', strtotime($data['event']->eventDateTime)) }}
                                                    </li>
                                                    <br>
                                                    <br>
                                                    <li><span style="color: red;">!</span><span style="color: red;">!</span>
                                                        Make sure to <strong>reserve</strong> your spot before:
                                                        {{ $data['event']->reservationDeadline }} <span
                                                            style="color: red;">!</span><span style="color: red;">!</span>
                                                    </li>
                                                </ul>
                                                <p id="eventDescription-{{ $data['event']->id }}" style="display: none;">
                                                    {{ $data['event']->description }}</p>
                                                <img id="eventImage-{{ $data['event']->id }}" class="w-48 mr-6 mb-6"
                                                    src="{{ Vite::asset('storage/app/public/' . $data['event']->eventImage) }}"
                                                    alt="" style="display: none;">
                                                <br>
                                                <p style="margin-top: 10px;">
                                                    <a href="#" title=""
                                                        id="viewMoreLink-{{ $data['event']->id }}"
                                                        onclick="toggleDescription({{ $data['event']->id }})">View more</a>
                                                </p>
                                            </div>

                                            <!-- ... (other content) ... -->
                                        </div><!--post-bar end-->
                                    @endforeach
                                    <script>
                                        function toggleDescription(eventId) {
                                            var description = document.getElementById('eventDescription-' + eventId);
                                            var eventImage = document.getElementById('eventImage-' + eventId);
                                            var viewMoreLink = document.getElementById('viewMoreLink-' + eventId);

                                            if (description.style.display === 'none') {
                                                description.style.display = 'block';
                                                eventImage.style.display = 'block';
                                                viewMoreLink.innerText = 'View less';
                                            } else {
                                                eventImage.style.display = 'none';
                                                description.style.display = 'none';
                                                viewMoreLink.innerText = 'View more';
                                            }
                                        }
                                    </script>

                                </div><!--posts-section end-->
                            </div><!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">
                                <div class="widget widget-about">
                                    <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/wd-logo.png') }}"
                                        alt="">
                                    <h3>Connect, Engage, Succeed: Your Event, Your Impact!</h3>
                                    <div class="sign_link">
                                        <a href="{{ route('events.create') }}">Create Event !</a>
                                    </div>
                                </div><!--widget-about end-->



                                <div class="widget widget-jobs">

                                    <div class="sd-title">
                                        <h3>Most Viewed This Week</h3>
                                        <div class="jobs-list">
                                            <div class="job-info">
                                                <div class="job-details">
                                                    <h3>Senior Product Designer</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                                </div>
                                                <div class="hr-rate">
                                                    <span>$25/hr</span>
                                                </div>
                                            </div><!--job-info end-->
                                            <div class="job-info">
                                                <div class="job-details">
                                                    <h3>Senior UI / UX Designer</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                                </div>
                                                <div class="hr-rate">
                                                    <span>$25/hr</span>
                                                </div>
                                            </div><!--job-info end-->
                                            <div class="job-info">
                                                <div class="job-details">
                                                    <h3>Junior Seo Designer</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                                </div>
                                                <div class="hr-rate">
                                                    <span>$25/hr</span>
                                                </div>
                                            </div><!--job-info end-->
                                        </div><!--jobs-list end-->
                                    </div><!--widget-jobs end-->
                                </div><!--right-sidebar end-->
                            </div>
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>
@endsection
