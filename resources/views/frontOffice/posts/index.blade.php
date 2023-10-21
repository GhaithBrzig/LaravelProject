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
                    <div class="row">
                        <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                            <div class="main-left-sidebar no-margin">
                                <div class="user-data full-width">
                                    <div class="user-profile">
                                        <div class="username-dt">
                                            <div class="usr-pic">
                                                <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/user-pic.png') }}"
                                                    alt="">
                                            </div>
                                        </div><!--username-dt end-->
                                        <div class="user-specs">
                                            <h3>John Doe</h3>
                                            <span>Graphic Designer at Self Employed</span>
                                        </div>
                                    </div><!--user-profile end-->
                                    <ul class="user-fw-status">
                                        <li>
                                            <h4>Following</h4>
                                            <span>34</span>
                                        </li>
                                        <li>
                                            <h4>Followers</h4>
                                            <span>155</span>
                                        </li>
                                        <li>
                                            <a href="my-profile.html" title="">View Profile</a>
                                        </li>
                                    </ul>
                                </div><!--user-data end-->
                               <!--suggestions end-->
                                <div class="tags-sec full-width">
                                    <ul>
                                        <li><a href="#" title="">Help Center</a></li>
                                        <li><a href="#" title="">About</a></li>
                                        <li><a href="#" title="">Privacy Policy</a></li>
                                        <li><a href="#" title="">Community Guidelines</a></li>
                                        <li><a href="#" title="">Cookies Policy</a></li>
                                        <li><a href="#" title="">Career</a></li>
                                        <li><a href="#" title="">Language</a></li>
                                        <li><a href="#" title="">Copyright Policy</a></li>
                                    </ul>
                                    <div class="cp-sec">
                                        <img src="{{Vite::asset('assets/frontoffice_asset/images/logo2.png') }}" alt="">
                                        <p><img src="{{Vite::asset('assets/frontoffice_asset/images/cp.png') }}"
                                                alt="">Copyright 2019</p>
                                    </div>
                                </div><!--tags-sec end-->
                            </div><!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6 col-md-8 no-pd">
                            <div class="main-ws-sec">
                                <div class="post-topbar">
                                    <div class="user-picy">
                                        <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/user-pic.png') }}"
                                            alt="">
                                    </div>
                                    <div class="post-st">
                                        <ul>
                                           
                                            
                                            <li> <a class="button is-info" href="{{ route('posts.create') }}"> Add Post </a></li>
                                           

                                        </ul>
                                    </div><!--post-st end-->
                                </div>
                                <!--post-topbar end-->

                                <div class="posts-section">
                                    
                                        @foreach ($posts as $post)
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="{{Vite::asset($post->photo) }}"
                                                            alt="">
                                                        <div class="usy-name">
                                                            <h3>Acil Farhat </h3>

                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i
                                                                class="fa fa-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                                
                                                                    <li><a  href="{{ route('posts.edit',['post'=> $post->id]) }}">Edit Post</a></li>
                                                                    <li><a  href="{{ route('posts.show',['post'=> $post->id]) }}">details</a></li>
                                                                
                                                                    <li><a onclick="confirmDelete('{{ $post->title }}', {{ $post->id }})" class="text-danger"  href="#" title="">Delete</a></li>
                                                               
                                                            
                                                          
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="epi-sec">
                                                    <ul class="descp">
                                                        <li><img src="{{Vite::asset('resources/assets/frontoffice_asset/images/icon8.png') }}"
                                                                alt=""><span>Service</span>
                                                        </li>
                                                        <li><img src="{{Vite::asset('resources/assets/frontoffice_asset/images/icon9.png') }}"
                                                                alt=""><span>Tunisia</span></li>
                                                    </ul>
                                                    <ul class="bk-links">
                                                        <li><a href="#" title=""><i
                                                                    class="fa fa-bookmark"></i></a>
                                                        </li>
                                                        <li><a href="#" title=""><i
                                                                    class="fa fa-envelope"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="job_descp">
                                                    <h3>{{ $post->title }}</h3>
                                                    <ul class="job-dt">
                                                        <li><a href="#" title="">{{ $post->category }}</a></li>
                                                       
                                                    </ul>
                                                   
                                                    <p> {{ $post->content }} <a href="#" title=""></a></p>
												
                                                    <div class="job-status-bar">
                                                        <ul class="like-com">
                                                            <li>
                                                            <form action="{{ route('posts.like', ['post' => $post]) }}" method="post">
                                                                @csrf
                                                                <button type="submit"><a href="#"><i class="fa fa-heart"></i> Like {{ $post->likes }}</a></button>
                                                                
                                                            </form>
                                                           
                                                                
                                                                <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/liked-img.png') }}" alt="">
                                                            </li>
                                                       <li><a   class="com" href="{{ route('posts.show',['post'=> $post->id]) }}"><i class="fa fa-comment-alt"></i> Comment </a></li>
                                                        </ul>
												
											        </div>
                                                  
                                                </div>

                                            </div><!--post-bar end-->
                                       
                                          <!-- Add a hidden form for the delete action -->
                                          <form id="delete-post-{{ $post->id }}" action="{{ route('posts.destroy', ['post' => $post->id]) }}"
                                                  method="POST" style="display: none;" data-job-title="{{ $post->title }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div><!--post-bar end-->
                                    @endforeach

                                    <script>
                                        function confirmDelete(Title, Id) {
                                            var confirmation = confirm("Are you sure you want to delete this post: " + Title + "?");
                                            if (confirmation) {
                                                document.getElementById('delete-post-' + Id).submit();
                                            }
                                        }
                                    </script>
                                    
                                    <div class="top-profiles">
                                        <div class="pf-hd">
                                            <h3>Top Profiles</h3>
                                            <i class="la la-ellipsis-v"></i>
                                        </div>
                                        <div class="profiles-slider">
                                            <div class="user-profy">
                                                <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/user1.png') }}"
                                                    alt="">
                                                <h3>John Doe</h3>
                                                <span>Graphic Designer</span>
                                                <ul>
                                                    <li><a href="#" title="" class="followw">Follow</a></li>
                                                    <li><a href="#" title="" class="envlp"><img
                                                                src="{{Vite::asset('assets/frontoffice_asset/images/envelop.png') }}"
                                                                alt=""></a></li>
                                                    <li><a href="#" title="" class="hire">hire</a>
                                                    </li>
                                                </ul>
                                                <a href="#" title="">View Profile</a>
                                            </div><!--user-profy end-->
                                            <div class="user-profy">
                                                <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/user2.png') }}"
                                                    alt="">
                                                <h3>John Doe</h3>
                                                <span>Graphic Designer</span>
                                                <ul>
                                                    <li><a href="#" title="" class="followw">Follow</a></li>
                                                    <li><a href="#" title="" class="envlp"><img
                                                                src="{{Vite::asset('assets/frontoffice_asset/images/envelop.png') }}"
                                                                alt=""></a></li>
                                                    <li><a href="#" title="" class="hire">hire</a>
                                                    </li>
                                                </ul>
                                                <a href="#" title="">View Profile</a>
                                            </div><!--user-profy end-->
                                            <div class="user-profy">
                                                <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/user3.png') }}"
                                                    alt="">
                                                <h3>John Doe</h3>
                                                <span>Graphic Designer</span>
                                                <ul>
                                                    <li><a href="#" title="" class="followw">Follow</a></li>
                                                    <li><a href="#" title="" class="envlp"><img
                                                                src="{{Vite::asset('assets/frontoffice_asset/images/envelop.png') }}"
                                                                alt=""></a></li>
                                                    <li><a href="#" title="" class="hire">hire</a>
                                                    </li>
                                                </ul>
                                                <a href="#" title="">View Profile</a>
                                            </div><!--user-profy end-->
                                            <div class="user-profy">
                                                <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/user1.png') }}"
                                                    alt="">
                                                <h3>John Doe</h3>
                                                <span>Graphic Designer</span>
                                                <ul>
                                                    <li><a href="#" title="" class="followw">Follow</a></li>
                                                    <li><a href="#" title="" class="envlp"><img
                                                                src="{{Vite::asset('assets/frontoffice_asset/images/envelop.png') }}"
                                                                alt=""></a></li>
                                                    <li><a href="#" title="" class="hire">hire</a>
                                                    </li>
                                                </ul>
                                                <a href="#" title="">View Profile</a>
                                            </div><!--user-profy end-->
                                            <div class="user-profy">
                                                <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/user2.png') }}"
                                                    alt="">
                                                <h3>John Doe</h3>
                                                <span>Graphic Designer</span>
                                                <ul>
                                                    <li><a href="#" title="" class="followw">Follow</a></li>
                                                    <li><a href="#" title="" class="envlp"><img
                                                                src="{{Vite::asset('assets/frontoffice_asset/images/envelop.png') }}"
                                                                alt=""></a></li>
                                                    <li><a href="#" title="" class="hire">hire</a>
                                                    </li>
                                                </ul>
                                                <a href="#" title="">View Profile</a>
                                            </div><!--user-profy end-->
                                            <div class="user-profy">
                                                <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/user3.png') }}"
                                                    alt="">
                                                <h3>John Doe</h3>
                                                <span>Graphic Designer</span>
                                                <ul>
                                                    <li><a href="#" title="" class="followw">Follow</a></li>
                                                    <li><a href="#" title="" class="envlp"><img
                                                                src="{{Vite::asset('assets/frontoffice_asset/images/envelop.png') }}"
                                                                alt=""></a></li>
                                                    <li><a href="#" title="" class="hire">hire</a>
                                                    </li>
                                                </ul>
                                                <a href="#" title="">View Profile</a>
                                            </div><!--user-profy end-->
                                        </div><!--profiles-slider end-->
                                    </div><!--top-profiles end-->
                                </div><!--posts-section end-->

                            </div><!--main-ws-sec end-->
                        </div>
                        {{-- left bar --}}
                        <div class="col-lg-3 pd-right-none no-pd">
                            <div class="right-sidebar">
                                <div class="widget widget-about">
                                    <img src="{{Vite::asset('assets/frontoffice_asset/images/wd-logo.png') }}" alt="">
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
                                        <i class="la la-ellipsis-v"></i>
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
                                            <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/s1.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="fa fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/s2.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>John Doe</h4>
                                                <span>PHP Developer</span>
                                            </div>
                                            <span><i class="fa fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/s3.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Poonam</h4>
                                                <span>Wordpress Developer</span>
                                            </div>
                                            <span><i class="fa fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/s4.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Bill Gates</h4>
                                                <span>C &amp; C++ Developer</span>
                                            </div>
                                            <span><i class="lfa fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/s5.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="fa fa-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/s6.png') }}"
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

    
    <div class="post-popup job_post">
        <div class="post-project">
            <h3>Add Post </h3>
            <div class="post-project-fields">
               
            </div><!--post-project-fields end-->
            <a href="#" title="">x<i class="fa fa-times-circle-o"></i></a>
        </div><!--post-project end-->
    </div><!--post-project-popup end-->

   
@endsection
