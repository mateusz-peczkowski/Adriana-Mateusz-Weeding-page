<!DOCTYPE html>
<html @php(language_attributes())>

  @include('partials.head')

  <body @php(body_class((App::isMobile() ? 'is-mobile' : 'is-desktop') . ' is-page-body'))>

    <div class="site--loader | js-loader-page |">
      <div class="logo">
        @include('partials.logo')
      </div>
    </div>

    @php(do_action('get_header'))

    @include('partials.header')

    @include('partials.right-widget-sidebar')

    @if(!$blockExternalContent)
      @if(get_page_template_slug() === 'views/template-homepage.blade.php')
        @include('partials.banner-homepage')
      @else
        @include('partials.banner')
      @endif
    @endif

    <div class="site--wrapper{{ $blockExternalContent ? ' is-no-padding-wrapper' : '' }}">
      @yield('content')
    </div>

    @php(do_action('get_footer'))

    @if(!$blockExternalContent)
      @include('partials.offer-box')
    @endif

    @include('partials.footer')

    @php(wp_footer())
  </body>
</html>