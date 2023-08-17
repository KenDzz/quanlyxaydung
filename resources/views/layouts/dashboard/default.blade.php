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
      <!-- END:  Page Title-->
      <!-- BEGIN: Vendor CSS-->
      <link type="text/css" rel="stylesheet" href="{{url('plugins/chart.js/chart.min.css')}}"/>
      <link type="text/css" rel="stylesheet" href="{{url('plugins/daterangepicker/daterangepicker.css')}}"/>
      <link type="text/css" rel="stylesheet" href="{{url('plugins/d3/cal-heatmap/cal-heatmap.css')}}"/>
      <link type="text/css" rel="stylesheet" href="{{url('plugins/jqvmap/jquery-jvectormap-2.0.2.css')}}"/>
      <link type="text/css" rel="stylesheet" href="{{url('plugins/select2/css/select2.min.css')}}">
      <link type="text/css" rel="stylesheet" href="{{url('css/notiflix-3.2.6.min.css')}}">
      <!-- END: Vendor CSS-->
      <!-- BEGIN: Custom CSS-->
      <link type="text/css" rel="stylesheet" href="{{url('css/style.css')}}"/>
      <!-- END: Custom CSS-->
      <!-- BEGIN: Favicon-->
      <link type="image/x-icon" rel="icon" href="{{url('images/favicon.ico')}}"/>
      <!-- END: Favicon-->
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn"t work if you view the page via file: -->
      <!--[if lt IE 9]>
      <script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}></script>
      <script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js')}}></script>
      <![endif]-->
   </head>
   <body>
      <!--================================-->
      <!-- Page Container Start -->
      <!--================================-->
      <div class="page-container">
        @include('layouts.dashboard.sidebar')
        @include('layouts.dashboard.header')
         <!--================================-->
         <!-- Page Content Start -->
         <!--================================-->
         <div class="page-content">
            @yield('content')
            @include('layouts.dashboard.footer')
         </div>
         <!--/ Page Content End -->
      </div>
      <!--/ Page Container End -->
      <!--================================-->
      <!-- Scroll To Top Start-->
      <!--================================-->
      <a href="" data-click="scroll-top" class="btn-scroll-top fade waves-effect"><i data-feather="arrow-up" class="wd-16"></i></a>
      <!--/ Scroll To Top End -->
      <!-- BEGIN: Theme Customizer-->
      <div class="settingSidebar">
         <a href="javascript:void(0)" class="settingPanelToggle tooltip-primary" data-toggle="tooltip" data-trigger="hover" data-placement="left" title="" data-original-title="Theme Customizer">
         <i class="fa fa-cog fa-spin tx-20"></i>
         </a>
         <div class="settingSidebar-body ps-container ps-theme-default">
            <div class="fade show active">
               <div class="pd-15 bg-gray-100 bd-b">
                  <span class="tx-15 tx-medium d-block">Template Customizer</span>
                  <span class="tx-8 tx-uppercase mg-t-5 tx-spacing-2 d-block ">Customize & Real Time Preview</span>
               </div>
               <div class="pd-15 bd-b">
                  <h6 class="tx-15 mg-b-10">Theme Color</h6>
                  <div class="theme-setting-options">
                     <ul class="theme-color list-unstyled mb-0">
                        <li title="default" class="">
                           <div class="default"></div>
                        </li>
                        <li title="cyan">
                           <div class="cyan"></div>
                        </li>
                        <li title="blue">
                           <div class="blue"></div>
                        </li>
                        <li title="purple">
                           <div class="purple"></div>
                        </li>
                        <li title="orange">
                           <div class="orange"></div>
                        </li>
                        <li title="green">
                           <div class="green"></div>
                        </li>
                        <li title="red">
                           <div class="red"></div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="pd-15 bd-b">
                  <h6 class="tx-15 mg-b-10">Sidebar Color</h6>
                  <div class="theme-setting-options">
                     <ul class="sidebar-color list-unstyled mb-0">
                        <li title="default" class="">
                           <div class="default"></div>
                        </li>
                        <li title="cyan">
                           <div class="cyan"></div>
                        </li>
                        <li title="blue">
                           <div class="blue"></div>
                        </li>
                        <li title="purple">
                           <div class="purple"></div>
                        </li>
                        <li title="orange">
                           <div class="orange"></div>
                        </li>
                        <li title="green">
                           <div class="green"></div>
                        </li>
                        <li title="red">
                           <div class="red"></div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="pd-15 bd-b">
                  <h6 class="tx-15 mg-b-10">Header Top Color</h6>
                  <div class="theme-setting-options">
                     <ul class="header-top-color list-unstyled mb-0">
                        <li title="default" class="">
                           <div class="default"></div>
                        </li>
                        <li title="cyan">
                           <div class="cyan"></div>
                        </li>
                        <li title="blue">
                           <div class="blue"></div>
                        </li>
                        <li title="purple">
                           <div class="purple"></div>
                        </li>
                        <li title="orange">
                           <div class="orange"></div>
                        </li>
                        <li title="green">
                           <div class="green"></div>
                        </li>
                        <li title="red">
                           <div class="red"></div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="pd-15 bd-b">
                  <h6 class="tx-15 mg-b-10">Header Bottom Color</h6>
                  <div class="theme-setting-options">
                     <ul class="header-bottom-color list-unstyled mb-0">
                        <li title="default" class="">
                           <div class="default"></div>
                        </li>
                        <li title="cyan">
                           <div class="cyan"></div>
                        </li>
                        <li title="blue">
                           <div class="blue"></div>
                        </li>
                        <li title="purple">
                           <div class="purple"></div>
                        </li>
                        <li title="orange">
                           <div class="orange"></div>
                        </li>
                        <li title="green">
                           <div class="green"></div>
                        </li>
                        <li title="red">
                           <div class="red"></div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="pd-15 bd-b">
                  <h6 class="tx-15 mg-b-10">Footer Color</h6>
                  <div class="theme-setting-options">
                     <ul class="footer-color list-unstyled mb-0">
                        <li title="default" class="">
                           <div class="default"></div>
                        </li>
                        <li title="cyan">
                           <div class="cyan"></div>
                        </li>
                        <li title="blue">
                           <div class="blue"></div>
                        </li>
                        <li title="purple">
                           <div class="purple"></div>
                        </li>
                        <li title="orange">
                           <div class="orange"></div>
                        </li>
                        <li title="green">
                           <div class="green"></div>
                        </li>
                        <li title="red">
                           <div class="red"></div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="pd-15 bd-b">
                  <div class="theme-setting-options">
                     <div class="setting-list">
                        <h6 class="setting-list-name tx-15">Fixed Header</h6>
                        <div class="setting-list-switch">
                           <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="fixed_header_setting">
                              <label class="custom-control-label" for="fixed_header_setting"></label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pd-15 bd-b">
                  <div class="theme-setting-options">
                     <div class="setting-list">
                        <h6 class="setting-list-name tx-15">Fixed Footer</h6>
                        <div class="setting-list-switch">
                           <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="fixed_footer_setting">
                              <label class="custom-control-label" for="fixed_footer_setting"></label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pd-15 bd-b">
                  <div class="theme-setting-options">
                     <div class="setting-list">
                        <h6 class="setting-list-name tx-15">Collapse Sidebar</h6>
                        <div class="setting-list-switch">
                           <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="collapsed_sidebar_setting">
                              <label class="custom-control-label" for="collapsed_sidebar_setting"></label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pd-15 bd-b">
                  <div class="theme-setting-options">
                     <div class="setting-list">
                        <h6 class="setting-list-name tx-15">Boxed Style</h6>
                        <div class="setting-list-switch">
                           <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="box_style_setting">
                              <label class="custom-control-label" for="box_style_setting"></label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pd-15 bd-b">
                  <div class="theme-setting-options">
                     <div class="setting-list">
                        <h6 class="setting-list-name tx-15">Theme Shadow</h6>
                        <div class="setting-list-switch">
                           <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="box_shadow_setting">
                              <label class="custom-control-label" for="box_shadow_setting"></label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pd-15 bd-b">
                  <h6 class="tx-15 mg-b-10">Sidebar Switch</h6>
                  <div class="selectgroup theme-switch">
                     <label class="selectgroup-item">
                     <input type="radio" name="theme-switch" value="semi-dark-theme" class="selectgroup-input-radio select-theme">
                     <span class="selectgroup-button waves-effect tooltip-primary" data-toggle="tooltip" data-original-title="Dark Sidebar"><i data-feather="sidebar" class="wd-16 ht-16 mr-2"></i>Semi</span>
                     </label>
                     <label class="selectgroup-item">
                     <input type="radio" name="theme-switch" value="gradient-theme" class="selectgroup-input-radio select-theme">
                     <span class="selectgroup-button waves-effect tooltip-primary" data-toggle="tooltip" data-original-title="Gradient Sidebar"><i data-feather="disc" class="wd-16 ht-16 mr-2"></i>Gradient</span>
                     </label>
                  </div>
               </div>
               <div class="pd-15 bd-b">
                  <h6 class="tx-15 mg-b-10">Theme Switch</h6>
                  <div class="selectgroup theme-switch">
                     <label class="selectgroup-item">
                     <input type="radio" name="theme-switch" value="light" class="selectgroup-input-radio select-theme" checked>
                     <span class="selectgroup-button waves-effect tooltip-primary" data-toggle="tooltip" data-original-title="Light Theme"><i data-feather="sun" class="wd-16 ht-16 mr-2"></i>Light</span>
                     </label>
                     <label class="selectgroup-item">
                     <input type="radio" name="theme-switch" value="dark" class="selectgroup-input-radio select-theme">
                     <span class="selectgroup-button waves-effect tooltip-primary" data-toggle="tooltip" data-original-title="Dark Theme"><i data-feather="moon" class="wd-16 ht-16 mr-2"></i>Dark</span>
                     </label>
                  </div>
               </div>
               <div class="pd-x-15 pd-t-25">
                  <a href="javascript:void(0)" class="btn btn-lg btn-primary d-block waves-effect waves-light btn-restore-theme">Restore Default</a>
               </div>
               <div class="pd-x-15 pd-t-25 pd-b-50">
                  <a href="https://wrapcoders.xyz/adata" target="_blank" class="btn btn-lg btn-success d-block waves-effect">Download Now</a>
               </div>
            </div>
         </div>
      </div>
      <!-- End: Theme Customizer-->
      <!--================================-->
      <!-- Footer Script -->
      <!--================================-->
      <!--================================-->
      <!-- BEGIN: Global JS -->
      <script src="{{url('js/plugin-bundle.js')}}"></script>
      <script src="{{url('js/notiflix-3.2.6.min.js')}}"></script>
      <script src="{{url('js/app.js')}}"></script>
      <script src="{{url('js/function.js')}}"></script>
      <script src="{{url('js/adata-init.js')}}"></script>
      <script type="text/javascript" src="{{url('plugins/daterangepicker/daterangepicker.js')}}"></script>
      <script src="{{url('plugins/select2/js/select2.full.min.js')}}"></script>
      <script>
            $(document).ready(function() {
		    $(".select-choose-user").select2();
             });
           $(function() {
                $('#start-date-project').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    drops: "up",
                    minYear: 1901,
                    maxYear: parseInt(moment().format('YYYY'),10)
                });
                $('#end-date-project').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    drops: "up",
                    minYear: 1901,
                    maxYear: parseInt(moment().format('YYYY'),10)
                });
            });
     </script>
      <!-- END: Global JS-->
      <!-- BEGIN: Init JS -->
      <script src="{{url('lib/dashboard/analytic/dashboard-home-init.js')}}"></script>
      <!-- END: Init JS-->
   </body>
</html>
