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
    </div>
    <!--/ Page Inner End -->
@endsection
