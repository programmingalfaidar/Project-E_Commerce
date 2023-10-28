<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>
    <!-- cdn bostrap -->
    {{-- include style blade --}}
    @stack('prepand-style')
    @include('includes.style')
    @stack('addon-style')


</head>

<body>

    <!-- page content yield  content -->
    @yield('content')


    {{-- include footer --}}
    @include('includes.footer')




    <!-- Bootstrap core JavaScript include script -->
    @stack('prepand-script')
    @include('includes.script')
    @stack('addon-script')

</body>

</html>
