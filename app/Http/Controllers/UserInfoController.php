<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserInfo;

class UserInfoController extends Controller
{
    public function index() {
        $user_info = App(UserInfo::class)->all();
        return view('UserInfo/index',['user_infos'=>$user_info]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'phone'  => 'required|string|max:20',
            'email'  => 'required|email|unique:user_infos,email',
            'dob'    => 'required|date',
            'gender' => 'required|in:male,female,other',
        ]);

        UserInfo::create($validated);

        return redirect()->back()->with('success', 'User info saved successfully!');
    }
    public function show($id) {
        
    }
}
