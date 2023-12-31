<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\group;
use App\Models\User;
use App\Models\Customer;
use App\Models\Project;
use App\Models\UserProject;
use App\Models\UserWork;

class DashboardController extends Controller
{
    public function index(){
        if(auth()->user()->permission_id == config('app.userproject_Admin')){
            $groups = group::all();
            $project = Project::all();
            $projectCountOne = Project::where('status', '1')->count();
            $projectCountTwo = Project::where('status', '2')->count();
            $projectCountthree = Project::where('status', '3')->count();
            $projectCountFour = Project::where('status', '4')->count();

            $users = User::select('fullname', 'id')->get();
            $customer = Customer::select('name', 'id')->get();
            $data = ['groups' => $groups, 'users' => $users, 'customers' => $customer, 'projects' => $project, 'projectCountOne' => $projectCountOne, 'projectCountTwo' => $projectCountTwo, 'projectCountthree' => $projectCountthree, 'projectCountFour' => $projectCountFour];
        }else{
            $userProjects = UserProject::where('user_id', auth()->user()->id)->with('project')->get();
            $data = ['projects' => $userProjects];
        }

        return view('dashboard.index',$data);
    }

    public function addProject(Request $request) {
        $mail = new MailController();
        $checkProject = $request->validate([
            'name' => ['required'],
            'desc' => ['required'],
            'group' => ['required', 'numeric'],
            'customer' =>   ['required', 'numeric'],
            'datestart' =>   ['required', 'date'],
            'dateend' =>  ['required', 'date'],
            'budget' =>  ['required','numeric','regex:/^\d{1,20}$/'],
            'status' =>   ['required', 'numeric'],
            'useradmin.*' => ['required','numeric'],
            'userperform.*' => ['required','numeric'],
            'usermoniter.*' => ['numeric']
        ]);

        // Create a new Project instance and fill it with the validated data
        $project = new Project();
        $project->name = $checkProject['name'];
        $project->describe = $checkProject['desc'];
        $project->group_id = $checkProject['group'];
        $project->customer_id = $checkProject['customer'];
        $project->status = $checkProject['status'];
        $project->date_start = $checkProject['datestart'];
        $project->date_end = $checkProject['dateend'];
        $project->budget = $checkProject['budget'];

        if($project->save()){
            foreach ($checkProject['useradmin'] as $admin) {
                $userProject = new UserProject();
                $userProject->project_id = $project->id;
                $userProject->user_id = $admin;
                $userProject->level = config('app.userproject_Admin');
                if(!$userProject->save()){
                    return response()->json("Lỗi hệ thống!", 422);
                }else{
                    $userIDAdmin = User::where('id', $admin)->first();
                    if ($userIDAdmin) {
                        $desc = "Bạn được thêm vào dự án ".$project->name." với quyền <font style='color: red;'>".$this->getPermission(config('app.userproject_Admin'))."<font>";
                        $mail->sendMail($project->name,$userIDAdmin->email,$desc);
                    }
                }

            }

            foreach ($checkProject['userperform'] as $userperform) {
                $userProject = new UserProject();
                $userProject->project_id = $project->id;
                $userProject->user_id = $userperform;
                $userProject->level = config('app.userproject_Userperform');
                if(!$userProject->save()){
                    return response()->json("Lỗi hệ thống!", 422);
                }else{
                    $userIDPerform = User::where('id', $userperform)->first();
                    if ($userIDPerform) {
                        $desc = "Bạn được thêm vào dự án".$project->name." với quyền ".$this->getPermission(config('app.userproject_Userperform'));
                        $mail->sendMail($project->name,$userIDPerform->email,$desc);
                    }
                }

            }

            if($checkProject['usermoniter'] != null){
                foreach ($checkProject['usermoniter'] as $usermoniter) {
                    $userProject = new UserProject();
                    $userProject->project_id = $project->id;
                    $userProject->user_id = $usermoniter;
                    $userProject->level = config('app.userproject_Usermoniter');
                    if(!$userProject->save()){
                        return response()->json("Lỗi hệ thống!", 422);
                    }else{
                        $userIDMoniter = User::where('id', $usermoniter)->first();
                        if ($userIDMoniter) {
                            $desc = "Bạn được thêm vào dự án".$project->name." với quyền ".$this->getPermission(config('app.userproject_Usermoniter'));
                            $mail->sendMail($project->name,$userIDMoniter->email,$desc);
                        }
                    }

                }
            }
        }else{
            return response()->json("Lỗi hệ thống!", 422);
        }


        return response()->json("Thêm dự án thành công");
    }






    private function getPermission($type) {
        $result = "";
        switch ($type) {
            case config('app.userproject_Admin'):
                $result = "Quản trị viên";
                break;

            case config('app.userproject_Userperform'):
                $result = "Người thực hiện";
                break;

            case config('app.userproject_Usermoniter'):
                $result = "Người quan sát";
                break;
        }
        return $result;
    }

}
