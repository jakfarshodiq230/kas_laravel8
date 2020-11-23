<!DOCTYPE html>
<html lang="en">
<head>
@include('Layout.header')
@section('css')
  @show
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
 
<!-- navbar -->
@include('Layout.navbar')

<!--menu bar  -->
@include('Layout.menu')

<!-- conten -->
@include('Layout.content')

<!-- footer -->
@include('Layout.footer')
@section('js')
  @show
</body>
</html>