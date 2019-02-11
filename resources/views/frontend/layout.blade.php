<!DOCTYPE html>
<html>
<head>
<title>Endless | www.endless.id</title>

@include('frontend.common.meta')

</head>
<body>


    @include('frontend.common.menu')
    
    @yield('content')

    @include('frontend.common.footer')
    
    @include('frontend.common.scripts')
</body>
</html>
