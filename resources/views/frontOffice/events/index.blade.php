
@extends('frontOffice.frontoffice_layout')

@section('frontoffice')

    <main>


        <div class="main-section">

            <div class="container">
                <div class="main-section-data">
                    @if(session('success'))
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
                                            <h3>Ttile</h3>
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

                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Countries</h3>
                                            <a href="#" title="">Clear</a>
                                        </div>
                                        <form class="job-tp">
                                            <select>
                                                <option>Select a country</option>
                                                <option>United Kingdom</option>
                                                <option>United States</option>
                                                <option>Russia</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div><!--filter-secs end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec">
                                <div class="posts-section">
                                    @foreach($eventData as $data)
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="{{Vite::asset('resources/assets/frontoffice_asset/images/resources/us-pic.png') }}">
                                                    <div class="usy-name">
                                                        <h3> {{ $data['user'] ? $data['user']->username : 'N/A' }}</h3>

                                                        <span> <img src="{{Vite::asset('resources/assets/frontoffice_asset/images/resources/clock.png') }}">3 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="#" title="" class="ed-opts-open">
                                                        <img src="{{Vite::asset('resources\assets\frontoffice_asset\images\menu.png')}}" alt="Ellipsis Image">
                                                    </a>
                                                    <ul class="ed-options">
                                                        <li><a href="{{ route('events.edit', ['event' => $data['event']->id]) }}" class="text-success">Edit event</a></li>
                                                        <li><a href="{{ route('events.show', ['event' => $data['event']->id]) }}" class="text-info">Details</a></li>
                                                        <li><a href="#" onclick="confirmDelete('{{ $data['event']->title }}', {{$data['event']->id }})" class="text-danger">Delete</a></li>
                                                        <li>
                                                            <form method="POST" action="{{ route('events.attachUserToEvent') }}">
                                                                @csrf
                                                                <input type="hidden" name="event_id" value="{{ $data['event']->id }}">

                                                                <button type="submit">Attach User to Event</button>
                                                            </form>

                                                        </li> </ul>
                                                </div>

                                            </div>

                                            <div class="epi-sec">
                                                <ul class="descp">
                                                    <li>
                                                        <img src="{{Vite::asset('resources/assets/frontoffice_asset/images/resources/icon8.png') }}"><span> {{ $data['user'] ? $data['user']->name : 'N/A' }}</span>
                                                    </li>
                                                    <li>
                                                        <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/icon9.png') }}"
                                                             alt=""><span>{{ $data['event']->type}}</span>
                                                    </li>
                                                </ul>
                                            </div><div class="event_desc">
                                                <h3 style="font-size: 24px; font-weight: bold;">{{ $data['event']->title }}</h3>
                                                @php
                                                $badgeClass = '';
                                                switch($data['event']->type) {
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
                                            <span class="badge {{ $badgeClass }}" style="margin-top: 10px;">{{ $data['event']->type }}</span>
                                            <br>
                                            <br>

                                                <ul class="job-dt" style="margin-top: 10px;">
                                                    <ul class="job-dt" style="margin-top: 10px; font-size: 12px;">
                                                       <!--  <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/wd-logo.png') }}"alt="Event Date" style="margin-right: 5px;">  Add your image URL and adjust styling as needed -->

                                                        <li><strong>Date:</strong> {{ date('d M Y H:i', strtotime($data['event']->eventDateTime)) }}</li>
                                                        <br>
                                                        <br>
                                                        <li><span style="color: red;">!</span><span style="color: red;">!</span> Make sure to <strong>reserve</strong> your spot before: {{ $data['event']->reservationDeadline }} <span style="color: red;">!</span><span style="color: red;">!</span></li>
                                                    </ul>


<p id="eventDescription" style="display: none;">{{ $data['event']->description }}</p>
<!-- Add the image element with a unique ID, initially hidden -->
<img id="eventImage" class="w-48 mr-6 mb-6" src="{{ Vite::asset('storage/app/public/' . $data['event']->eventImage) }}" alt="" style="display: none;">
<p style="margin-top: 10px;">
    <a href="#" title="" id="viewMoreLink" onclick="toggleDescription()">View more</a>
</p>   </div>

                                            <script>
                                                function toggleDescription() {
                                                    var description = document.getElementById('eventDescription');
                                                    var eventImage = document.getElementById('eventImage');

                                                    var viewMoreLink = document.getElementById('viewMoreLink');
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


                                            <!-- Add a hidden form for the delete action -->
                                            <form id="delete-event-{{ $data['event']->description}}" action="{{ route('events.destroy', ['event' => $data['event']->id]) }}"
                                                  method="POST" style="display: none;" data-event-title="{{ $data['event']->title }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div><!--post-bar end-->
                                    @endforeach

                                    <script>
                                        function confirmDelete(eventTitle, eventId) {
                                            var confirmation = confirm("Are you sure you want to delete the job: " + eventTitle + "?");
                                            if (confirmation) {
                                                document.getElementById('delete-event-' + eventId).submit();
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
                                        <a href="{{ route('events.create') }}" >Create Event !</a>
                                    </div>
                                </div><!--widget-about end-->



                                <div class="widget widget-jobs">

                                    <div class="sd-title">
                                        <h3>Most Viewed This Week</h3>     <div class="jobs-list">
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
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>

    <div class="post-popup pst-pj">
        <div class="post-project">
            <h3>Post a project</h3>
            <div class="post-project-fields">
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" name="title" placeholder="Title">
                        </div>
                        <div class="col-lg-12">
                            <div class="inp-field">
                                <select>
                                    <option>Category</option>
                                    <option>Category 1</option>
                                    <option>Category 2</option>
                                    <option>Category 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="text" name="skills" placeholder="Skills">
                        </div>
                        <div class="col-lg-12">
                            <div class="price-sec">
                                <div class="price-br">
                                    <input type="text" name="price1" placeholder="Price">
                                    <i class="fa fa-dollar"></i>
                                </div>
                                <span>To</span>
                                <div class="price-br">
                                    <input type="text" name="price1" placeholder="Price">
                                    <i class="fa fa-dollar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <textarea name="description" placeholder="Description"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <ul>
                                <li><button class="active" type="submit" value="post">Post</button></li>
                                <li><a href="#" title="">Cancel</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div><!--post-project-fields end-->
            <a href="#" title=""><i class="fa fa-times-circle-o"></i></a>
        </div><!--post-project end-->
    </div><!--post-project-popup end-->

    <div class="post-popup job_post">
        <div class="post-project">
            <h3>Post a job</h3>
            <div class="post-project-fields">
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" name="title" placeholder="Title">
                        </div>
                        <div class="col-lg-12">
                            <div class="inp-field">
                                <select>
                                    <option>Category</option>
                                    <option>Category 1</option>
                                    <option>Category 2</option>
                                    <option>Category 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="text" name="skills" placeholder="Skills">
                        </div>
                        <div class="col-lg-6">
                            <div class="price-br">
                                <input type="text" name="price1" placeholder="Price">
                                <i class="fa fa-dollar"></i>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="inp-field">
                                <select>
                                    <option>Full Time</option>
                                    <option>Half time</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <textarea name="description" placeholder="Description"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <ul>
                                <li><button class="active" type="submit" value="post">Post</button></li>
                                <li><a href="#" title="">Cancel</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div><!--post-project-fields end-->
            <a href="#" title="">x<i class="fa fa-times-circle-o"></i></a>
        </div><!--post-project end-->
    </div><!--post-project-popup end-->

    <div class="post-popup service_post">
        <div class="post-project">
            <h3>Post a service</h3>
            <div class="post-project-fields">
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" name="title" placeholder="Title">
                        </div>

                        <div class="col-lg-12">
                            <input type="text" name="skills" placeholder="Skills">
                        </div>
                        <div class="col-lg-6">
                            <div class="price-br">
                                <input type="text" name="price1" placeholder="Price">
                                <i class="fa fa-dollar"></i>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="inp-field">
                                <select>
                                    <option>Full Time</option>
                                    <option>Half time</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <textarea name="description" placeholder="Description"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <ul>
                                <li><button class="active" type="submit" value="post">Post</button></li>
                                <li><a href="#" title="">Cancel</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div><!--post-project-fields end-->
            <a href="#" title=""><i class="fa fa-times-circle-o"></i></a>
        </div><!--post-project end-->
    </div><!--post-project-popup end-->
@endsection
