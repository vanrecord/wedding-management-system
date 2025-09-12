<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserInfo;
use App\DataTables\UserInfosDataTable;

class UserInfoController extends Controller
{
    public function index(UserInfosDataTable $dataTable) {
        $user_info = App(UserInfo::class)->all();
        return $dataTable->render('UserInfo.index');
        // return view('UserInfo/index',['user_infos'=>$user_info]);
    }

    public function create(){
        return view('UserInfo/form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255'
        ]);

        UserInfo::create($request->all());

        return redirect()->back()->with('success', 'Guest saved successfully');
    }
    public function show($id) {
        
    }
    public function destroy($id){
        app(UserInfo::class)->find($id)->delete();
        return redirect()->back()->with('success', 'Guest deleted successfully');
    }
}
