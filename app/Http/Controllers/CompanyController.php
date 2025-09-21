<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{

    public function list() {
        $data = [];
        if (session('user_role') === 'superadmin') {
            $data['companies'] = Company::paginate(10);
        } else {
            $userId = session('userInfo.id');
            $data['companies'] = Company::whereHas('users', function ($query) use ($userId) {
                $query->where('id', $userId);
            })->paginate(10);
        }
        return view('companies.list', $data);
    }

    public function create() {
        return view('companies.add_company');
    }

    public function add(Request $request) {
        $request->validate([
            'name' => 'required',
            'url' => 'required'
        ]);

        $values = ['name' => $request->name, 'url' => $request->url, 'status' => 'active', 'created_at' => date('Y-m-d H:i:s')];
        $insertID = Company::insertGetId($values);
        if ($insertID) {
            $status = 'success';
            $message = 'Company Added';
        } else {
            $status = 'error';
            $message = 'Error While addming the company';
        }

        return redirect()->route(session('user_role').'.companies')->with($status, $message);
    }
}
