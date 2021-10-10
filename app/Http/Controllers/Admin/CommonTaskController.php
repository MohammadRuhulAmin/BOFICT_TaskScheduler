<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonTaskController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function redirectUser(){
        return redirect()->route('employees.create');
    }
}
