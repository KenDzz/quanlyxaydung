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
                <a  class="btn btn-primary waves-effect ml-2" href="{{ route('Dashboard-work-detail', ['id'=>$id]) }}"><i class="fa fa-bookmark mr-2"></i>Danh sách công việc</a>
            </div>
        </div>
        <div class="custom-fieldset-style mg-b-30">
            <div class="clearfix">
               <div class="clearfix">
                  <table id="hoverTable" class="hover responsive nowrap table-bordered">
                     <thead>
                        <tr>
                           <th>Tên</th>
                           <th>Thời gian bắt đầu</th>
                           <th>Thời gian hết hạn</th>
                           <th>Tình trạng</th>
                           <th>Thời gian còn lại</th>
                           <th>Quản lý</th>
                        </tr>
                     </thead>
                     <tbody>

                        @foreach ($datas as $data)
                            @if (auth()->user()->permission_id == config('app.userproject_Admin'))
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->date_start}}</td>
                                <td>{{$data->date_end}}</td>
                                <td>{{$data->status_work}}</td>
                                <td>{{$data->timeRemaining()}}</td>
                                <td><a  class="btn btn-primary waves-effect ml-2" href="{{ route('Dashboard-work-detail', ['id'=>$id]) }}"><i class="fa fa-bookmark mr-2"></i>Chi tiết công việc</a></td>
                            </tr>
                            @else
                            <tr>
                                <td>{{$data->work->name}}</td>
                                <td>{{$data->work->date_start}}</td>
                                <td>{{$data->work->date_end}}</td>
                                <td>{{$data->work->status_work}}</td>
                                <td>{{$data->work->timeRemaining()}}</td>
                                <td><a  class="btn btn-primary waves-effect ml-2" href="{{ route('Dashboard-work-detail', ['id'=>$id]) }}"><i class="fa fa-bookmark mr-2"></i>Chi tiết công việc</a></td>
                            </tr>
                            @endif
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                            <th>Tên</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Thời gian hết hạn</th>
                            <th>Tình trạng</th>
                            <th>Thời gian còn lại</th>
                            <th>Quản lý</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
    </div>

@endsection
