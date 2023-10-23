
<div class="main-left-sidebar no-margin">
    <div class="user-data full-width">
        <div class="user-profile">
            <div class="username-dt">
                <div class="usr-pic">
                    <img src="{{ Vite::asset('storage/app/public/' . Auth::user()->profileImage) }}"
                        alt="t">
                </div>
            </div><!--username-dt end-->
            <div class="user-specs">
                <h3> {{ strtoupper(Auth::user()->name) }}</h3>
                <span>{{ strtoupper(Auth::user()->username) }}</span>
            </div>
        </div><!--user-profile end-->

    </div><!--user-data end-->

    <div class="tags-sec full-width">
        <ul>
            <li><a href="#" title="">Help Center</a></li>
            <li><a href="#" title="">About</a></li>
        </ul>
        <div class="cp-sec">
            <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/logo2.png') }}"
                alt="">
            <p><img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/cp.png') }}"
                    alt="">Copyright 2019</p>
        </div>
    </div><!--tags-sec end-->
</div><!--main-left-sidebar end-->
