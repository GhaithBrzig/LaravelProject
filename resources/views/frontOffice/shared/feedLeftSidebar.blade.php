
<div class="main-left-sidebar no-margin">
    <div class="user-data full-width">
        <div class="user-profile">
            <div class="username-dt">
                <div class="usr-pic">
                    <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/user-pic.png') }}"
                        alt="">
                </div>
            </div><!--username-dt end-->
            <div class="user-specs">
                <h3> {{ strtoupper(Auth::user()->name) }}</h3>
                <span>{{ strtoupper(Auth::user()->username) }}</span>
            </div>
        </div><!--user-profile end-->
        <ul class="user-fw-status">
          
            <li>
                <a href="my-profile.html" title="">View Profile</a>
            </li>
        </ul>
    </div><!--user-data end-->
   
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
            <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/logo2.png') }}"
                alt="">
            <p><img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/cp.png') }}"
                    alt="">Copyright 2019</p>
        </div>
    </div><!--tags-sec end-->
</div><!--main-left-sidebar end-->
