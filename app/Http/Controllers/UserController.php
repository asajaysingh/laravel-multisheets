<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UserMultiSheetExport;
use App\Exports\UsersExport;
use App\Models\User;
use Excel;

class UserController extends Controller
{
    

    public function exportUser()
    {
        $user = User::all();
        $data = count($user);
       return Excel::download(new UserMultiSheetExport($data), 'users.xlsx');
    }
}
