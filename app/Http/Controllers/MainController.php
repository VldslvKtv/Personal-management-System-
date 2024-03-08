<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ContactModel;
use App\Models\ReportFiles;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function home()
    {

    return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function registration()
    {
        $records = new ContactModel();
        return view('registration', ['records' => $records->all()]);
    }

    // можно добавить и больше проверок
    public function registration_check(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
        ]);


        $record = new ContactModel();
        $record->email = $request->input('email');
        $record->text = $request->input('text');
        $record->message = $request->input('message');

        $record->save();
 
        return redirect()->route('registration');
        
    }

    static public function findUser($fio)
    {
    
    $user = User::where('name', $fio)->first();

    if ($user) {
        return $user->id;
    } else {
        return 0;
    }
    }

    public function list_employees()
    {
        $user_status = auth()->user()->status;
        if ($user_status == 1)
        {
            $employees = User::all();
            $files = ReportFiles::where('user_id', auth()->user()->id)->get();
            $users_and_tasks = User::has('tasks')->with('tasks')->get();
            return view('dashboard', ['employees' => $employees->all(),'users_and_tasks' => $users_and_tasks, 'user_status' => $user_status, 'files' => $files]);
        }
        $users_admin = User::where('status', 1)->get();
        $current_user = User::find(auth()->user()->id);
        $tasks_current_user = $current_user->tasks;
        return view('dashboard', ['user_status' => $user_status,'users_admin' => $users_admin, 'tasks_current_user' => $tasks_current_user]);
    }


    public function add_task(Request $request)
    {
        $record = new Tasks();
        $fio_user =  $request->input('fio');
        $user_id = MainController::findUser( $fio_user);
        if ($user_id != 0)
        {
            $record->create_date = Carbon::now();
            $record->task = $request->input('text');
            $record->deadline = $request->input('datetime');
            $record->user_id = $user_id;
            $record->save();
          
            return redirect()->route('dashboard');
        }
        Session::flash('error', 'Что-то пошло не так. Пожалуйста, попробуйте еще раз.');
        return redirect()->back();
        
        
    }
}
