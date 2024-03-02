<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactModel;

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
}
