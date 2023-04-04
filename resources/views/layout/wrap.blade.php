<!DOCTYPE html>
<html lang="en">
    @include('layout/header')
<head>
<body id='body'>
    @include('layout/navigasi')
    @include('layout/penimpah')
    @include($content)
    @include('layout/footer')
</body>
</html>
