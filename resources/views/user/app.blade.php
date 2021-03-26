<!DOCTYPE html>
<html lang="en">

<head>
  @include('user/layout/head')
</head>

<body>

 @include('user.layout.header')
 

 @yield('main-content')

  <!-- Footer -->
  @include('user.layout.footer')
</body>

</html>
