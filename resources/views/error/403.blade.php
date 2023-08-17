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
      <!-- BEGIN: Page Title-->
      <title>Error-403</title>
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
   <body class="error-pages">
      <div>
         <div id="notfound">
            <div class="notfound">
               <div class="notfound-error-number">
                  <h1>403</h1>
               </div>
               <h2>Truy cập bị từ chối hoặc bị cấm</h2>
               <p>Trang bạn đang tìm kiếm có thể đã bị xóa do đổi tên hoặc tạm thời không có.</p>
               <a href="/" class="btn btn-outline-primary rounded-pill waves-effect" style="padding-left: 20px!important;padding-right: 20px!important;">Quay lại trang củ</a>
            </div>
         </div>
      </div>
   </body>
</html>
