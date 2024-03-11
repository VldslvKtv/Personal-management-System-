<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportFiles;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class FileController extends Controller
{

public function uploadFile(Request $request)
    {
        $fio_user =  $request->input('fio');
        $user_id = MainController::findUser( $fio_user);
        $user_status = User::find($user_id)->{'status'};
        if ($user_status == 1)
        {
            $sender = auth()->user()->name;

            $file = $request->file('file');
        
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filePath = $file->storeAs('uploads', $fileName);
            $file->move(public_path('uploads'), $fileName);

            ReportFiles::create([
                'name' => $fileName,
                'path' => $filePath,
                'user_id' => $user_id,
                'extension'  => $extension,
                'sender' => $sender
            ]);

            return redirect()->back()->with('success', 'Файл успешно загружен.');
        }

    
    Session::flash('error', 'Что-то пошло не так. Пожалуйста, попробуйте еще раз.');
    return redirect()->back();
    }

}
