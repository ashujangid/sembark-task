<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use App\Models\User;
use Illuminate\Support\Str;

class URLController extends Controller {

    public function list() {
        if (session('user_role') === 'superadmin') {

            $data['generated_urls'] = Url::with('user')
            ->with('company')
            ->paginate(5);
        } else {
            $data['generated_urls'] = Url::with('user')
            ->with('company')
            ->where('user_id', session('userInfo.id'))
            ->paginate(5);
        }

        // echo '<pre>';print_r($data['generated_urls']);die;
        return view('url.list', $data);
    }

    public function generate_url($companyID) {

        $data['company_id'] = $companyID;
        return view('url.add', $data);
    }

    public function add_generated_url(Request $request) {
        $request->validate([
            'original_url' => 'required|url'
        ]);

        $generated_short_url = Str::random(10);
        $userID = session('userInfo.id');
        $addURLInfo = [
            'company_id' => $request->company_id,
            'user_id' => $userID,
            'original_url' => $request->original_url,
            'short_url' => url('/'.$generated_short_url),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $insertID = Url::insertGetId($addURLInfo);
        if ($insertID) {
            $status = 'success';
            $message = 'Short URL generated Succesfully';
        } else {
            $status = 'error';
            $message = 'Error While generating the short URL';
        }

        return redirect()->route(session('user_role') . '.generated-urls')->with($status, $message);
    }
}
