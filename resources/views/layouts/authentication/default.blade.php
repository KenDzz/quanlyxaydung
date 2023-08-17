<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="keyword" content="">
      <meta name="author"  content=""/>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <!-- BEGIN: Page Title-->
      <title>@yield('title') - Quản lý dự án xây dựng</title>
      <link type="text/css" rel="stylesheet" href="{{url('css/notiflix-3.2.6.min.css')}}">
      <!-- END:  Page Title-->
      <!-- BEGIN: Custom CSS-->
      <link type="text/css" rel="stylesheet" href="{{url('css/style.css')}}"/>
      <!-- END: Custom CSS-->
      <!-- BEGIN: Favicon-->
      <link type="image/x-icon" rel="icon" href="{{url('images/favicon.ico')}}">
      <!-- END: Favicon-->
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn"t work if you view the page via file: -->
      <!--[if lt IE 9]>
      <script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <!--================================-->
      <!-- Page Content Start -->
      <!--================================-->
      @yield('content')
      <!--/ Page Content End -->
      <script src="{{url('js/jquery-3.7.0.min.js')}}"></script>
      <script src="{{url('js/notiflix-3.2.6.min.js')}}"></script>
      <script src="{{url('js/function.js')}}"></script>
   </body>
</html>
