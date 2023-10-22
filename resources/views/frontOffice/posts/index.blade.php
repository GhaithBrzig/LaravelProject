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
                        
                        <div class="col-lg-3">
                            <div class="widget widget-about">
                                <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/wd-logo.png') }}"
                                     alt="">
                                <h3>Welcome To Our Blog</h3>
                               
                            </div><!--widget-about end-->
                            <div class="filter-secs">
                                <div class="filter-heading">
                                    <h3>Filters</h3>
                                    <a href="/posts" title="">Clear all filters</a>
                                </div><!--filter-heading end-->
                                <div class="paddy">
                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Search</h3>
                                            <a href="/posts" title="">Clear</a>
                                        </div>
                                        <form>
                                            <input type="text" name="search" placeholder="Search ">
                                        </form>
                                    </div>

                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Post Type</h3>
                                            <a href="/posts" title="">Clear</a>
                                            <div class="post-st">
                                                <ul>
                                                   <li><a href="/posts/?category=Career Advice" title="">Career Advice</a></li> 
                                                   <li> <a href="/posts/?category=Entrepreneurship" title="">Entrepreneurship</a></li>
                                                   <li> <a href="/posts/?category=Mentorship" title="">Mentorship</a></li> 
                                                   <li><a href="/posts/?category=Success Stories" title="">Success Stories</a></li> 
                                        
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    
                                </div>
                            </div><!--filter-secs end-->
                        
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
                                <div class="col-lg-12">
                    
                
                            
                                <!--post-topbar end-->

                                <div class="posts-section">
                                    
                                        @foreach ($posts as $post)
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/user.png') }}"
                                                            alt="">
                                                        <div class="usy-name">
                                                            <h3>{{ $post->user->username }} </h3>

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
                                                    <img class="w-48 mr-6 mb-6"  src="{{ Vite::asset('storage/app/public/' . $post->photo) }}"
                                                            alt="">
                                                            
                                                    <ul class="job-dt">
                                                    <br>
                                                        <li><a href="/posts/?category={{$post->category}}" title="">{{ $post->category }}</a></li>
                                                       
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
                                    
                                  
                                </div><!--posts-section end-->

                            </div><!--main-ws-sec end-->
                        </div>
                        {{-- left bar --}}
                      
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
