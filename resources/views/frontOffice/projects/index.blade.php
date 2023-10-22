
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
                                    <h3>Filter</h3>

                                </div><!--filter-heading end-->
                                <div class="paddy">
                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Project Name</h3>
                                            <a href="#" title="">Clear</a>
                                        </div>
                                        <form>
                                            <input type="text" name="search-by-title" placeholder="Search by Project Name">
                                        </form>
                                    </div>

                                    <div class="filter-dd">


                                    </div>


                                </div>
                            </div><!--filter-secs end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec">
                                <div class="posts-section">
                                    @foreach($projectData as $data)
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img src="{{Vite::asset('resources/assets/frontoffice_asset/images/resources/us-pic.png') }}">
                                                <div class="usy-name">
                                                    <h3>{{ $data['client'] ? $data['client']->name : 'N/A' }}</h3>
                                                    <span><box-icon name='time'></box-icon> 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="ed-opts">
                                                <a href="#" title="" class="ed-opts-open">
                                                    <img src="{{Vite::asset('resources\assets\frontoffice_asset\images\menu.png')}}" alt="Ellipsis Image">
                                                </a>
                                                <ul class="ed-options">
                                                    <li><a href="{{ route('projects.edit', ['project' => $data['project']->id]) }}" class="text-success">Edit project</a></li>
                                                    <li><a href="{{ route('projects.show', ['project' => $data['project']->id]) }}" class="text-info">Details</a></li>
                                                    <li>
                                                        <!-- Create a form to handle project deletion -->

                                                        <a onclick="confirmDelete('{{ $data['project']->name }}', {{ $data['project']->id }})" class="text-danger">Delete</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="epi-sec">

                                        </div>
                                        <br><br><br><br><br><br>
                                        <div class="event_desc">
                                            <h3 style="font-size: 24px; font-weight: bold;">{{ $data['project']->name }}</h3>


                                            <br><br>
                                            <p id="projectDescription">{{ $data['project']->description }}</p>
                                            <ul class="job-dt" style="margin-top: 10px;">
                                                <ul class="job-dt" style="margin-top: 10px; font-size: 12px;">
                                                    <li><strong style="font-size: 13px; font-weight: bold;">Start date : </strong> {{ date('d M Y H:i', strtotime($data['project']->start_date)) }}</li>
                                                    <br><br>
                                                    <li><strong style="font-size: 13px; font-weight: bold;">End date :  </strong> {{ date('d M Y H:i', strtotime($data['project']->end_date)) }}</li>
                                                    <br><br>
                                                    <li><strong style="font-size: 13px; font-weight: bold;">current Progress : </strong> {{ $data['project']->currentProgress }} </li>
                                                    <br><br>
                                                    <li><strong style="font-size: 13px; font-weight: bold;">budget : </strong> {{ $data['project']->budget }} <span style="color: green;"> $ </span></li>
                                                    <br><br>
                                                    <br><br><br><br>
                                                    <li> Click here to consult the project tasks </li><br><br>
                                                    <li><a href="/projects/{{ $data['project']->id }}/tasks">tasks</a></li>

                                                </ul>

                                            </ul>
                                        </div>



                                    </div><!--post-bar end-->

                                    <form id="delete-project-{{ $data['project']->id }}" action="{{ route('projects.destroy', ['project' => $data['project']->id]) }}"
                                        method="POST" style="display: none;" data-job-title="{{ $data['project']->name }}">
                                      @csrf
                                      @method('DELETE')
                                  </form>
                                    @endforeach

                                </div><!--posts-section end-->
                                <script>
                                    function confirmDelete(Title, Id) {
                                        var confirmation = confirm("Are you sure you want to delete this project: " + Title + "?");
                                        if (confirmation) {
                                            document.getElementById('delete-project-' + Id).submit();
                                        }
                                    }
                                </script>
                            </div><!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">
                                <div class="widget widget-about">
                                    <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/wd-logo.png') }}"
                                         alt="">
                                    <h3>Connect, Engage, Succeed: Your Project, Your Impact!</h3>
                                    <div class="sign_link">
                                        <a href="{{ route('projects.create') }}" >Create Project !</a>
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
                                                <h3>Senior UI / UX Designer</h3>
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





@endsection
