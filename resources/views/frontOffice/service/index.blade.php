@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                            {{-- left bar --}}
                            @include('frontOffice.shared.feedLeftSidebar')
                        </div>
                        <div class="col-lg-6 col-md-8 no-pd">
                            <div class="main-ws-sec">
                                {{-- post link --}}
                                <div class="post-topbar">
                                    <div class="post-st">
                                        <ul>
                                            <li>
                                                <a class="" href="{{ route('service.create') }}">Post a service</a>
                                        </ul>
                                    </div>
                                </div>
                                {{-- post link end --}}

                                <div class="posts-section">
                                    @if (session()->has('success'))
                                        <div class="alert alert-dismissable alert-success">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    {!! session()->get('success') !!}
                                                </div>
                                                <div>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (count($data) > 0)
                                        @foreach ($data as $row)
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">

                                                        <img src="{{ Vite::asset('storage/app/public/' . $row->user->profileImage) }}" width="30%"
                                                            alt="">
                                                        <div class="usy-name">
                                                            <h3>{{ $row->user->name }}</h3>
                                                            <span>
                                                                @if ($row->user->usertype === 'simple user')
                                                                    Developer
                                                                @else
                                                                    Company
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i
                                                                class="fa fa-ellipsis-v"></i></a>

                                                        <ul class="ed-options">

                                                            <form action="{{ route('service.destroy', $row->id) }}"
                                                                method="Post">

                                                                <div class="d-flex flex-column">
                                                                    <a class="btn btn-link"
                                                                        href="{{ route('service.edit', $row->id) }}">Edit</a>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-link ">Delete</button>
                                                                </div>

                                                            </form>
                                                            {{-- <li><a href="#" title="">Edit </a></li> --}}
                                                            <a href="{{ route('reviews.show', ['id' => $row->user->id]) }}">View Reviews</a>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="epi-sec">
                                                    <ul class="descp">
                                                        <li><img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/icon8.png') }}"
                                                                alt=""><span>Service</span>
                                                        </li>
                                                        {{-- <li><img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/icon9.png') }}"
                                                                alt=""><span>Tunisia</span></li> --}}
                                                    </ul>

                                                </div>
                                                <div class="job_descp">
                                                    <div class="d-flex">
                                                        <h3>{{ $row->serviceName }} </h3>

                                                    </div>
                                                    <ul class="job-dt">
                                                        <li><a href="#" title="">{{ $row->type }}</a></li>
                                                        <li><span> {{ $row->pricePerHour }} $/hr</span></li>
                                                    </ul>
                                                    <h5 class="text-secondary">Description</h5>
                                                    <p>
                                                        {{ $row->description }}
                                                    </p>
                                                    <ul class="skill-tags">
                                                        @foreach ($row->tags as $tag)
                                                            <li><a href="#"
                                                                    title="{{ $tag->tagName }}">{{ $tag->tagName }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                </div>

                                            </div>
                                            <!--post-bar end-->
                                        @endforeach
                                    @else
                                        <div class="fw-bold text-center py-5   ">
                                            nothing to display
                                        </div>
                                    @endif
                                    {{-- top profiles --}}
                                    @include('frontOffice.shared.topProfiles')

                                </div>
                                <!--posts-section end-->

                            </div>
                            <!--main-ws-sec end-->
                        </div>
                        {{-- right bar --}}
                        <div class="col-lg-3 pd-right-none no-pd">
                            <div class="right-sidebar">
                                <div class="widget widget-about">
                                    <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/wd-logo.png') }}"
                                        alt="">
                                    <h3>Track Time on Workwise</h3>
                                    <span>Pay only for the Hours worked</span>
                                    <div class="sign_link">
                                        <h3><a href="sign-in.html" title="">Sign up</a></h3>
                                        <a href="#" title="">Learn More</a>
                                    </div>
                                </div><!--widget-about end-->
                                <div class="widget widget-jobs">
                                    <div class="sd-title">
                                        <h3>Top Jobs</h3>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </div>
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
                                        <div class="job-info">
                                            <div class="job-details">
                                                <h3>Senior PHP Designer</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                            </div>
                                            <div class="hr-rate">
                                                <span>$25/hr</span>
                                            </div>
                                        </div><!--job-info end-->
                                        <div class="job-info">
                                            <div class="job-details">
                                                <h3>Senior Developer Designer</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                            </div>
                                            <div class="hr-rate">
                                                <span>$25/hr</span>
                                            </div>
                                        </div><!--job-info end-->
                                    </div><!--jobs-list end-->
                                </div><!--widget-jobs end-->
                                <div class="widget widget-jobs">
                                    <div class="sd-title">
                                        <h3>Most Viewed This Week</h3>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </div>
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
                                <div class="widget suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Most Viewed People</h3>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </div><!--sd-title end-->
                                    <div class="suggestions-list">
                                        <div class="suggestion-usd">
                                            <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/s1.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="fa fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/s2.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>John Doe</h4>
                                                <span>PHP Developer</span>
                                            </div>
                                            <span><i class="fa fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/s3.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Poonam</h4>
                                                <span>Wordpress Developer</span>
                                            </div>
                                            <span><i class="fa fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/s4.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Bill Gates</h4>
                                                <span>C &amp; C++ Developer</span>
                                            </div>
                                            <span><i class="fa fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/s5.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="fa fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/s6.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>John Doe</h4>
                                                <span>PHP Developer</span>
                                            </div>
                                            <span><i class="fa fa-plus"></i></span>
                                        </div>
                                        <div class="view-more">
                                            <a href="#" title="">View More</a>
                                        </div>
                                    </div><!--suggestions-list end-->
                                </div>
                            </div><!--right-sidebar end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>

@endsection
