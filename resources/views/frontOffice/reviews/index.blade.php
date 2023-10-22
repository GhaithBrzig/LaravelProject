@extends('frontOffice.frontoffice_layout')

    @section('frontoffice')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .checked {
  color: orange;
}
</style>
		<section class="companies-info">
			<div class="container">
                @if(session('success'))
                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
				<div class="company-title">
					<h3>All Companies</h3>
				</div><!--company-title end-->
				<div class="companies-list">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            @foreach($reviews as $review)

							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/pf-icon1.png" alt="">
									<h3></h3>
									<h4>Graphic Designer</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										<li><a href="#" title="" class="hire-us">Hire</a></li>
									</ul>
                                    @for ($i = 0; $i < $review->rating; $i++)
                                <span class="fa fa-star checked"></span>
                            @endfor
                            @for ($i = $review->rating; $i < 5; $i++)
                            <span class="fa fa-star"></span>
                        @endfor
								</div>
                             
								<a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
							</div>
                            @endforeach<!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
                                    
                                    <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/icon8.png') }}">
									<h3>John Doe</h3>
									<h4>Graphic Designer</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										<li><a href="#" title="" class="hire-us">Hire</a></li>
									</ul>
								</div>
								<a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/pf-icon3.png" alt="">
									<h3>John Doe</h3>
									<h4>Graphic Designer</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										<li><a href="#" title="" class="hire-us">Hire</a></li>
									</ul>
								</div>
								<a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/pf-icon4.png" alt="">
									<h3>John Doe</h3>
									<h4>Graphic Designer</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										<li><a href="#" title="" class="hire-us">Hire</a></li>
									</ul>
								</div>
								<a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/pf-icon5.png" alt="">
									<h3>John Doe</h3>
									<h4>Graphic Designer</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										<li><a href="#" title="" class="hire-us">Hire</a></li>
									</ul>
								</div>
								<a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/pf-icon6.png" alt="">
									<h3>John Doe</h3>
									<h4>Graphic Designer</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										<li><a href="#" title="" class="hire-us">Hire</a></li>
									</ul>
								</div>
								<a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/pf-icon7.png" alt="">
									<h3>John Doe</h3>
									<h4>Graphic Designer</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										<li><a href="#" title="" class="hire-us">Hire</a></li>
									</ul>
								</div>
								<a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/pf-icon8.png" alt="">
									<h3>John Doe</h3>
									<h4>Graphic Designer</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										<li><a href="#" title="" class="hire-us">Hire</a></li>
									</ul>
								</div>
								<a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/pf-icon9.png" alt="">
									<h3>John Doe</h3>
									<h4>Graphic Designer</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										<li><a href="#" title="" class="hire-us">Hire</a></li>
									</ul>
								</div>
								<a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/pf-icon10.png" alt="">
									<h3>John Doe</h3>
									<h4>Graphic Designer</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										<li><a href="#" title="" class="hire-us">Hire</a></li>
									</ul>
								</div>
								<a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/pf-icon11.png" alt="">
									<h3>John Doe</h3>
									<h4>Graphic Designer</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										<li><a href="#" title="" class="hire-us">Hire</a></li>
									</ul>
								</div>
								<a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="images/resources/pf-icon12.png" alt="">
									<h3>John Doe</h3>
									<h4>Graphic Designer</h4>
									<ul>
										<li><a href="#" title="" class="follow">Follow</a></li>
										<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										<li><a href="#" title="" class="hire-us">Hire</a></li>
									</ul>
								</div>
								<a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
					</div>
				</div><!--companies-list end-->
				<div class="process-comm">
					<div class="spinner">
						<div class="bounce1"></div>
						<div class="bounce2"></div>
						<div class="bounce3"></div>
					</div>
				</div><!--process-comm end-->
			</div>
		</section><!--companies-info end-->
		<footer>
			<div class="footy-sec mn no-margin">
				<div class="container">
					<ul>
						<li><a href="help-center.html" title="">Help Center</a></li>
						<li><a href="about.html" title="">About</a></li>
						<li><a href="#" title="">Privacy Policy</a></li>
						<li><a href="#" title="">Community Guidelines</a></li>
						<li><a href="#" title="">Cookies Policy</a></li>
						<li><a href="#" title="">Career</a></li>
						<li><a href="forum.html" title="">Forum</a></li>
						<li><a href="#" title="">Language</a></li>
						<li><a href="#" title="">Copyright Policy</a></li>
					</ul>
					<p><img src="images/copy-icon2.png" alt="">Copyright 2019</p>
					<img class="fl-rgt" src="images/logo2.png" alt="">
				</div>
			</div>
		</footer>

	</div><!--theme-layout end-->



    @endsection