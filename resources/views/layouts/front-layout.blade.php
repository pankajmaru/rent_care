<!DOCTYPE html>
<html lang="en">
    @include('layouts.partials.head')
    <body class="hold-transition sidebar-mini layout-fixed">

          @include('layouts.partials.header') 

          @include('layouts.partials.sidebar') 

          @yield('content')

          @include('layouts.partials.footer')

          @include('layouts.partials.footerscripts')

    </body>
</html>