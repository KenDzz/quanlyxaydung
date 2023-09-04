@extends('layouts.dashboard.default')

@section('title', 'Dashboard')

@section('content')
    <!--================================-->
    <!-- Page Inner Start -->
    <!--================================-->
    <div class="page-inner ht-100v pd-0-force calendar-page-inner">
        <!--================================-->
        <!-- App Calendar Start -->
        <!--================================-->
        <div class="calendar-wrapper">
            <div class="row">
                <!--<div class="col-lg-3 pd-0 bd-r calendar-sidebar hidden-sm hidden-xs">
                    <div class="box">
                        <div class="box-body">
                            <label class="tx-10 tx-uppercase tx-medium mb-0 ">Sự kiện sắp tới</label>
                            <div class="upcoming-event">
                                <a href="#" class="upcoming-event-items bd-l bd-2 bd-primary">
                                    <h6 class="tx-15 mb-0">Company Standup Meeting</h6>
                                    <span class="tx-11 tx-gray-500">8:00am - 9:00am, Engineering Room</span>
                                </a>
                                <a href="#" class="upcoming-event-items bd-l bd-2 bd-success">
                                    <h6 class="tx-15 mb-0">Start Dashboard Concept</h6>
                                    <span class="tx-11 tx-gray-500">9:30am - 11:30am, Office Desk</span>
                                </a>
                                <a href="#" class="upcoming-event-items bd-l bd-2 bd-danger">
                                    <h6 class="tx-15 mb-0">Chat Design Presentation</h6>
                                    <span class="tx-11 tx-gray-500">2:30pm - 3:00pm, Visual Room</span>
                                </a>
                                <a href="#" class="upcoming-event-items bd-l bd-2 bd-success">
                                    <h6 class="tx-15 mb-0">Company Standup Meeting</h6>
                                    <span class="tx-11 tx-gray-500">8:00am - 9:00am, Engineering Room</span>
                                </a>
                                <a href="#" class="upcoming-event-items bd-l bd-2 bd-warning">
                                    <h6 class="tx-15 mb-0">Start Dashboard Concept</h6>
                                    <span class="tx-11 tx-gray-500">9:30am - 11:30am, Office Desk</span>
                                </a>
                                <a href="#" class="upcoming-event-items bd-l bd-2 bd-info">
                                    <h6 class="tx-15 mb-0">Chat Design Presentation</h6>
                                    <span class="tx-11 tx-gray-500">2:30pm - 3:00pm, Visual Room</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="col-lg-12 col-md-12 pd-0 main-calendar">
                    <div class="box box-calendar">
                        <div class="box-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ App Calendar End -->
    </div>
    <!--/ Page Inner End -->
@endsection
