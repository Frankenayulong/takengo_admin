<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class CarController extends Controller
{
    public function show(){
        $client = new Client();
        $result = $client->post(config('api.api_url') . 'register-newsletter', [
            'verify' => false,
            'form_params' => [
                'email' => $request->email
            ]
        ]);
        $response = json_decode((string)$result->getBody());
    }
}
