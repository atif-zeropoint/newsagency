<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.partials.head')
</head>
<body>
@include('layout.partials.nav')
<?php //@include('layout.partials.header')?>
@yield('content')
@include('layout.partials.footer')
@include('layout.partials.footer-script')
 </body>
</html>
