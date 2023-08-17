@extends('layouts.authentication.default')

@section('title', 'Đăng nhập')

@section('content')
<div class="ht-100v text-center">
    <div class="row no-gutters pd-0 mg-0">
       <div class="col-lg-4 bg-gray-100 bg-login">
          <div class="ht-100v d-flex align-items-center justify-content-center">
             <div class="wd-300">
                <h3 class="mg-b-5 tx-left">Đăng nhập</h3>
                <p class="tx-12 mg-b-30 tx-left">Chào mừng bạn đến với hệ thống quản lý dự án xây dựng.</p>
                <div class="form-group tx-left">
                   <label class="mg-b-5">Địa chỉ email</label>
                   <input id="input-email-login" type="email" class="form-control" placeholder="Vui lòng nhập địa chỉ email" required>
                </div>
                <div class="form-group">
                   <div class="d-flex justify-content-between mg-b-5">
                      <label class="mg-b-0">Mật khẩu</label>
                      <a href="aut-password.html" class="tx-15 mg-b-0">Quên mật khẩu?</a>
                   </div>
                   <input id="input-password-login" type="password" class="form-control" placeholder="Vui lòng nhập mật khẩu" required>
                </div>
                <button id="btn-login" class="btn btn-lg btn-outline-primary rounded-pill btn-block waves-effect">Đăng nhập</a>
             </div>
          </div>
       </div>
       <div class="col-lg-8 bg-image hidden-sm">
       </div>
    </div>
 </div>
 @endsection
