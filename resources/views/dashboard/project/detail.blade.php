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
        </div>
        <div class="card mg-b-20 mt-2">
            <div class="card-body">
                <h2>{{$data->name}}</h2>
                {!! $data->content !!}
                <h4>Tệp tin đính kèm</h4>
                <a href="{{ route('Dashboard-download', ['filename'=>$file->name]) }}" target="_blank">{{$file->name}}</a>
            </div>
        </div>
        <div class="card mg-b-20 mt-2">
            <div class="card-body">
                <h4>Báo cáo kết quả</h4>
                <form action="{{route('upload')}}" class="dropzone needsclick mt-2" id="dropzone-work">
                    <div class="dz-message needsclick">
                       Drop files here or click to upload
                       <span class="note needsclick">(This is just a demo dropzone. Selected files are
                       <strong>not</strong> actually uploaded.)</span>
                    </div>
                    <div class="fallback">
                       <input name="file" type="file" multiple>
                    </div>
               </form>
               <button type="button" class="btn btn-primary waves-effect btn-add-work mt-2">Nộp đính kèm</button>
            </div>
        </div>
    </div>

@endsection
