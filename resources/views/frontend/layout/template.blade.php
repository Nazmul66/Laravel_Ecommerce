
<!DOCTYPE html>
<html lang="en">

<head>
     @include('frontend.includes.header')
     @include('frontend.includes.css')

</head>

<body class="theme-color-1 mulish-font">

    @include('frontend.includes.menu')

    
    @yield('body-content')


    @include('frontend.includes.footer')
    @yield('footer-content')

    @include('frontend.includes.script')

</body>

</html>