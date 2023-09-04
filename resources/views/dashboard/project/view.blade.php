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
                @admin
                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target=".add-project"><i
                        class="fa fa-plus mr-2"></i>Công việc</button>
                @end
                <a  class="btn btn-primary waves-effect ml-2" href="{{ route('Dashboard-work', ['id'=>$id]) }}"><i class="fa fa-bookmark mr-2"></i>Danh sách công việc</a>
            </div>
            @admin
            <div class="modal fade bd-example-modal-lg add-project" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content model-work">
                        <div class="modal-header">
                            <h5 class="modal-title">Thêm công việc</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <input type="hidden" class="form-control" id="id-work" value="{{$id}}">
                                <div class="col-md-12 mb-3">
                                    <label>Tên công việc</label>
                                    <input type="text" class="form-control" id="name-work">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Mô tả công việc</label>
                                    <div class="summernote-work"></div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Người thực hiện</label>
                                    <select class="custom-select user-perform select-choose-user" style="width:100%;" multiple="multiple" id="user-work">
                                        @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->fullname}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Mức độ</label>
                                    <select class="status-project custom-select"  id="level-work" required="">
                                        <option value="1">Quang trọng</option>
                                        <option value="2">Trung bình</option>
                                        <option value="3">Bình thường</option>
                                     </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Ngày bắt đầu công việc</label>
                                    <input type="text" class="form-control" id="start-date-work">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Ngày kết thúc công việc</label>
                                    <input type="text" class="form-control" id="end-date-work">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Đính kèm tài liệu</label>
                                    <form action="{{route('upload')}}" class="dropzone needsclick" id="dropzone-work">
                                        <div class="dz-message needsclick">
                                           Drop files here or click to upload
                                           <span class="note needsclick">(This is just a demo dropzone. Selected files are
                                           <strong>not</strong> actually uploaded.)</span>
                                        </div>
                                        <div class="fallback">
                                           <input name="file" type="file" multiple>
                                        </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary waves-effect btn-add-work">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
            @end
        </div>
        <div class="row row-xs">
            <input type="hidden" id="id-project-hidden" value="{{$id}}">
            <!--================================-->
            <!-- Audience Overview Start -->
            <!--================================-->
            <div class="col-xl-8">
               <div class="card mg-b-20">
                  <ul class="nav nav-fill d-block d-md-flex audience-overview-tab" role="tablist">
                     <li class="nav-item">
                        <a class="active show" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="false">
                           <h2 class="tx-15 ">Công việc được giao</h2>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="true">
                           <h2 class="tx-15 ">Khối lượng công việc đã hoàn thành</h2>
                        </a>
                     </li>
                  </ul>
                  <div class="card-body">
                     <div class="tab-content">
                        <div class="tab-pane fade active show" id="pills-1" role="tabpanel">
                           <canvas id="usersLineChart"></canvas>
                        </div>
                        <div class="tab-pane fade" id="pills-2" role="tabpanel">
                           <canvas id="sessionsLineChart"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--/ Audience Overview End -->
            <!--================================-->
            <!-- Top Traffic Source Start -->
            <!--================================-->
            <div class="col-xl-4">
               <div class="card mg-b-20">
                  <div class="card-header d-flex justify-content-between">
                     <h2 class="tx-15 mb-0">Tổng khối lượng công việc</h2>
                     <a href="" class=""><span data-feather="refresh-cw" class="wd-16 ht-16"></span></a>
                  </div>
                  <div class="card-body tx-center">
                     <h4 class="tx-normal tx-36 mg-b-0 tx-rubik">{{$workcount}}</h4>
                  </div>
               </div>
               <div class="card mg-b-20">
                  <div class="card-header d-flex justify-content-between">
                     <h2 class="tx-15 mb-0">Công việc</h2>
                     <a href="" class=""><span data-feather="refresh-cw" class="wd-16 ht-16"></span></a>
                  </div>
                  <div class="card-body">
                     <canvas id="sessionsDeviceDount" height="195"></canvas>
                  </div>
               </div>
            </div>
            <!--/ Top Traffic Source End -->
            <!--================================-->
         </div>
    </div>
    <!--/ Page Inner End -->

@endsection
