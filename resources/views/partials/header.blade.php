<header id="header" class="js-site-header |">
    <div class="container">
        <a href="{{ home_url('/') }}" class="logo">
            @include('partials.logo')
        </a>

        <div class="desktop-nav | d-none d-md-block d-lg-block d-xl-block">
            @php(dynamic_sidebar('top-menu'))
        </div>

        <li class="d-block d-md-none d-lg-none d-xl-none | js-trigger-mobile-nav | ">
            <div class="mobile-indicator">
                <span>&nbsp;</span>
            </div>
        </li>
    </div>
    <div class="mobile-nav | d-block d-md-none d-lg-none d-xl-none">
        @php(dynamic_sidebar('top-menu'))
    </div>
</header>