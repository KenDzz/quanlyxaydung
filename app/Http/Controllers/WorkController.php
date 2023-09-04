<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\UserWork;
use App\Models\Work;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WorkController extends Controller
{
    public function addWork(Request $request)
    {
        $mail = new MailController();
        $checkWork = $request->validate([
            'name' => ['required'],
            'content' => ['required'],
            'idupload' => ['required'],
            'datestart' => ['required', 'date'],
            'dateend' => ['required', 'date'],
            'level' => ['required', 'numeric'],
            'projectid' => ['required', 'numeric'],
            'userwork.*' => ['required', 'numeric'],
        ]);

        $work = new Work();
        $work->name = $checkWork['name'];
        $work->content = $checkWork['content'];
        $work->upload_id = $checkWork['idupload'];
        $work->level = $checkWork['level'];
        $work->date_start = $checkWork['datestart'];
        $work->date_end = $checkWork['dateend'];
        $work->project_id = $checkWork['projectid'];
        $work->status = 0;
        if ($work->save()) {
            foreach ($checkWork['userwork'] as $admin) {
                $userProject = new UserWork();
                $userProject->work_id = $work->id;
                $userProject->user_id = $admin;
                if (!$userProject->save()) {
                    return response()->json('Lỗi hệ thống!', 422);
                } else {
                    $userIDAdmin = User::where('id', $admin)->first();
                    if ($userIDAdmin) {
                        $desc = 'Bạn được giao công việc mới: ' . $work->name;
                        $mail->sendMail($work->name, $userIDAdmin->email, $desc);
                    }
                }
            }
        } else {
            return response()->json('Lỗi hệ thống!', 422);
        }
        return response()->json('Thêm công việc thành công');
    }

    public function dataworkchart($type,$id)
    {
        // Lấy ngày hiện tại
        $endDate = Carbon::now();

        // Tính ngày bắt đầu là 7 ngày trước ngày hiện tại
        $startDate = $endDate->copy()->subDays(6);

        // Khởi tạo mảng chứa 7 giá trị ban đầu là 0
        $result = [0, 0, 0, 0, 0, 0, 0];

        // Lặp qua từng ngày trong khoảng 7 ngày
        for ($i = 0; $i < 7; $i++) {
            // Tính ngày hiện tại trong vòng lặp
            $currentDate = $startDate->copy()->addDays($i);

            // Truy vấn để lấy tổng số cột work trong ngày hiện tại
            $workCount = Work::where('project_id', $id)->whereDate('date_start', '=', $currentDate->toDateString())->count();
            if($type != 3){
                $workCount = Work::where('project_id', $id)->where('status', $type)->whereDate('date_start', '=', $currentDate->toDateString())->count();
            }
            // Lưu tổng số cột work vào mảng kết quả
            $result[$i] = $workCount;
        }

        // Kết quả là mảng $result chứa 7 giá trị của 7 ngày gần nhất
        return response()->json($result);
    }

    public function dataworkchartCount($id)
    {
        $workCountAll = Work::where('project_id', $id)->count();
        $workCountWorking = Work::where('project_id', $id)->where('status', '1')->count();
        $workCountNotWorking = Work::where('project_id', $id)->where('status', '0')->count();
        $result = [];
        $result[] = round(($workCountWorking/$workCountAll) * 100);
        $result[] = round(($workCountNotWorking/$workCountAll) * 100);
        return response()->json($result);
    }

    public function work($id) {
        $data = [];
        if(auth()->user()->permission_id == config('app.userproject_Admin')){
            $work = Work::where('project_id', $id)->get();
            $data = ['datas' => $work, 'id' => $id];
        }else{
            $work = UserWork::where('user_id', auth()->user()->id)->where('work_id', $id)->with('work')->get();
            $data = ['datas' => $work, 'id' => $id];
        }

        return view('dashboard.project.work',$data);
    }

    public function detail($id) {
        $work = Work::where('id', $id)->first();
        $file = Upload::where('id', $work->upload_id)->first();
        $data = ['data' => $work, 'id' => $id, 'file' => $file];
        return view('dashboard.project.detail',$data);
    }

    public function calendar() {
        return view('app.calendar');
    }

    public function datacalendar()
{
    $data = [];

    $works = auth()->user()->permission_id == config('app.userproject_Admin')
        ? Work::all()
        : UserWork::where('user_id', auth()->user()->id)->with('work')->get();

    foreach ($works as $work) {
        $data[] = [
            'title' => "Hạn chốt " . $work->name,
            'start' => $work->date_end,
            'allDay' => true,
            'className' => "bg-alizarin"
        ];
    }

    return response()->json($data);
}
}
