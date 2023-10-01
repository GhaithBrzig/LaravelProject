@extends('frontoffice.frontoffice_layout')

@section('frontoffice')
    

    <main>
        <div class="container mt-5">
             <div class="col-md-8 mx-auto">
             <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/us-pic.png') }}"
                                                            alt="">
                                                        <div class="usy-name">
                                                            <h3>Acil Farhat </h3>

                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i
                                                                class="la la-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                                
                                                                    <li><a  href="{{ route('posts.edit',['post'=> $post->id]) }}">Edit Post</a></li>
                                                                    <li><a  href="{{ route('posts.show',['post'=> $post->id]) }}">details</a></li>
                                                                
                                                                    <li><a onclick="confirmDelete('{{ $post->title }}', {{ $post->id }})" class="text-danger"  href="#" title="">Delete</a></li>
                                                               
                                                            
                                                          
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="epi-sec">
                                                    <ul class="descp">
                                                        <li><img src=""{{Vite::asset('assets/frontoffice_asset/images/icon8.png') }}"
                                                                alt=""><span>Service</span>
                                                        </li>
                                                        <li><img src=""{{Vite::asset('assets/frontoffice_asset/images/icon9.png') }}"
                                                                alt=""><span>Tunisia</span></li>
                                                    </ul>
                                                    <ul class="bk-links">
                                                        <li><a href="#" title=""><i
                                                                    class="la la-bookmark"></i></a>
                                                        </li>
                                                        <li><a href="#" title=""><i
                                                                    class="la la-envelope"></i></a>
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
                                                                <a href="#"><i class="fas fa-heart"></i> Like</a>
                                                                <img   src="images/liked-img.png" alt="">
                                                                <span>25</span>
                                                            </li> 
                                                            <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment 15</a></li>
                                                           <li>
                                                                        
                                                               <a href="{{ url('/posts') }}" class="com">Go Back</a>
                                                                      
                                                                    
                                                            </li> 
                                                            
                                                        </ul>
												
											        </div>
                                                </div>

                                            </div><!--post-bar end-->
                                            
                                       
            </div>
            
    </main>
@endsection
