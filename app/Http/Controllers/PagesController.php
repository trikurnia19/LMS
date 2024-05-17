<?php

namespace App\Http\Controllers;


use App\Models\LeaveApplication;
use App\Models\LeaveType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Vacancy;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can.application.authorize',['except'=>'show']);
    }
    
    public function redirectToHomeView()
    {
        if (Auth::check()){
            return redirect()->route('homeView');
        }else {
            $vacancies = Vacancy::
            whereBetween(DB::raw('now()'),[DB::raw('start_date'),DB::raw('end_date')])
            ->where('is_publish',true)  ->get();
            return view('pages.landingPage',compact('vacancies'));
        }
    }

    public function homeView()
    {
        $types = LeaveType::all();
        $data['types'] = $types;
        $apps = LeaveApplication::myApplications()
        ->where('status', 'approved')
        ->addLeaveType()
        ->get();
        foreach ($types as $type) {
            $data['leaveCount'][$type->type] = 0;
        }
        foreach ($apps as $app) {
            $data['leaveCount'][$app->type] += $app->duration;
        }

        $data['myApplications'] = LeaveApplication::MyApplications()
        ->AddLeaveType()
        ->paginate(5);

        $data['leaveStat'] = LeaveApplication::MyApplications()
        ->select('status', DB::raw('count(status) as total'))
        ->groupBy('status')
        ->pluck('total','status');
        
        return view('pages.home', $data);
    }

    public function leaveApplicationView()
    {
        $data['leaveTypes'] = LeaveType::all();
        return view('pages.application', $data);
    }

    public function actionView()
    {
        $data['applications'] = LeaveApplication::where('status', 'pending')
        ->join('users', 'users.id', '=', 'leave_applications.applier_user_id')
        ->join('leave_types', 'leave_types.id', '=', 'leave_applications.leave_type_id')
        ->select(
            'leave_applications.id as id', 
            'leave_applications.reason',
            'leave_applications.information',
            'users.name as applier_name',
            'leave_applications.start_date',
            'leave_applications.end_date',
            'leave_applications.status',
            'leave_types.type as leave_type',
            'leave_applications.created_at'
        )->get();

        return view('pages.action', $data);
    }

    public function NotificationView()
    {
        return view('pages.notification');
    }

    
    public function markAsRead()
    {
        Auth::user()->UnreadNotifications->markAsRead();
        return redirect()->route('homeView');
    }

    public function employeeView()
    {
        return view('pages.employee');
    }

    public function listUsers()
    {
        $users = User::all();
        return view('pages.list', compact('users'));
    }

    public function listRetirement()
    {
        // Fetch the users with roles_id = 5
        $users = DB::table('model_has_roles')
                    ->join('users', 'model_has_roles.model_id', '=', 'users.id')
                    ->where('role_id', 5)
                    ->select('users.name','users.updated_at')
                    ->get();

        // Pass the filtered list of users to the view
        return view('pages.retire', compact('users'));
    }

}
