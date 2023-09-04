<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Upload;
use App\Models\User;
use App\Models\Work;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function view($id) {
        $project = Project::where('id', $id);
        $users = User::select('fullname', 'id')->get();
        $workcount  = Work::where('project_id', $id)->count();

        return view('dashboard.project.view',['project' => $project, 'users' => $users, 'id' => $id, 'workcount' =>$workcount]);
    }

    public function upload(Request $request)
    {
        $file = $request->file('file'); // Lấy dữ liệu file từ request
        $allowedFormats = ['docx', 'pdf', 'jpg', 'jpeg', 'png', 'gif', 'dwg', 'dxf']; // Các định dạng được chấp nhận

        if ($file && in_array($file->getClientOriginalExtension(), $allowedFormats)) {
            // Tạo tên duy nhất cho tệp
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();

            // Lưu tệp vào thư mục lưu trữ (storage/app/upload/public)
            $file->storeAs('upload/public', $fileName);
            $upload = new Upload();
            $upload->name = $fileName;
            $upload->ext = $file->getClientOriginalExtension();
            $upload->save();
            return response()->json(['status' => "true" ,'message' => 'Tệp đã được tải lên thành công.', 'file_id' => $upload->id]);
        }

        return response()->json(['status' => "false" ,'message' => 'Định dạng tệp không được chấp nhận.'], 400);
    }
}
