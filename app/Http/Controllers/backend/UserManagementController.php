<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        return view('backend.user-management.index');
    }

    public function roleIndex()
    {
        return view('backend.user-management.role.index');
    }

    public function roleStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    }
}
