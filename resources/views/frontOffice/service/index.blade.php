@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                            <div class="main-left-sidebar no-margin">
                                <div class="user-data full-width">
                                    <div class="user-profile">
                                        <div class="username-dt">
                                            <div class="usr-pic">
                                                <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/user-pic.png') }}"
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
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Suggestions</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div><!--sd-title end-->
                                    <div class="suggestions-list">
                                        <div class="suggestion-usd">
                                            <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/s1.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/s2.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>John Doe</h4>
                                                <span>PHP Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/s3.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Poonam</h4>
                                                <span>Wordpress Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/s4.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Bill Gates</h4>
                                                <span>C & C++ Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/s5.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/s6.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>John Doe</h4>
                                                <span>PHP Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="view-more">
                                            <a href="#" title="">View More</a>
                                        </div>
                                    </div><!--suggestions-list end-->
                                </div><!--suggestions end-->
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
                                        <img src=""{{Vite::asset('assets/frontoffice_asset/images/logo2.png') }}" alt="">
                                        <p><img src=""{{Vite::asset('assets/frontoffice_asset/images/cp.png') }}"
                                                alt="">Copyright 2019</p>
                                    </div>
                                </div><!--tags-sec end-->
                            </div><!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6 col-md-8 no-pd">
                            <div class="main-ws-sec">
                                <div class="post-topbar">
                                    <div class="user-picy">
                                        <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/user-pic.png') }}"
                                            alt="">
                                    </div>
                                    <div class="post-st">
                                        <ul>
                                            <li><a class="post_project " href="#" title="">Post a Project</a>
                                            </li>
                                            <li><a class="post-jb " href="#" title="">Post a Job</a></li>
                                            <li><a class="post-service active" href="#" title="">Post a
                                                    Service</a></li>

                                        </ul>
                                    </div><!--post-st end-->
                                </div>
                                <!--post-topbar end-->

                                <div class="posts-section">
                                    @if (count($data) > 0)
                                        @foreach ($data as $row)
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/us-pic.png') }}"
                                                            alt="">
                                                        <div class="usy-name">
                                                            <h3>John Doe</h3>

                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i
                                                                class="la la-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                            <li><a href="#" title="">Edit Post</a></li>
                                                            <li><a href="#" title="">Unsaved</a></li>
                                                            <li><a href="#" title="">Unbid</a></li>
                                                            <li><a href="#" title="">Close</a></li>
                                                            <li><a href="#" title="">Hide</a></li>
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
                                                    <h3>{{ $row->serviceName }}</h3>
                                                    <ul class="job-dt">
                                                        <li><a href="#" title="">{{ $row->type }}</a></li>
                                                        <li><span>{{ $row->pricePerHour }}</span></li>
                                                    </ul>
                                                    <p>
                                                        {{ $row->serviceName }}
                                                        <a href="#" title="">view more</a>
                                                    </p>
                                                    <ul class="skill-tags">
                                                        <li><a href="#" title="">HTML</a></li>
                                                        <li><a href="#" title="">PHP</a></li>
                                                        <li><a href="#" title="">CSS</a></li>
                                                        <li><a href="#" title="">Javascript</a></li>
                                                        <li><a href="#" title="">Wordpress</a></li>
                                                    </ul>
                                                </div>

                                            </div><!--post-bar end-->
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="alert-danger py-5 ">No Data Found ssssssss</td>
                                        </tr>
                                    @endif
                                    <div class="top-profiles">
                                        <div class="pf-hd">
                                            <h3>Top Profiles</h3>
                                            <i class="la la-ellipsis-v"></i>
                                        </div>
                                        <div class="profiles-slider">
                                            <div class="user-profy">
                                                <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/user1.png') }}"
                                                    alt="">
                                                <h3>John Doe</h3>
                                                <span>Graphic Designer</span>
                                                <ul>
                                                    <li><a href="#" title="" class="followw">Follow</a></li>
                                                    <li><a href="#" title="" class="envlp"><img
                                                                src=""{{Vite::asset('assets/frontoffice_asset/images/envelop.png') }}"
                                                                alt=""></a></li>
                                                    <li><a href="#" title="" class="hire">hire</a>
                                                    </li>
                                                </ul>
                                                <a href="#" title="">View Profile</a>
                                            </div><!--user-profy end-->
                                            <div class="user-profy">
                                                <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/user2.png') }}"
                                                    alt="">
                                                <h3>John Doe</h3>
                                                <span>Graphic Designer</span>
                                                <ul>
                                                    <li><a href="#" title="" class="followw">Follow</a></li>
                                                    <li><a href="#" title="" class="envlp"><img
                                                                src=""{{Vite::asset('assets/frontoffice_asset/images/envelop.png') }}"
                                                                alt=""></a></li>
                                                    <li><a href="#" title="" class="hire">hire</a>
                                                    </li>
                                                </ul>
                                                <a href="#" title="">View Profile</a>
                                            </div><!--user-profy end-->
                                            <div class="user-profy">
                                                <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/user3.png') }}"
                                                    alt="">
                                                <h3>John Doe</h3>
                                                <span>Graphic Designer</span>
                                                <ul>
                                                    <li><a href="#" title="" class="followw">Follow</a></li>
                                                    <li><a href="#" title="" class="envlp"><img
                                                                src=""{{Vite::asset('assets/frontoffice_asset/images/envelop.png') }}"
                                                                alt=""></a></li>
                                                    <li><a href="#" title="" class="hire">hire</a>
                                                    </li>
                                                </ul>
                                                <a href="#" title="">View Profile</a>
                                            </div><!--user-profy end-->
                                            <div class="user-profy">
                                                <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/user1.png') }}"
                                                    alt="">
                                                <h3>John Doe</h3>
                                                <span>Graphic Designer</span>
                                                <ul>
                                                    <li><a href="#" title="" class="followw">Follow</a></li>
                                                    <li><a href="#" title="" class="envlp"><img
                                                                src=""{{Vite::asset('assets/frontoffice_asset/images/envelop.png') }}"
                                                                alt=""></a></li>
                                                    <li><a href="#" title="" class="hire">hire</a>
                                                    </li>
                                                </ul>
                                                <a href="#" title="">View Profile</a>
                                            </div><!--user-profy end-->
                                            <div class="user-profy">
                                                <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/user2.png') }}"
                                                    alt="">
                                                <h3>John Doe</h3>
                                                <span>Graphic Designer</span>
                                                <ul>
                                                    <li><a href="#" title="" class="followw">Follow</a></li>
                                                    <li><a href="#" title="" class="envlp"><img
                                                                src=""{{Vite::asset('assets/frontoffice_asset/images/envelop.png') }}"
                                                                alt=""></a></li>
                                                    <li><a href="#" title="" class="hire">hire</a>
                                                    </li>
                                                </ul>
                                                <a href="#" title="">View Profile</a>
                                            </div><!--user-profy end-->
                                            <div class="user-profy">
                                                <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/user3.png') }}"
                                                    alt="">
                                                <h3>John Doe</h3>
                                                <span>Graphic Designer</span>
                                                <ul>
                                                    <li><a href="#" title="" class="followw">Follow</a></li>
                                                    <li><a href="#" title="" class="envlp"><img
                                                                src=""{{Vite::asset('assets/frontoffice_asset/images/envelop.png') }}"
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
                                    <img src=""{{Vite::asset('assets/frontoffice_asset/images/wd-logo.png') }}" alt="">
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
                                        <i class="la la-ellipsis-v"></i>
                                    </div><!--sd-title end-->
                                    <div class="suggestions-list">
                                        <div class="suggestion-usd">
                                            <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/s1.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/s2.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>John Doe</h4>
                                                <span>PHP Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/s3.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Poonam</h4>
                                                <span>Wordpress Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/s4.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Bill Gates</h4>
                                                <span>C &amp; C++ Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/s5.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src=""{{Vite::asset('assets/frontoffice_asset/images/resources/s6.png') }}"
                                                alt="">
                                            <div class="sgt-text">
                                                <h4>John Doe</h4>
                                                <span>PHP Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
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
                                    <i class="la la-dollar"></i>
                                </div>
                                <span>To</span>
                                <div class="price-br">
                                    <input type="text" name="price1" placeholder="Price">
                                    <i class="la la-dollar"></i>
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
            <a href="#" title=""><i class="la la-times-circle-o"></i></a>
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
                                <i class="la la-dollar"></i>
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
            <a href="#" title="">x<i class="la la-times-circle-o"></i></a>
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
                                <i class="la la-dollar"></i>
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
            <a href="#" title=""><i class="la la-times-circle-o"></i></a>
        </div><!--post-project end-->
    </div><!--post-project-popup end-->
@endsection
