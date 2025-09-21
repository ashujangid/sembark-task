<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;

class UserController extends Controller
{

    public function list()
    {
        $data = [];
        $data['users'] = User::with('userRole')
            ->where('role_id', '!=', 1)
            ->paginate(10);
            // echo '<pre>';print_r($data['users']);die;
        return view('users.list', $data);
    }

    public function create()
    {
        $userId = session('userInfo.id');
        $data['roles'] = Role::where('id', '!=', 1)->get();
        $data['companies'] = Company::whereHas('users', function ($query) use ($userId) {
                $query->where('id', $userId);
            })->where('status', 'active')->get();

        return view('users.add', $data);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
            'company_id' => 'required',
        ]);

        $values = ['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password), 'role_id' => $request->role_id, 'company_id' => $request->company_id, 'created_at' => date('Y-m-d H:i:s')];
        $insertID = User::insertGetId($values);
        if ($insertID) {
            $status = 'success';
            $message = 'User Added Succesfully';
        } else {
            $status = 'error';
            $message = 'Error While adding the user';
        }

        return redirect()->route(session('user_role') . '.users')->with($status, $message);
    }
}
