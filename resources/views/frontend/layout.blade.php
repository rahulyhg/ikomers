<!DOCTYPE html>
<html>
<head>
<title>Endless | www.endless.id</title>

@include('frontend.common.meta')
@yield('addcss')
</head>
<body>


    @include('frontend.common.menu')
    
    @yield('content')

    @include('frontend.common.footer')
    
    @include('frontend.common.scripts')

    @yield('addscript')
</body>
</html>
