<div class="top">
    <img class="logo" onclick="location.assign('#');" src="/images/frontend/general/top/diageo.png" alt="DIAGEO" />

    <div class="menu">
        <div class="search">
            <a href="{{ route('search') }}"><img src="/images/frontend/general/top/search/input_background.png" alt="search"/></a>
        </div>

        <a href="#">LOGOUT</a>
        <a href="#" class="{{(request()->is('trend')) ? ' active' : '' }}" target="_self">TRENDS</a>
        <a href="#" class="{{(request()->is('social_tension')) ? ' active' : '' }}" target="_self">SOCIAL TENSIONS</a>
        <a href="#" class="{{(request()->is('home')) ? ' active' : '' }}" target="_self">HOME</a>
    </div>
</div>