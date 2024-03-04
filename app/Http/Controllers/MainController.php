<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactModel;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function list_employees()
    {
        $employees = new User();
        $records = new Tasks();
 
        return view('dashboard', ['employees' => $employees->all(), 'records' => $records->all()]);
        
    }


    public function add_task(Request $request)
    {
        // $valid = $request->validate([
        //     'task' => 'required|min:5|max:1000',
        //     'deadline' => 'required'
        // ]);

        // DB::table('tasks')->insert([
        //     'create_date' => '2024-03-03',
        //     'task' => 'rhrthrthrth',
        //     'deadline' => '2024-03-04 16:52:36'

        // ]);

        $record = new Tasks();
        $record->create_date = Carbon::now();
        $record->task = $request->input('text');
        $record->deadline = $request->input('datetime');

        $record->save();
      
        return redirect()->route('dashboard');
        
    }
}
