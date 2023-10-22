@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <div class="post-project-fields">
        <h3 class="text-center mb-5 fw-bold ">Add Post </h3>

        <form action="{{ route('posts.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <input type="text" name="title" placeholder="Title">
                </div>
                 
                <div class="col-lg-12">
                            
                                 
                                    <div class="form-group">     
                                            
                                                <select name="category" id="category" class="form-control">
                                                    
                                                    <option>Career Advice</option>
                                                    <option>Success Stories</option>
                                                    <option>Mentorship</option>
                                                    <option>Entrepreneurship</option>
                                                    
                                                </select>
                                            
                                    </div> 
                
                
                <div class="col-lg-12">
                    <div class="form-group">
                     
                        <textarea  class="form-control" name="content" placeholder="content"></textarea>
               
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                     
                         <input class="form-control" name="photo" type="file" id="photo"> 
                    </div>
                </div> 
                <div class="col-lg-12">
                    <ul class="d-flex  justify-content-center ">
                        <li><button class="active" type="submit" value="post">Post</button></li>
                        <li><a href="{{ route('posts.index') }}" title="" >back</a></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
@endsection
