<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function show(Request $request){
        $page = $request->input('page', 1);
        $client = new Client();
        $result = $client->post(config('api.api_url') . 'admin/users', [
            'verify' => false,
            'form_params' => [
                'page' => $page
            ]
        ]);
        $response = json_decode((string)$result->getBody());
        return view('user-list')->with('users', $response);
    }
}
