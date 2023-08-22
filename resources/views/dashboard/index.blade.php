@extends('layouts.dashboard.default')

@section('title', 'Dashboard')

@section('content')
    <!-- Page Inner Start -->
    <!--================================-->
    <div class="page-inner mt-5">
        <div class="pd-y-10 pd-x-30 d-flex justify-content-between align-items-center header-bottom">
            <div class="d-flex align-items-center">
                <h2 class="d-flex align-items-center tx-16 mb-0 pd-r-15 mr-2 bd-r "><i data-feather="airplay"
                        class="wd-20 mr-2"></i>Quản lý dự án</h2>
            </div>
            <div class="d-flex hidden-xs">
                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target=".add-project"><i
                        class="fa fa-plus mr-2"></i>Dự Án</button>
            </div>
            <div class="modal fade bd-example-modal-lg add-project" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Thêm dự án</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Tên dự án</label>
                                    <input type="text" class="form-control" id="name-project">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Mô tả</label>
                                    <textarea class="form-control" id="desc-project"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Nhóm dự án</label>
                                    <select class="custom-select groud-project" id="group-project" required>
                                        @foreach ($groups as $group)
                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                     </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Quản trị dự án</label>
                                    <select multiple class="custom-select user-admin select-choose-user" style="width:100%;" id="user-admin" multiple>
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->fullname}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Người thực hiện</label>
                                    <select class="custom-select user-perform select-choose-user" style="width:100%;" multiple="multiple" id="user-perform">
                                        @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->fullname}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Người theo dõi</label>
                                    <select class="custom-select user-moniter select-choose-user" style="width:100%;" multiple="multiple" id="user-moniter">
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->fullname}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Trạng thái</label>
                                    <select class="status-project custom-select"  id="status-project" required="">
                                        <option value="1">Kế hoạch</option>
                                        <option value="2">Đang thực hiện</option>
                                        <option value="3">Tạm dừng</option>
                                        <option value="4">Hoàn thành</option>
                                        <option value="4">Đóng</option>
                                     </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Khách hàng</label>
                                    <select class="customer-project custom-select"  id="customer-project" required="">
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                     </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Ngày bắt đầu dự án</label>
                                    <input type="text" class="form-control" id="start-date-project" id="start-date-project">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Ngày kết thúc dự án</label>
                                    <input type="text" class="form-control" id="end-date-project" id="end-date-project">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Ngân sách</label>
                                    <input type="text" class="form-control datepicker" id="budget">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary waves-effect btn-add-project">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!--================================-->
        <!-- Currency Mini Card Start -->
        <!--================================-->
        <div class="row row-xs mt-4">
            <div class="col-md-6 col-xl-3">
               <div class="card card-body mg-b-20">
                  <div class="d-flex justify-content-between align-items-center">
                     <div class="">
                        <h2 class="tx-12 tx-uppercase">Tổng dự án</h2>
                        <span class="tx-20 tx-rubik">{{count($projects)}}</span>
                     </div>
                  </div>

               </div>
            </div>
            <div class="col-md-6 col-xl-3">
               <div class="card card-body mg-b-20">
                  <div class="d-flex justify-content-between align-items-center">
                     <div class="">
                        <h2 class="tx-12 tx-uppercase">Dự án hoàn thành</h2>
                        <span class="tx-20 tx-rubik">{{$projectCountFour}}</span>
                     </div>
                  </div>

               </div>
            </div>
            <div class="col-md-6 col-xl-3">
               <div class="card card-body mg-b-20">
                  <div class="d-flex justify-content-between align-items-center">
                     <div class="">
                        <h2 class="tx-12 tx-uppercase">Dự án kế hoạch</h2>
                        <span class="tx-20 tx-rubik">{{$projectCountOne}}</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-xl-3">
               <div class="card card-body mg-b-20">
                  <div class="d-flex justify-content-between align-items-center">
                     <div class="">
                        <h2 class="tx-12 tx-uppercase">Dự án đang triển khai</h2>
                        <span class="tx-20 tx-rubik">{{$projectCountTwo}}</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-body mg-b-20">
                   <div class="d-flex justify-content-between align-items-center">
                      <div class="">
                         <h2 class="tx-12 tx-uppercase">Dự án tạm dừng</h2>
                         <span class="tx-20 tx-rubik">{{$projectCountthree}}</span>
                      </div>
                   </div>
                </div>
             </div>
         </div>
         <!--/ Currency Mini Card End -->
         <div class="row row-xs">

            @foreach ($projects as $project)
            <!--================================-->
            <!-- Bitcoin Wallet Start -->
            <!--================================-->
            <div class="col-md-6 col-lg-4">
                <div class="card mg-b-20">
                   <div class="card-header d-flex align-items-center justify-content-between">
                      <h6 class="mb-0">{{$project->name}}</h6>
                      <div class="card-header-btn">
                         <div class="dropdown">
                            <a href="" class="" data-toggle="dropdown"><i data-feather="more-horizontal" class="wd-16  ht-16"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="" class="dropdown-item"><i data-feather="info" class="wd-16 ht-16 mr-2"></i>View Details</a>
                                <a href="" class="dropdown-item"><i data-feather="share" class="wd-16 ht-16 mr-2"></i>Share</a>
                                <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 ht-16 mr-2"></i>Download</a>
                                <a href="" class="dropdown-item"><i data-feather="copy" class="wd-16 ht-16 mr-2"></i>Copy to</a>
                                <a href="" class="dropdown-item"><i data-feather="folder" class="wd-16 ht-16 mr-2"></i>Move to</a>
                                <a href="" class="dropdown-item"><i data-feather="edit" class="wd-16 ht-16 mr-2"></i>Rename</a>
                                <a href="" class="dropdown-item"><i data-feather="trash" class="wd-16 ht-16 mr-2"></i>Delete</a>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="card-body">
                      <div class="d-flex align-items-center">
                         <div class="wd-40 ht-40 {{$project->status_color}} tx-white rounded-circle justify-content-center align-items-center d-none d-sm-flex"></div>
                         <div class="ml-2">
                            <h2 class="tx-15 mg-b-5">{{$project->group->name}}</h2>
                            <h3 class="tx-15 mg-b-5">{{$project->status_text}}</h3>
                            <p class="tx-13 mb-0"><span class="money-vnd">{{$project->budget}}</span></p>
                         </div>
                      </div>
                      <div class="mg-t-25">
                         <h6 class="mg-y-5 tx-15 tx-normal">{{$project->describe}}</h6>
                      </div>
                      <div class="mg-t-25">
                         <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                               <tbody><tr>
                                  <td>Thời gian bắt đầu: </td>
                                  <td>{{$project->date_start}}</td>
                               </tr>
                               <tr>
                                  <td>Thời gian kết thúc: </td>
                                  <td>{{$project->date_end}}</td>
                               </tr>
                            </tbody></table>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <!--/ Bitcoin Wallet End -->
            @endforeach
         </div>
    </div>
    <!--/ Page Inner End -->
@endsection
