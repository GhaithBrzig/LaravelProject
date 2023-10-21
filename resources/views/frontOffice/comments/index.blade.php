@extends('frontoffice.frontoffice_layout')

@section('frontoffice')
    

    <main>
        <div class="container mt-5">
             <div class="col-md-8 mx-auto">
                <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="{{Vite::asset('assets/frontoffice_asset/images/resources/us-pic.png') }}"
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
                                                        <li><img src="{{Vite::asset('assets/frontoffice_asset/images/icon8.png') }}"
                                                                alt=""><span>Service</span>
                                                        </li>
                                                        <li><img src="{{Vite::asset('assets/frontoffice_asset/images/icon9.png') }}"
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
                                                                <a href="#"><i class="fas fa-heart"></i> Like</a>
                                                                <img   src="{{Vite::asset('assets/frontoffice_asset/images/iked-img.png') }}l" alt="">
                                                                
                                                            </li> 
                                                            <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment </a></li>
                                                           <li>
                                                           
                                                              


                                                                        
                                                               <a href="{{ url('/posts') }}" class="com">Go Back</a>
                                                                      
                                                                    
                                                            </li> 
                                                            
                                                            
                                                        </ul>
												
											        </div>
                                                    
                                                    

                                                </div>
                                               
                                            </div><!--post-bar end-->
                                           
                                       
            </div>
        <div class="container mt-5">
            <div class="col-md-8 mx-auto">
                <div class="posts-section">
              
                    <div class="post-bar">
                    <div class="card my-5">
					<h5 class="card-header">Add Comment</h5>
					<div class="card-body">
						<form method="post"action="">
						@csrf
                        
						<textarea name="content" class="form-control"></textarea>
						<input type="submit" class="btn btn-dark mt-2" />
					</div>
				</div>
                <!-- Fetch Comments -->
				<div class="card my-4">
					<h5 class="card-header">Comments </h5>
                        <div class="card-body">
                            @foreach ($comments  as $comment)
                                                        
                           
                                     <div class="post_topbar">
                                               
                                        <div class="ed-opts">
                                                                <a href="#" title="" class="ed-opts-open"><i
                                                                        class="fa fa-ellipsis-v"></i></a>
                                                                <ul class="ed-options">
                                                                        
                                                                            <a >Edit </a> 
                                                                            <a  class="text-danger">Delete</a>
                                                                        
                                                                        
                                                                
                                                                    
                                                                </ul>
                                        </div>
                                                        
                                        <div class="job_descp">
                                                                 
                                        <!-- Display comment content, user, and date -->
                                             <h3> User : {{ $comment->user->name }}</h3>
                                               <h4>{{ $comment->content }}</h4>
                                                                                
                                                

                                                                                <!-- Edit and Delete buttons for comments -->
                                        <div>
                           
                                                                                
                                                        </div>
                                             <h3><hr></h3>                           
                            @endforeach
                            
                        </div>
                                                
                                    
                                                
                                                        
                                                            
                    </div>
				</div>
			</div>
                        
                                                    
        </div>
                                          
                                       
    </div>
            
    </main>
@endsection
